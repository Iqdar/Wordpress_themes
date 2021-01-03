<?php 

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class Element8 extends Widget_Base{
    
  public function get_name(){
    return 'element_8';
  }

  public function get_title(){
    return 'Card, Title + Statement + Contact + Content';
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
        'statement',
        [
          'label' => 'Statement',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => 'This is a statement'
        ]
      );


      $this->add_control(
        'contact_color',
        [
          'label' => __( 'Contact Color', 'plugin-domain' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'scheme' => [
            'type' => \Elementor\Scheme_Color::get_type(),
            'value' => \Elementor\Scheme_Color::COLOR_1,
          ],
        ]
      );

      $this->add_control(
        'contact',
        [
          'label' => 'Contact',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => 'contact # or address'
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
            '{{WRAPPER}} .title' => 'color: {{VALUE}}',
          ],
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
          'class' => ['element_8__heading'],
        ]
    );
  ?>
        <div class="card" style="background-color: <?php echo $settings['bg_color'] ?>;">  
            <div class="card-body">
                <h4 class="card-title" style="color: <?php echo $settings['title_color'] ?>; font-family: Poppins, sans-serif; text-align: left; padding-top: 20px; font-size: 20px;"<?php echo $this->get_render_attribute_string('heading'); ?>><b><?php echo $settings['heading']?></b></h4><br>
                <div align="left">
                <p style="color: <?php echo $settings['content_color'] ?>;" class="card-text"<?php echo $this->get_render_attribute_string('statement'); ?>><b>'<?php echo $settings['statement']?>'</b></p>
                <p><a href="#" style="color: <?php echo $settings['contact_color'] ?>;" <?php echo $this->get_render_attribute_string('contact'); ?>><b><?php echo $settings['contact']?></b></a></p>
                <div style="color: <?php echo $settings['content_color'] ?>;" <?php echo $this->get_render_attribute_string('content'); ?>><?php echo $settings['content'] ?></div>
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
              'class': [ 'element_8__heading' ],
          }
      );
          #>  

        <div class="card" style="background-color: {{ settings.bg_color }}">  
            <div class="card-body">
                <h4 class="card-title" style="color: {{ settings.title_color }}; font-family: Poppins, sans-serif; text-align: left; padding-top: 20px; font-size: 20px;"{{{ view.getRenderAttributeString( 'heading' ) }}}><b>{{{ settings.heading }}}</b></h4><br>
                <div align="left">
                <p style="color: {{ settings.content_color }}" class="card-text"><b>'{{{ settings.statement }}}'</b></p>
                <p><a href="#" style="color: {{ settings.contact_color }}"><b>{{{ settings.contact }}}</b></a></p>
                <div style="color: {{ settings.content_color }}">{{{ settings.content }}}</div>
            </div>
        </div>
          
        <?php
    }
}

?>