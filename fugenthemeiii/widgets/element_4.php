<?php 

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class Element4 extends Widget_Base{
    
  public function get_name(){
    return 'element_4';
  }

  public function get_title(){
    return 'Drop Down Definition';
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
        'content',
        [
          'label' => 'Content',
          'type' => \Elementor\Controls_Manager::WYSIWYG,
          'default' => 'Some example content. Start Editing Here.'
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
          '{{WRAPPER}} .cbody' => 'color: {{VALUE}}',
    ],
    'default' => '#222',
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
          '{{WRAPPER}} .card-body' => 'color: {{VALUE}}',
    ],
    'default' => '#222',
      ]
    );
  
    $this->add_control(
      'title_bg_color',
      [
        'label' => __( 'Title Background Color', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Scheme_Color::get_type(),
          'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'selectors' => [
          '{{WRAPPER}} .btn-light' => 'background-color: {{VALUE}}',
          '{{WRAPPER}} .card-header' => 'background-color: {{VALUE}}',
    ],
    'default' => '#fff',
      ]
    );

    $this->end_controls_section();
}

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>
        <div class="card" style="border-radius: 0 18px 0 16px;">
            <div class="card-header" id="headingFour" style="border-radius: 30px; box-shadow: 0 0 20px -5px black;">
                <h5 class="mb-0">
                <a class="btn btn-light" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" style="border-style: none;">
                    <b class="cbody" <?php echo $this->get_render_attribute_string('heading'); ?>><?php echo $settings['heading']?></b>
                </a>
                </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body" style="font-size: 14px;">
                <div  <?php echo $this->get_render_attribute_string('content'); ?>><?php echo $settings['content'] ?></div>
            </div>
            </div>
        </div>
      <?php
    }
  
    protected function _content_template(){
      ?>
        <div class="card" style="border-radius: 0 18px 0 16px;">
            <div class="card-header" id="headingFour" style="border-radius: 30px; box-shadow: 0 0 20px -5px black;">
                <h5 class="mb-0">
                <button class="btn btn-light" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" style="border-style: none;">
                    <b class="cbody"> {{{settings.heading}}}</b>
                </button>
                </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body" style="font-size: 14px;">
                <div>{{{settings.content}}}</div>
            </div>
            </div>
        </div>
    <?php
    }
}

?>