<?php 

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class Element3 extends Widget_Base{
    
  public function get_name(){
    return 'element_3';
  }

  public function get_title(){
    return 'Card, circled text + Button';
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
        'default'=>'#fff'
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
					'{{WRAPPER}} .text' => 'color: {{VALUE}}',
        ],
        'default'=>'#222'
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
        'circled_text',
        [
          'label' => 'Circled Text',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => 'Circled text'
        ]
      );

      $this->add_control(
        'under_circle',
        [
          'label' => 'Under Circle Text',
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => 'Under circle'
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
  ?>
  <style>
      .btn-outline-secondary {
        color: <?php echo $settings['button_color'] ?>;
        border-color: <?php echo $settings['button_color'] ?>;
      }

      .btn-outline-secondary:hover {
        color: <?php echo $settings['bg_color'] ?>;
        background-color: <?php echo $settings['button_color'] ?>;
        border-color: <?php echo $settings['button_color'] ?>;
      }

      .btn-outline-secondary:focus, .btn-outline-secondary.focus {
        box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
      }

      .btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
        color: <?php echo $settings['button_color'] ?>;
        background-color: transparent;
      }

      .btn-outline-secondary:not(:disabled):not(.disabled):active, .btn-outline-secondary:not(:disabled):not(.disabled).active,
      .show > .btn-outline-secondary.dropdown-toggle {
        color: <?php echo $settings['bg_color'] ?>;
        background-color: <?php echo $settings['button_color'] ?>;
        border-color: <?php echo $settings['button_color'] ?>;
      }

      .btn-outline-secondary:not(:disabled):not(.disabled):active:focus, .btn-outline-secondary:not(:disabled):not(.disabled).active:focus,
      .show > .btn-outline-secondary.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
      }</style>
        <div class="card" style="background-color: <?php echo $settings['bg_color'] ?>;">  
            <div class="card-body carousel text-center">
                <div class="text"  <?php echo $this->get_render_attribute_string('content'); ?>><?php echo $settings['content'] ?></div>
                <div class="circle mx-auto"><div <?php echo $this->get_render_attribute_string('circled_text'); ?>><?php echo $settings['circled_text'] ?></div></div>
                <h2 style="color: purple; padding-bottom:5px;" <?php echo $this->get_render_attribute_string('under_circle'); ?>><?php echo $settings['under_circle'] ?><h2>
                <button href="#" class="btn btn-outline-secondary" onclick="<?php echo $settings['button_link']['url'] ?>"<?php echo $target.$nofollow ?>  <?php echo $this->get_render_attribute_string('button_title'); ?>><?php echo $settings['button_title']?></button>
            </div>
        </div>

      <?php
    }
  
    protected function _content_template(){
      ?>

          <#
		var target = settings.button_link.is_external ? ' target="_blank"' : '';
		var nofollow = settings.button_link.nofollow ? ' rel="nofollow"' : '';
    #>
    <style>
        .btn-outline-secondary {
          color: <?php echo '{{ settings.button_color }}'; ?>;
          border-color: <?php echo '{{ settings.button_color }}'; ?>;
        }

        .btn-outline-secondary:hover {
          color:<?php echo '{{ settings.bg_color }}'; ?>;
          background-color: <?php echo '{{ settings.button_color }}'; ?>;
          border-color: <?php echo '{{ settings.button_color }}'; ?>;
        }

        .btn-outline-secondary:focus, .btn-outline-secondary.focus {
          box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
        }

        .btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
          color: <?php echo '{{ settings.button_color }}'; ?>;
          background-color: transparent;
        }

        .btn-outline-secondary:not(:disabled):not(.disabled):active, .btn-outline-secondary:not(:disabled):not(.disabled).active,
        .show > .btn-outline-secondary.dropdown-toggle {
          color: <?php echo '{{ settings.bg_color }}'; ?>;
          background-color: <?php echo '{{ settings.button_color }}'; ?>;
          border-color: <?php echo '{{ settings.button_color }}'; ?>;
        }

        .btn-outline-secondary:not(:disabled):not(.disabled):active:focus, .btn-outline-secondary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-outline-secondary.dropdown-toggle:focus {
          box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
        }</style>
        <div class="card" style="background-color: {{ settings.bg_color }}">  
            <div class="card-body carousel text-center">
                <div class="text" >{{{ settings.content }}}</div>
                <div class="circle mx-auto"><div>{{{ settings.circled_text }}}</div></div>
                <h2 style="color: purple; padding-bottom:5px;">{{{ settings.under_circle }}}<h2>
                <button href="#" class="btn btn-outline-secondary" onclick="{{{ settings.button_link.url }}}"{{ target }}{{ nofollow }}>{{ settings.button_title }}</button>
            </div>
        </div>
        <?php
    }
}

?>