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
      $this->add_control(
        'button_title',
        [
          'label' => 'Button Text',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => 'BUTTON'
        ]
      );
  
      $this->add_control(
          'button_link',
          [
              'label' => __( 'Button Link', 'plugin-domain' ),
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
        'image',
        [
            'label' => __( 'Desktop Image', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );


    $this->add_control(
        'image2',
        [
            'label' => __( 'Tablet-Phone Image', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
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
					'{{WRAPPER}} .head' => 'color: {{VALUE}}',
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
          '{{WRAPPER}} .content' => 'color: {{VALUE}}',
    ],
    'default' => '#222',
      ]
    );
    $this->add_control(
      'buttontext_color',
      [
        'label' => __( 'Button Text Color', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Scheme_Color::get_type(),
          'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'selectors' => [
          '{{WRAPPER}} .blue-btn' => 'color: {{VALUE}}',
    ],
    'default' => '#fff',
      ]
    );
    $this->add_control(
      'button_color',
      [
        'label' => __( 'Button Color', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Scheme_Color::get_type(),
          'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'selectors' => [
          '{{WRAPPER}} .blue-btn' => 'background-color: {{VALUE}}',
    ],
    'default' => '#00aaf4',
      ]
    );
    $this->add_control(
      'button_hover_color',
      [
        'label' => __( 'Button Hover Color', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Scheme_Color::get_type(),
          'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'selectors' => [
          '{{WRAPPER}} .blue-btn:hover' => 'background-color: {{VALUE}}',
        ],
        'default' => '#00d258',
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
              '{{WRAPPER}} .head' => 'text-align: {{VALUE}}',
            ],
            'toggle' => false,
            'default' => 'left',
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
      'toggle' => false,
      'default' => 'left',
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
				'default' => 'h2',
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
          '{{WRAPPER}} .content' => 'font-size: {{VALUE}}px',
        ],
				'default' => 16,
			]
		);



    $this->end_controls_section();  }

  protected function render(){
    $settings = $this->get_settings_for_display();

    $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';

  ?>
  <style>
    .container-fluid-box{
        height: 100hv;
        position: relative;
        background: url('<?php echo $settings['image']['url'] ?>');
        background-size: cover;
    }
    @media (max-width: 990px) {
        .container-fluid-box{
            height: 100hv;
            position: relative;
            background: url('<?php echo $settings['image2']['url'] ?>');
            background-size: cover;
        }
    }
  </style>
<section class="call-to-hover">
    <div class="container-fluid-box">
    <div class="container-fluid">
   <div class="row">
    <div class="col-lg-4 btn-holder"></div>
    <div class="left-col col-lg-8">
        <div class="row">
            <div class="col-lg-1 btn-holder"></div>
        <div class="col-lg-11" align="<?php echo $settings['alignment']?>">
            <<?php echo $settings['header_size']?> class="head" <?php echo $this->get_render_attribute_string('heading'); ?>><?php echo $settings['heading']?></<?php echo $settings['header_size']?>>
            <div class="content" <?php echo $this->get_render_attribute_string('content'); ?>><?php echo $settings['content'] ?></div>
            <div>
            <a class="blue-btn" href="<?php echo $settings['button_link']['url'] ?>"<?php echo $target.$nofollow ?>  <?php echo $this->get_render_attribute_string('button_title'); ?>><?php echo $settings['button_title']?></a>
            </div>
        </div>
        </div>
    </div>
    </div>
   </div>
</div>
</section>     <?php
    }
  
    protected function _content_template(){
      ?>
      <#
    var target = settings.button_link.is_external ? ' target="_blank"' : '';
    var nofollow = settings.button_link.nofollow ? ' rel="nofollow"' : '';
    #>
<style>
    .container-fluid-box{
        height: 100hv;
        position: relative;
        background: url('{{{ settings.image.url }}}');
        background-size: cover;
    }
    @media (max-width: 990px) {
        .container-fluid-box{
            height: 100hv;
            position: relative;
            background: url('{{{ settings.image2.url }}}');
            background-size: cover;
        }
    }
  </style>
</style>
<section class="call-to-hover">
    <div class="container-fluid-box">
    <div class="container-fluid">
   <div class="row">
    <div class="col-lg-4 btn-holder"></div>
    <div class="left-col col-lg-8">
        <div class="row">
            <div class="col-lg-1 btn-holder"></div>
        <div class="col-lg-11" align="{{{ settings.alignment }}}">
            <{{{ settings.header_size }}} class="head" >{{{ settings.heading }}}</{{{ settings.header_size }}}>
            <div class="content">{{{ settings.content }}}</div>
            <div>
            <a class="blue-btn" onclick="{{{ settings.button_link.url }}}"{{ target }}{{ nofollow }}>{{ settings.button_title }}</a>
          </div>
        </div>
        </div>
    </div>
    </div>
   </div>
</div>
</section>        <?php
    }
}

?>