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
    return 'Advertisement with button';
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
				'label' => __( 'Text Color', 'plugin-domain' ),
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
        'sub_heading',
        [
          'label' => 'Sub Heading',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => 'My Other Example Heading'
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
                'col-lg-6 my-auto order-lg-12' => [
                    'title' => __( 'Left', 'plugin-name' ),
                    'icon' => 'fa fa-align-left',
                ],
                'col-lg-6 my-auto' => [
                    'title' => __( 'Right', 'plugin-name' ),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'col-lg-6 my-auto order-lg-12',
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
  
    $this->end_controls_section();
  }

  protected function render(){
    $settings = $this->get_settings_for_display();

    $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';

    $this->add_inline_editing_attributes('heading', 'basic');
    $this->add_render_attribute(
        'heading',
        [
          'class' => ['element_4__heading'],
        ]
    );
  ?>
  
  <style>
      .btn-outline-secondary-2 {
        color: <?php echo $settings['button_color'] ?>;
        border-color: <?php echo $settings['button_color'] ?>;
      }

      .btn-outline-secondary-2:hover {
        color: <?php echo $settings['bg_color'] ?>;
        background-color: <?php echo $settings['button_color'] ?>;
        border-color: <?php echo $settings['button_color'] ?>;
      }

      .btn-outline-secondary-2:focus, .btn-outline-secondary-2.focus {
        box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
      }

      .btn-outline-secondary-2.disabled, .btn-outline-secondary-2:disabled {
        color: <?php echo $settings['button_color'] ?>;
        background-color: transparent;
      }

      .btn-outline-secondary-2:not(:disabled):not(.disabled):active, .btn-outline-secondary-2:not(:disabled):not(.disabled).active,
      .show > .btn-outline-secondary-2.dropdown-toggle {
        color: <?php echo $settings['bg_color'] ?>;
        background-color: <?php echo $settings['button_color'] ?>;
        border-color: <?php echo $settings['button_color'] ?>;
      }

      .btn-outline-secondary-2:not(:disabled):not(.disabled):active:focus, .btn-outline-secondary-2:not(:disabled):not(.disabled).active:focus,
      .show > .btn-outline-secondary-2.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
      }</style>
        <section class="text-center">
            <div class="miniCont row" style="background-color: <?php echo $settings['bg_color'] ?>; padding:25px;">
            <div class="<?php echo $settings['alignment'] ?>" style="padding: 25px;">
                <div class="row">
                    <div class="home-content col-lg-12">
                        <h1 class="pb-3" style="color: <?php echo $settings['title_color'] ?>;" <?php echo $this->get_render_attribute_string('heading'); ?>><?php echo $settings['heading'] ?></h1>
                        <p class="pb-3" style="color: <?php echo $settings['title_color'] ?>;" <?php echo $this->get_render_attribute_string('sub_heading'); ?>><b><?php echo $settings['sub_heading'] ?></b></p>
                        <div class="pb-3" style="color: <?php echo $settings['title_color'] ?>;" <?php echo $this->get_render_attribute_string('content'); ?>><?php echo $settings['content'] ?></div>
                        <button class="btn btn-outline-secondary-2" onclick="<?php echo $settings['button_link']['url'] ?>"<?php echo $target.$nofollow ?>  <?php echo $this->get_render_attribute_string('button_title'); ?>><?php echo $settings['button_title']?></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="padding: 25px;">
                <img class="img-fluid" <?php echo $this->get_render_attribute_string('image'); ?> alt="image" src="<?php echo $settings['image']['url'] ?>">
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
              'class': [ 'element_4__heading' ],
          }
      );
          #>  

          <#
		var target = settings.button_link.is_external ? ' target="_blank"' : '';
		var nofollow = settings.button_link.nofollow ? ' rel="nofollow"' : '';
		#>
    <style>
        .btn-outline-secondary-2 {
          color: <?php echo '{{ settings.button_color }}'; ?>;
          border-color: <?php echo '{{ settings.button_color }}'; ?>;
        }

        .btn-outline-secondary-2:hover {
          color:<?php echo '{{ settings.bg_color }}'; ?>;
          background-color: <?php echo '{{ settings.button_color }}'; ?>;
          border-color: <?php echo '{{ settings.button_color }}'; ?>;
        }

        .btn-outline-secondary-2:focus, .btn-outline-secondary-2.focus {
          box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
        }

        .btn-outline-secondary-2.disabled, .btn-outline-secondary-2:disabled {
          color: <?php echo '{{ settings.button_color }}'; ?>;
          background-color: transparent;
        }

        .btn-outline-secondary-2:not(:disabled):not(.disabled):active, .btn-outline-secondary-2:not(:disabled):not(.disabled).active,
        .show > .btn-outline-secondary-2.dropdown-toggle {
          color: <?php echo '{{ settings.bg_color }}'; ?>;
          background-color: <?php echo '{{ settings.button_color }}'; ?>;
          border-color: <?php echo '{{ settings.button_color }}'; ?>;
        }

        .btn-outline-secondary-2:not(:disabled):not(.disabled):active:focus, .btn-outline-secondary-2:not(:disabled):not(.disabled).active:focus,
        .show > .btn-outline-secondary-2.dropdown-toggle:focus {
          box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
        }</style>

        <section class="text-center">
            <div class="miniCont row" style="background-color: {{ settings.bg_color }}; padding:25px;">
            <div class="{{ settings.alignment }}" style="padding: 25px;">
                <div class="row">
                    <div class="home-content col-lg-12">
                        <h1 class="pb-3" style=" color: {{ settings.title_color }}">{{{ settings.heading }}}</h1>
                        <p class="pb-3" style=" color: {{ settings.title_color }}"><b>{{{ settings.sub_heading }}}</b></p>
                        <div class="pb-3" style=" color: {{ settings.title_color }}">{{{ settings.content }}}</div>
                        <button class="btn btn-lg btn-outline-secondary-2" onclick="{{{ settings.button_link.url }}}"{{ target }}{{ nofollow }}>{{ settings.button_title }}</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="padding: 25px;">
                <img class="img-fluid" alt="image" src="{{{ settings.image.url }}}">
            </div>
            </div>
        </section>
        <?php
    }
}

?>