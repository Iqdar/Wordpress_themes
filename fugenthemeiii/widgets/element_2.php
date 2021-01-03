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
    return 'Title + Para';
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
					'{{WRAPPER}} .top-head' => 'color: {{VALUE}}',
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
          '{{WRAPPER}} .top-text' => 'color: {{VALUE}}',
    ],
    'default' => '#222',
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
      'title_alignment',
      [
          'label' => __( 'Title Alignment', 'plugin-name' ),
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
              '{{WRAPPER}} .top-head' => 'text-align: {{VALUE}}',
            ],
            'toggle' => false,
            'default' => 'center',
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
        '{{WRAPPER}} .top-text' => 'text-align: {{VALUE}}',
      ],
      'toggle' => false,
      'default' => 'center',
    ]
);

    $this->end_controls_section();

    $this->start_controls_section(
			'section_style_size',
			[
				'label' => 'Size',
				'tab' => Controls_Manager::TAB_STYLE,
			]
    );
    
		$this->add_control(
			'header_size',
			[
				'label' => __( 'HTML Tag', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h1',
			]
		);


		$this->add_control(
			'font_size',
			[
				'label' => __( 'Content Font Size (px)', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
        'selectors' => [
          '{{WRAPPER}} .top-text' => 'font-size: {{VALUE}}px',
        ],
				'default' => 16,
			]
		);

    $this->end_controls_section();
  }

  protected function render(){
    $settings = $this->get_settings_for_display();

  ?>
  <div class="text-center"><<?php echo $settings['header_size']?> class="top-head"<?php echo $this->get_render_attribute_string('heading'); ?>><?php echo $settings['heading']?></<?php echo $settings['header_size']?>>
  <div class="top-text my-3"  <?php echo $this->get_render_attribute_string('content'); ?>><?php echo $settings['content'] ?></div>
  </div>
      <?php
    }
  
    protected function _content_template(){
      ?>
      <div class="text-center"><{{{ settings.header_size }}} class="top-head">{{{ settings.heading }}}</{{{ settings.header_size }}}>
      <div class="top-text my-3">{{{ settings.content }}}</div>
      </div>
        <?php
    }
}

?>