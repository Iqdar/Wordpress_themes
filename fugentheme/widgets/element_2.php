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
    return 'Circular Gallery';
  }

  public function get_icon(){
    return 'fa fa-wordpress';
  }

  public function get_categories(){
    return ['fugen'];
  }

  protected function _register_controls(){

    $this->start_controls_section('section_content',['label'=>'Settings',]);
    
    $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_item', [
				'label' => __( 'List Item', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Item' , 'plugin-domain' ),
				'label_block' => true,
			]
    );
    
    $repeater->add_control(
      'image',
      [
        'label' => __( 'Image', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'List Item', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ list_item }}}',
			]
		);
    
    $this->end_controls_section();
  }

  protected function render(){
    $settings = $this->get_settings_for_display();

  ?>
<section class="slideshow">
    <div class="content"><?php
      if ( $settings['list'] ) {
        echo '<div class="content-carrousel">';
        foreach (  $settings['list'] as $item ) {
          echo '<figure class="shadow"><img src= "'. $item['image']['url'] .'"></figure>';
        }
        echo '</div>';
      }
      ?>
    </div>
</sectiom>
      <?php
    }
  
    protected function _content_template(){
      ?>
<section class="slideshow">
    <div class="content">
    <# if ( settings.list.length ) { #>
      <div class="content-carrousel">
          <# _.each( settings.list, function( item ) { #>
            <figure class="shadow"><img src= "{{item.image.url}}"></figure>
          <# 
          }); #>
        </div>
        <# } #>
    </div>
</sectiom>
        <?php
    }

  }
?>