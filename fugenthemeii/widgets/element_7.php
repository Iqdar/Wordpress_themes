<?php 

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class Element7 extends Widget_Base{
    
  public function get_name(){
    return 'element_7';
  }

  public function get_title(){
    return 'Card, 2 title + Text';
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
					'{{WRAPPER}} .card' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .card-body' => 'color: {{VALUE}}',
				],
        'default'=>'purple',
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
            '{{WRAPPER}} .card-body-2' => 'color: {{VALUE}}',
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

    $this->end_controls_section();
  }

  protected function render(){
    $settings = $this->get_settings_for_display();

    $this->add_inline_editing_attributes('heading', 'basic');
    $this->add_render_attribute(
        'heading',
        [
          'class' => ['element_7__heading'],
        ]
    );
  ?>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="font-family: Poppins, sans-serif; text-align: left; padding-top: 20px;"<?php echo $this->get_render_attribute_string('heading'); ?>><?php echo $settings['heading']?></h4>
                <h4 class="card-title" style="font-family: Poppins, sans-serif; text-align: left;"<?php echo $this->get_render_attribute_string('sub_heading'); ?>><?php echo $settings['sub_heading']?></h4>
                <div class="card-body-2" <?php echo $this->get_render_attribute_string('content'); ?>><?php echo $settings['content'] ?></div>
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
              'class': [ 'element_7__heading' ],
          }
      );
          #>  
          <div class="card">
            <div class="card-body">
                <h4 class="card-title" style=" font-family: Poppins, sans-serif; text-align: left; padding-top: 20px;"{{{ view.getRenderAttributeString( 'heading' ) }}}>{{{ settings.heading }}}</h4>
                <h4 class="card-title" style=" font-family: Poppins, sans-serif; text-align: left;">{{{ settings.sub_heading }}}</h4>
                <div class="card-body-2">{{{ settings.content }}}</div>
            </div>
        </div>
        <?php
    }
}

?>