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
    return 'Swiper';
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

    $this->end_controls_section();    }

  protected function render(){
    $settings = $this->get_settings_for_display();
    ?>
   <div class="swiper-container">
   <?php
      if ( $settings['list'] ) {
        echo '<div class="swiper-wrapper">';
        foreach (  $settings['list'] as $item ) {
		  echo '<div class="swiper-slide" style ="width:300px;">
					<div class="imgBx">
						<img src="'. $item['image']['url'] .'"/>
					</div>
					<div class="details">
						<h3>'. $item['list_item'] .'</h3>
					</div>
				</div>';
        }
        echo '</div>';
      }
      ?>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
  <script>
    var swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
    },
    pagination: {
        el: '.swiper-pagination',
    },
});</script>
      <?php
    }
  
    protected function _content_template(){
      ?>
   <div class="swiper-container">
   <# if ( settings.list.length ) { #>
    <div class="swiper-wrapper">
          <# _.each( settings.list, function( item ) { #>
			<div class="swiper-slide" style ="width:300px;">
				<div class="imgBx">
				<img src="{{item.image.url}}"/>
				</div>
				<div class="details">
				<h3>{{item.list_item}}</h3>
				</div>
			</div>
          <# 
          }); #>
        </div>
        <# } #>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
  <script>
    var swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
    },
    pagination: {
        el: '.swiper-pagination',
    },
});</script>
    <?php
    }
}

?>