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
    return 'Advertisement';
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
			'bg_color',
			[
				'label' => __( 'Background Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .bg-colour' => 'background-color: {{VALUE}}',
        ],
        'default'=>'#fff',
			]
    );
    
    $this->add_control(
			'title_color',
			[
				'label' => __( 'Heading Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
        'default'=>'#222',
			]
		);

    $this->add_control(
        'heading',
        [
          'label' => 'Heading',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => 'My Example Heading'
        ]
      );
  
      $this->add_control(
        'sub_heading',
        [
          'label' => 'Sub Heading',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => 'My Other Example Heading'
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
					'{{WRAPPER}} .content' => 'color: {{VALUE}}',
				],
        'default'=>'#222',
			]
		);
  
      $this->add_control(
        'content',
        [
          'label' => 'Content',
          'type' => \Elementor\Controls_Manager::WYSIWYG,
          'default' => 'Some example content. Start Editing Here.'
        ]
      );

      $this->add_control(
        'image',
        [
            'label' => __( 'Choose Image', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );

    $this->add_control(
        'alignment',
        [
            'label' => __( 'Image Alignment', 'plugin-name' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'col-lg-4' => [
                    'title' => __( 'Left', 'plugin-name' ),
                    'icon' => 'fa fa-align-left',
                ],
                'col-lg-4 order-lg-12' => [
                    'title' => __( 'Right', 'plugin-name' ),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'col-lg-4 order-lg-12',
        ]
    );
  
    $this->end_controls_section();
  }

  protected function render(){
    $settings = $this->get_settings_for_display();

    $this->add_inline_editing_attributes('heading', 'basic');
    $this->add_render_attribute(
        'heading',
        [
          'class' => ['element__heading'],
        ]
    );
  ?>
  
      <div class="bg-colour">
        <div class="row" style="padding: 50px;">
            <div class="<?php echo $settings['alignment'] ?>">
                <img class="img-fluid"  <?php echo $this->get_render_attribute_string('image'); ?> src="<?php echo $settings['image']['url'] ?>">
                <p>&nbsp;</p>
            </div>
            <div class="col-lg-8">
                <h2 class="title" <?php echo $this->get_render_attribute_string('heading'); ?>><?php echo $settings['heading']?></h2>
                <h2 class="title" <?php echo $this->get_render_attribute_string('sub_heading'); ?>><b><?php echo $settings['sub_heading'] ?></b></h2><hr class="space"><br><br>
                <div class="content" style="font-size: 15px;"  <?php echo $this->get_render_attribute_string('content'); ?>><?php echo $settings['content'] ?></div>
            </div>
        </div>
    </div>
      <?php
    }
  
    protected function _content_template(){
      ?>
      <#
          view.addInlineEditingAttributes( 'heading', 'basic' );
      view.addRenderAttribute(
          'heading',
          {
              'class': [ 'element__heading' ],
          }
      );
          #>  
            <div class="bg-colour">
                <div class="row" style="padding: 50px;">
                    <div class="{{ settings.alignment }}">
                        <img class="img-fluid" src="{{{ settings.image.url }}}">
                    </div>
                    <div class="col-lg-8">
                        <h2 class="title" {{{ view.getRenderAttributeString( 'heading' ) }}}>{{{ settings.heading }}}</h2>
                        <h2 class="title"><b>{{{ settings.sub_heading }}}</b></h2><hr class="space"><br><br>
                        <div class="content" style="font-size: 15px;">{{{ settings.content }}}</div>
                    </div>
                </div>
            </div>
        <?php
    }
}

?>