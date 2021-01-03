<?php 

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class Element5 extends Widget_Base{
    
  public function get_name(){
    return 'element_5';
  }

  public function get_title(){
    return 'Advertisement with content box';
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
                '{{WRAPPER}} .cont1' => 'background-color: {{VALUE}}',
            ],
            'default'=>'#c5c2c2',
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
                '{{WRAPPER}} .home-content' => 'background-color: {{VALUE}}',
            ],
            'default'=>'#222',
        ]
    );
    $this->add_control(
        'text_bg_color',
        [
            'label' => __( 'Text Background Color', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .card-body' => 'color: {{VALUE}}',
            ],
            'default'=>'#fff',
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
                'col-lg-6' => [
                    'title' => __( 'Left', 'plugin-name' ),
                    'icon' => 'fa fa-align-left',
                ],
                'col-lg-6 order-lg-12' => [
                    'title' => __( 'Right', 'plugin-name' ),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'col-lg-6 my-auto order-lg-12',
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
          'class' => ['element_5__heading'],
        ]
    );
  ?>
  
    <section class="call-to-action mobile">
    <!-- new div started with table classes ended -->
    <!-- first cards for div  -->
        <section class="cont1">
            <div class="row">
                <div class="<?php echo $settings['alignment'] ?>">
                    <img class="img-fluid" <?php echo $this->get_render_attribute_string('image'); ?> alt="image" src="<?php echo $settings['image']['url'] ?>">
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="row-md-4">
                            <div class="home-content col-lg-12" style="padding: 5px;">
                                <div class="card-body" <?php echo $this->get_render_attribute_string('content'); ?>><?php echo $settings['content'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
              'class': [ 'element_5__heading' ],
          }
      );
          #>  

    <section class="call-to-action mobile">
    <!-- new div started with table classes ended -->
    <!-- first cards for div  -->
        <section class="cont1" style="background-color:  {{ settings.bg_color }};">
            <div class="row">
            <div class="{{ settings.alignment }}">
                <img class="img-fluid" alt="image" src="{{{ settings.image.url }}}">
            </div>
            <div class="col-lg-6">
                <div class="card" style=" background-color: {{ settings.text_bg_color }};">
                <div class="row-md-4">
                    <div class="home-content col-lg-12" style="padding:5px;">
                        <div class="card-body" style="color: {{ settings.title_color }};">{{{ settings.content }}}</div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </section>


        <?php
    }
}

?>