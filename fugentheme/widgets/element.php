<?php 

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class Element extends Widget_Base{
    
  public function get_name(){
    return 'element';
  }

  public function get_title(){
    return 'Slider ';
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
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="4000">
    <?php
      if ( $settings['list'] ) {
        $count=0;
        echo '<ol class="carousel-indicators">';
        foreach (  $settings['list'] as $item ) {
          if($count==0){
            echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'" class="active"></li>';
          }
          else{
            echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'"></li>';
          }
          $count=$count+1;
        }
        echo '</ol>';
      }
    ?>
    <?php
      if ( $settings['list'] ) {
        $count=0;
        echo '<div class="carousel-inner" role="listbox">';
        foreach (  $settings['list'] as $item ) {
          if($count==0){
            echo '<div class="carousel-item active" style="background-image: url('. $item['image']['url'] .');"></div>';
          }
          else{
            echo '<div class="carousel-item" style="background-image: url('. $item['image']['url'] .');"></div>';
          }
          $count=$count+1;
        }
        echo '</div>';
      }
    ?>
    <a class="carousel-control-prev" href="#navbarResponsive" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#navbarResponsive" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>

    <?php
    }
  
    protected function _content_template(){
      ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="4000">
      <#
        var count;
       if ( settings.list.length ) { #>
        <ol class="carousel-indicators">
          <# _.each( settings.list, function( item ) {  #>
              <li data-target="#carouselExampleIndicators" data-slide-to="{{count}}"></li>
            <#  }); #>
        </ol>
        <div class="carousel-inner" role="listbox">
          <# _.each( settings.list, function( item ) { #>
              <div class="carousel-item" style="background-image: url({{item.image.url}});"></div>
          <# 
          }); #>
        </div>
      <# } #>
      <a class="carousel-control-prev" href="#navbarResponsive" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#navbarResponsive" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </a>
    </div>

    <?php
    }
}

?>