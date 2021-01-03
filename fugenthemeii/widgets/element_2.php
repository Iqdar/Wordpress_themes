<?php 

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class Element2 extends Widget_Base{
    
  public function get_name(){
    return 'element_2';
  }

  public function get_title(){
    return 'Headings';
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
  
    $this->end_controls_section();
  }

  protected function render(){
    $settings = $this->get_settings_for_display();

    $this->add_inline_editing_attributes('heading', 'basic');
    $this->add_render_attribute(
        'heading',
        [
          'class' => ['element_2__heading'],
        ]
    );
  ?>
  <section class="call-to-action">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12" align="center">
                <h2 class="title" <?php echo $this->get_render_attribute_string('heading'); ?>><?php echo $settings['heading']?></h2>
                <h2 class="title" <?php echo $this->get_render_attribute_string('sub_heading'); ?>><b><?php echo $settings['sub_heading'] ?></b></h2>
                <hr class="space01" style="text-align:center;" ><br><br>
            </div>  
       </div>
    </div>
</section>
      <?php
    }
  
    protected function _content_template(){
      ?>
      <#
          view.addInlineEditingAttributes( 'heading', 'basic' );
      view.addRenderAttribute(
          'heading',
          {
              'class': [ 'element_2__heading' ],
          }
      );
          #>  
          <section class="call-to-action">  
          <div class="container">
           <div class="row text-center">
               <div class="col-lg-12" align="center">
                   <h2 class="title" {{{ view.getRenderAttributeString( 'heading' ) }}}>{{{ settings.heading }}}</h2>
                    <h2 class="title"><b>{{{ settings.sub_heading }}}</b></h2>
                   <hr class="space01" style="text-align:center;"><br><br>
               </div>  
            </div>
        </div>
    </section>
        <?php
    }
}

?>