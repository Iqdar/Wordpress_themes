<?php 

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class Element6 extends Widget_Base{
    
  public function get_name(){
    return 'element_6';
  }

  public function get_title(){
    return '3 Listbox';
  }

  public function get_icon(){
    return 'fa fa-wordpress';
  }

  public function get_categories(){
    return ['fugen'];
  }

  protected function _register_controls(){

    $this->start_controls_section('section_content',['label'=>'Settings',]);

    $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_item', [
				'label' => __( 'List Item', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Item' , 'plugin-domain' ),
				'label_block' => true,
			]
    );
    $repeater->add_control(
      'item_link',
      [
          'label' => __( 'Item Link', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::URL,
          'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
          'show_external' => true,
          'default' => [
              'url' => '',
              'is_external' => true,
              'nofollow' => true,
          ],
      ]
  );

		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'List Item', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ list_item }}}',
			]
		);
    $repeater2 = new \Elementor\Repeater();

		$repeater2->add_control(
			'list2_item', [
				'label' => __( 'List 2 Item', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List 2 Item' , 'plugin-domain' ),
				'label_block' => true,
			]
    );
    
    $repeater2->add_control(
      'item_link',
      [
          'label' => __( 'Item Link', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::URL,
          'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
          'show_external' => true,
          'default' => [
              'url' => '',
              'is_external' => true,
              'nofollow' => true,
          ],
      ]
  );

		$this->add_control(
			'list2',
			[
				'label' => __( 'Repeater List 2', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'default' => [
					[
						'list2_title' => __( 'List 2 Item', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ list2_item }}}',
			]
		);
    $repeater3 = new \Elementor\Repeater();

		$repeater3->add_control(
			'list3_item', [
				'label' => __( 'List 3 Item', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List 3 Item' , 'plugin-domain' ),
				'label_block' => true,
			]
    );
    $repeater3->add_control(
      'item_link',
      [
          'label' => __( 'Item Link', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::URL,
          'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
          'show_external' => true,
          'default' => [
              'url' => '',
              'is_external' => true,
              'nofollow' => true,
          ],
      ]
  );

		$this->add_control(
			'list3',
			[
				'label' => __( 'Repeater List 3', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater3->get_controls(),
				'default' => [
					[
						'list3_title' => __( 'List 3 Item', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ list3_item }}}',
			]
		);

  

        $this->end_controls_section();
    
        $this->start_controls_section(
                'section_style_color',
                [
                    'label' => 'Color',
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );
        
    
        $this->add_control(
          'component_color',
          [
            'label' => __( 'Component Color', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
              'type' => \Elementor\Scheme_Color::get_type(),
              'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
              '{{WRAPPER}} .fa' => 'color: {{VALUE}}',
              '{{WRAPPER}} .btn-green' => 'color: {{VALUE}}',
        ],
        'default' => '#00aaf4',
          ]
        );
        $this->add_control(
          'component_hover_color',
          [
            'label' => __( 'Component Hover Color', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
              'type' => \Elementor\Scheme_Color::get_type(),
              'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
              '{{WRAPPER}} .btn-green:hover' => 'color: {{VALUE}}',
            ],
            'default' => '#00d258',
          ]
        );
    
        $this->end_controls_section();
    }

  protected function render(){
    $settings = $this->get_settings_for_display();
  ?>
  <div class="card card-tbl" style="border-radius: 30px; box-shadow: 0 0 20px -5px black;">
          <div class="row">
            <div class="col mx-10">
                <?php
                    if ( $settings['list'] ) {
                      echo '<ul>';
                      foreach (  $settings['list'] as $item ) {
                        $target = $item['item_link']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
                        echo '<li id = "' . $item['_id'] . '"><i class="fa fa-stop" aria-hidden="true"></i><a href="'.$item['item_link']['url'].'"'.$target.$nofollow.'><span class="btn-green mx-2">' . $item['list_item'] . '</span></a></li>';
                      }
                      echo '</ul>';
                    }
                    ?>
            </div>
            <div class="col mx-10">
                <?php
                    if ( $settings['list2'] ) {
                      echo '<ul>';
                      foreach (  $settings['list2'] as $item ) {
                        $target = $item['item_link']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
                        echo '<li id = "' . $item['_id'] . '"><i class="fa fa-stop" aria-hidden="true"></i><a href="'.$item['item_link']['url'].'"'.$target.$nofollow.'><span class="btn-green mx-2">' . $item['list2_item'] . '</span></a></li>';
                      }
                      echo '</ul>';
                    }
                    ?>
                </div>
            <div class="col mx-10">
                <?php
                    if ( $settings['list3'] ) {
                      echo '<ul>';
                      foreach (  $settings['list3'] as $item ) {
                        $target = $item['item_link']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
                        echo '<li id = "' . $item['_id'] . '"><i class="fa fa-stop" aria-hidden="true"></i><a href="'.$item['item_link']['url'].'"'.$target.$nofollow.'><span class="btn-green mx-2">' . $item['list3_item'] . '</span></a></li>';
                      }
                      echo '</ul>';
                    }
                    ?>
                </div>
          </div>
        </div>
   <?php
    }
  
    protected function _content_template(){
      ?>

<div class="card card-tbl" style="border-radius: 30px; box-shadow: 0 0 20px -5px black;">
          <div class="row">
            <div class="col mx-10">
              
            <# if ( settings.list.length ) { #>
                        <ul>                  
                          <# _.each( settings.list, function( item ) { #>
                          <#
                          var target = item.item_link.is_external ? ' target="_blank"' : '';
                          var nofollow = item.item_link.nofollow ? ' rel="nofollow"' : '';
                          #>
                            <li><i class="fa fa-stop" aria-hidden="true"></i><a href="{{{ item.item_link.url }}}"{{ target }}{{ nofollow }}><span class="btn-green mx-2">{{{ item.list_item }}}</span></a></li>
                          <# }); #>
                        </ul>
                      <# } #>
            </div>
            <div class="col mx-10">
              
            <# if ( settings.list2.length ) { #>
                        <ul>
                          <# _.each( settings.list2, function( item ) { #>
                          <#
                          var target = item.item_link.is_external ? ' target="_blank"' : '';
                          var nofollow = item.item_link.nofollow ? ' rel="nofollow"' : '';
                          #>
                            <li><i class="fa fa-stop" aria-hidden="true"></i><a href="{{{ item.item_link.url }}}"{{ target }}{{ nofollow }}><span class="btn-green mx-2">{{{ item.list2_item }}}</span></a></li>
                          <# }); #>
                        </ul>
                      <# } #>
            </div>
            <div class="col mx-10">
              
            <# if ( settings.list3.length ) { #>
                        <ul>
                          <# _.each( settings.list3, function( item ) { #>
                          <#
                          var target = item.item_link.is_external ? ' target="_blank"' : '';
                          var nofollow = item.item_link.nofollow ? ' rel="nofollow"' : '';
                          #>
                            <li><i class="fa fa-stop" aria-hidden="true"></i><a href="{{{ item.item_link.url }}}"{{ target }}{{ nofollow }}><span class="btn-green mx-2">{{{ item.list3_item }}}</span></a></li>
                          <# }); #>
                        </ul>
                      <# } #>
            </div>
          </div>
        </div>
    <?php
    }
}

?>