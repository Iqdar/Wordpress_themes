<?php 

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class Element extends Widget_Base{
    
  public function get_name(){
    return 'element';
  }

  public function get_title(){
    return 'Features box';
  }

  public function get_icon(){
    return 'fa fa-wordpress';
  }

  public function get_categories(){
    return ['fugen'];
  }

  protected function _register_controls(){

    $this->start_controls_section('section_content',['label'=>'Settings',]);

    $this->add_control(
        'heading',
        [
          'label' => 'Heading',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => 'My Example Heading'
        ]
      );
  
      $this->add_control(
        'statement',
        [
          'label' => 'Statement',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => 'My statement'
        ]
      );

      $this->add_control(
        'price',
        [
          'label' => 'Price',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => '$109.99/mo.*'
        ]
      );
  
    $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_item', [
				'label' => __( 'List Item', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Item' , 'plugin-domain' ),
				'label_block' => true,
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

    $this->end_controls_section();
    
    $this->start_controls_section(
			'section_style_color',
			[
				'label' => 'Color',
				'tab' => Controls_Manager::TAB_STYLE,
			]
    );
    
    $this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title-color' => 'color: {{VALUE}}',
					'{{WRAPPER}} .bullet-color' => 'color: {{VALUE}}',
        ],
        'default' => '#00aaf4',
			]
		);
    $this->add_control(
			'content_color',
			[
				'label' => __( 'Content Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .statement-color' => 'color: {{VALUE}}',
					'{{WRAPPER}} .list-color' => 'color: {{VALUE}}',
        ],
        'default' => '#222',
			]
		);
    $this->add_control(
			'bg_color',
			[
				'label' => __( 'Background Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .card' => 'background-color: {{VALUE}}',
        ],
        'default' => '#fff',
			]
		);
    $this->add_control(
			'pricebox_color',
			[
				'label' => __( 'Pricebox Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .price-color' => 'background-color: {{VALUE}}',
        ],
        'default' => '#00d258',
			]
		);
    $this->add_control(
			'price_color',
			[
				'label' => __( 'Price Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .price-color' => 'color: {{VALUE}}',
        ],
        'default' => '#fff',
			]
		);

    $this->end_controls_section();
    
    $this->start_controls_section(
			'section_style_align',
			[
				'label' => 'Align',
				'tab' => Controls_Manager::TAB_STYLE,
			]
    );
    
  $this->add_control(
    'alignment',
    [
        'label' => __( 'Content Alignment', 'plugin-name' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
              'title' => __( 'Left', 'plugin-name' ),
              'icon' => 'fa fa-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'plugin-name' ),
            'icon' => 'fa fa-align-center',
          ],
          'right' => [
              'title' => __( 'Right', 'plugin-name' ),
              'icon' => 'fa fa-align-right',
          ],
          'justify' => [
            'title' => __( 'Left', 'plugin-name' ),
            'icon' => 'fa fa-align-justify',
          ],
      ],
      'selectors' => [
        '{{WRAPPER}} .card-head' => 'text-align: {{VALUE}}',
        '{{WRAPPER}} .card-txt' => 'text-align: {{VALUE}}',
      ],
      'toggle' => false,
      'default' => 'left',
    ]
  );

    $this->end_controls_section();
  }
  protected function render(){
    $settings = $this->get_settings_for_display();

  ?>
  
    <div style="margin-left:15px;">
        <div class="card card0 my-4" style="border-style: none; border-radius: 12px; box-shadow: 0 0 10px -1px grey;">
            <h3 class="card-head title-color"  <?php echo $this->get_render_attribute_string('heading'); ?>><strong><?php echo $settings['heading']?></strong></h3>
            <p class="card-txt statement-color" <?php echo $this->get_render_attribute_string('statement'); ?>><?php echo $settings['statement'] ?></p>
            <p>
                </p>
                    <?php
                    if ( $settings['list'] ) {
                      echo '<ul>';
                      foreach (  $settings['list'] as $item ) {
                        echo '<li class="my-2"  id = "' . $item['_id'] . '"><span class="icon"><i class="bullet-color fa fa-circle" aria-hidden="true"></i></span><span class="mx-2 list-color">' . $item['list_item'] . '</span></li>';
                      }
                      echo '</ul>';
                    }
                    ?>
                <span class="list-style text-center price-color" <?php echo $this->get_render_attribute_string('price'); ?>><?php echo $settings['price'] ?></span>
            <p></p>
        </div>
    </div>
    <?php
    }
  
    protected function _content_template(){
      ?>
        <div style="margin-left:10px;">
            <div class="card card0 my-4" style="border-style: none; border-radius: 12px; box-shadow: 0 0 10px -1px grey;">
                <h3 class="card-head title-color" ><strong>{{{ settings.heading }}}</strong></h3>
                <p class="card-txt statement-color">{{{ settings.statement }}}</p>
                <p>
                    </p>
                      <# if ( settings.list.length ) { #>
                        <ul>
                          <# _.each( settings.list, function( item ) { #>
                            <li class="my-2"><span class="icon"><i class="bullet-color fa fa-circle" aria-hidden="true"></i></span><span class="mx-2 list-color">{{{ item.list_item }}}</span></li>
                          <# }); #>
                        </ul>
                      <# } #>
                    <span class="list-style text-center price-color">{{{ settings.price }}}</span>
                <p></p>
            </div>
        </div>
    <?php
    }
}

?>