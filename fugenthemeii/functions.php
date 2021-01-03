<?php
/**
 * This is our functions file
*/

require_once 'custom-elementor.php';
function add_elementor_widget_categories( $elements_manager ) {

    $elements_manager->add_category(
      'fugen',
      [
        'title' => __( 'Fugen', 'plugin-name' ),
        'icon' => 'fa fa-plug',
      ]
    );
  
  }
  add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );

function mytheme_theme_setup(){
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5',array('search-form'));
    //add_image_size('featured-image',1000,1200,true);
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'navbar' ),
        //'secondary' => __( 'Secondary Menu', 'myfirsttheme' )
    ) );
}

/*
    register_sidebar(
        array(
            'id'            => 'primary1',
            'name'          => __( 'Primary Widget left' ),
            'description'   => __( 'Align on left bottom side of the page.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
    register_sidebar(
        array(
            'id'            => 'primary2',
            'name'          => __( 'Primary Widget right' ),
            'description'   => __( 'Align on right bottom side of the page.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
}

/*function lwp_featured_callout($wp_customize) {
	$wp_customize->add_section('lwp-featured-callout-section', array(
		'title' => 'featured Callout'
	));

	$wp_customize->add_setting('lwp-featured-callout-display', array(
		'default' => 'Yes'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-featured-callout-display-control', array(
			'label' => 'Display this section?',
			'section' => 'lwp-featured-callout-section',
			'settings' => 'lwp-featured-callout-display',
			'type' => 'select',
			'choices' => array('No' => 'No', 'Yes' => 'Yes')
		)));


	$wp_customize->add_setting('lwp-featured-callout-text', array(
		'default' => 'Example paragraph text.'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-featured-callout-text-control', array(
			'label' => 'Text',
			'section' => 'lwp-featured-callout-section',
			'settings' => 'lwp-featured-callout-text',
			'type' => 'textarea'
		)));

	$wp_customize->add_setting('lwp-featured-callout-image');

	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'lwp-featured-callout-image-control', array(
			'label' => 'Image',
			'section' => 'lwp-featured-callout-section',
			'settings' => 'lwp-featured-callout-image',
			'width' => 1200,
			'height' => 500
		)));
}

add_action('customize_register', 'lwp_featured_callout');
*/

function mytheme_style_script(){
	wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('swiper-css',get_template_directory_uri().'/assets/css/swiper.min.css');
	wp_enqueue_style('style',get_stylesheet_uri());	
	wp_enqueue_style('bootstrap-js',get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js');
	wp_enqueue_script('jquery');
	wp_enqueue_script('swiper-js',get_template_directory_uri().'/assets/js/swiper.min.js');
    wp_enqueue_script('script',get_template_directory_uri().'/script.js');
	wp_enqueue_script('popper',get_template_directory_uri().'/assets/js/popper.min.js');
}
add_action('wp_enqueue_scripts','mytheme_style_script');

add_action('after_setup_theme', 'mytheme_theme_setup');

function lwp_footer_callout($wp_customize) {
	$wp_customize->add_section('lwp-footer-callout-section', array(
		'title' => 'Items Customization'
	));

	$wp_customize->add_setting('lwp-footer-callout-headline', array(
		'default' => 'Navbar button title'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-headline-control', array(
        'label' => 'Nav button',
        'section' => 'lwp-footer-callout-section',
        'settings' => 'lwp-footer-callout-headline'
    )));

    $wp_customize->add_setting('lwp-footer-callout-link', array(
        'default' => 'link'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-link-control', array(
            'label' => 'Nav button Link',
            'section' => 'lwp-footer-callout-section',
            'settings' => 'lwp-footer-callout-link',
            'type' => 'dropdown-pages'
        )));

    $wp_customize->add_setting('lwp-footer-callout-text', array(
        'default' => 'Footer Statement'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-text-control', array(
        'label' => 'Text',
        'section' => 'lwp-footer-callout-section',
        'settings' => 'lwp-footer-callout-text',
        'type' => 'textarea'
    )));


    $wp_customize->add_setting('lwp-footer-callout-image');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'lwp-footer-callout-image-control', array(
        'label' => 'Footer Image',
        'section' => 'lwp-footer-callout-section',
        'settings' => 'lwp-footer-callout-image',
        'width' => 100,
        'height' => 100,
        'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
        'flex_height' => true
   )));
}

add_action('customize_register', 'lwp_footer_callout');
?>