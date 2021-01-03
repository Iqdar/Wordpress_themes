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
    return 'Card, Title + Content';
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
				'label' => __( 'Text Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .card-body' => 'color: {{VALUE}}',
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
          'class' => ['element_6__heading'],
        ]
    );
  ?>
  
            <div class="card">  
                <div class="card-body">
                <h4 class="card-title" style="text-align:center;"  <?php echo $this->get_render_attribute_string('heading'); ?>><?php echo $settings['heading']?></h4>
                <div <?php echo $this->get_render_attribute_string('content'); ?>><?php echo $settings['content'] ?></div>
                    <p></p>
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
              'class': [ 'element_6__heading' ],
          }
      );
          #>  

          
            <div class="card">  
                <div class="card-body">
                    <h4 class="card-title" style="text-align:center;" {{{ view.getRenderAttributeString( 'heading' ) }}}>{{{ settings.heading }}}</h4>
                    <div>{{{ settings.content }}}</div>
                    <p></p>
                </div>
           </div>
        <?php
    }
}

?>