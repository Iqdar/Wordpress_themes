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


class vcShortcodes{
    // Element Init
    function __construct() {
		add_action( 'vc_before_init', array( $this, 'vc_shortcode_mapping' ) );
		add_shortcode( 'vc_gallery', array( $this, 'vc_dynamic_gallery_html' ) );
		add_shortcode( 'vc_swiper', array( $this, 'vc_swiper_html' ) );
		add_shortcode( 'vc_infobox', array( $this, 'vc_infobox_html' ) );
		add_shortcode( 'vc_angled_div', array( $this, 'vc_angled_div_html' ) );
		add_shortcode( 'vc_img_text', array( $this, 'vc_img_text_html' ) );
		add_shortcode( 'vc_img_text_btn', array( $this, 'vc_img_text_btn_html' ) );
		add_shortcode( 'vc_img_overlay_fade', array( $this, 'vc_img_overlay_fade_html' ) );
	}
	
    // Element Mapping
    public function vc_shortcode_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('VC Infobox', 'text-domain'),
                'base' => 'vc_infobox',
                'description' => __('Another simple VC box', 'text-domain'), 
                'category' => __('My Custom Elements', 'text-domain'),   
                'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
                'params' => array(   
                         
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Title', 'text-domain' ),
                        'param_name' => 'title',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'Box Title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),  
                     
                    array(
                        'type' => 'textarea',
                        'holder' => 'div',
                        'class' => 'text-class',
                        'heading' => __( 'Text', 'text-domain' ),
                        'param_name' => 'text',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'Box Text', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    )                      
                )
			),
			array(
                'name' => __('VC featured', 'text-domain'),
                'base' => 'vc_featured',
                'description' => __('featured area of the site of the site', 'text-domain'), 
                'category' => __('My Custom featured area', 'text-domain'),   
                'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
			),
			array(
                'name' => __('VC gallery', 'text-domain'),
                'base' => 'vc_gallery',
                'description' => __('Links of the other site', 'text-domain'), 
                'category' => __('My Custom gallery', 'text-domain'),   
                'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
			),
			array(
                'name' => __('VC swiper', 'text-domain'),
                'base' => 'vc_swiper',
                'description' => __('Swiper', 'text-domain'), 
                'category' => __('My Custom swiper', 'text-domain'),   
                'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
			),
			array(
                'name' => __('VC image text', 'text-domain'),
                'base' => 'vc_img_text',
                'description' => __('text over image', 'text-domain'), 
                'category' => __('My Custom text over image', 'text-domain'),   
                'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',
                'params' => array(   
                    array(
                        'type' => 'textfield',
                        'class' => 'title-class',
                        'heading' => __( 'title', 'text-domain' ),
                        'param_name' => 'title',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'Title over Image', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),  
                    array(
                        'type' => 'textfield',
                        'class' => 'title-class',
                        'heading' => __( 'text', 'text-domain' ),
                        'param_name' => 'text',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'Text over Image', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),  
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text', 'text-domain' ),
                        'param_name' => 'image',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'image', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
					)             
                )        
			),
			array(
                'name' => __('VC image text button', 'text-domain'),
                'base' => 'vc_img_text_btn',
                'description' => __('image with text and button below it', 'text-domain'), 
                'category' => __('My Custom image text button', 'text-domain'),   
				'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',    
				'params' => array(   
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Title', 'text-domain' ),
                        'param_name' => 'title',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'Box Title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),  
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text', 'text-domain' ),
                        'param_name' => 'text',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'Text', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
					),  
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text', 'text-domain' ),
                        'param_name' => 'buttonText',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'Text Over Button', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
					),
                    array(
                        'type' => 'textaarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text', 'text-domain' ),
                        'param_name' => 'buttonLink',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'Button Link', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
					),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text', 'text-domain' ),
                        'param_name' => 'image',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'image', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
					)             
                )        
			),
			array(
                'name' => __('VC image overlay fade', 'text-domain'),
                'base' => 'vc_img_overlay_fade',
                'description' => __('blur the image with button on it', 'text-domain'), 
                'category' => __('My Custom image hover fade', 'text-domain'),   
				'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',    
				'params' => array(   
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Title', 'text-domain' ),
                        'param_name' => 'title',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'Box Title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),  
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text', 'text-domain' ),
                        'param_name' => 'buttonText',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'Text Over Button', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
					),
                    array(
                        'type' => 'textaarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text', 'text-domain' ),
                        'param_name' => 'buttonLink',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'Button Link', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
					),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text', 'text-domain' ),
                        'param_name' => 'image',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'image', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
					)             
                )        
			),
			array(
                'name' => __('VC angled div', 'text-domain'),
                'base' => 'vc_angled_div',
                'description' => __('Create div with angled parts one with image and another with text', 'text-domain'), 
                'category' => __('My Custom div', 'text-domain'),   
				'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',    
				'params' => array(   
                    array(
                        'type' => 'textfield',
                        'class' => 'title-class',
                        'heading' => __( 'Title', 'text-domain' ),
                        'param_name' => 'title',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'Box Title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),  
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text', 'text-domain' ),
                        'param_name' => 'text',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'Text beneath title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
					),
                    array(
                        'type' => 'textarea',
                        'class' => 'text-class',
                        'heading' => __( 'Text', 'text-domain' ),
                        'param_name' => 'image',
                        'value' => __( 'Default value', 'text-domain' ),
                        'description' => __( 'image', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
					)             
                )        
			)
        );                                   
	}

	public function vc_dynamic_gallery_html(){
		$html = get_template_part( 'template-parts/dynamic-gallery' );
		return $html;
	}
	
	public function vc_swiper_html(){
		$html = get_template_part( 'template-parts/swiper' );
		return $html;
    }

    public function vc_infobox_html( $atts ) {
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
                    'text' => '',
                ), 
                $atts
            )
        );
         
        // Fill $html var with data
        $html = '
        <div class="vc-infobox-wrap">
            <h2 class="vc-infobox-title">' . $title . '</h2>
            <p>' . $text . '</p>
        </div>';      
        return $html;    
	}

	public function vc_img_text_html( $atts ,$content = null) {
		// Params extraction
		
        extract(
            shortcode_atts(
                array(
                    'title' => '',
					'text' => '',
					'image' => '',
                ), 
                $atts
            )
		);
		 $dir = get_template_directory_uri();
		 $image_src = $dir.'/assets/img/'.$image;
        // Fill $html var with data
        $html = '
		<div class="imgText" >
            <img src="'.$image_src.'" />
            <div class="overlay"></div>
            <div class="centered">
            <h2>'.$title.'</h2>
            <h4>'.$text.'</h4>
            </div>
        </div>';      
        return $html;    
    }


	public function vc_img_text_btn_html( $atts ,$content = null) {
		// Params extraction
		
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
                    'text'   => '',
					'button_text' => '',
					'button_link' => '',
					'image' => '',
                ), 
                $atts
            )
		);
		 $dir = get_template_directory_uri();
		 $image_src = $dir.'/assets/img/'.$image;
        // Fill $html var with data
        $html = '
		<div class="col-4 col-6-medium col-12-small" style="height:517px; min-width:480px; box-shadow: 0px 0px 5px 0px #000; padding-left: 0px; padding-right:0px;">
            <div style="padding-right:0px; padding-left:0px; height: 250px">
                <img class="image" style="height: 250px; width: 100%; object-fit: cover; padding:0px;" src="'.$image_src.'"/>
            </div>   
            <div style="background-color: #fff; padding: 20px; height: 200px;">
                <h3><b>'.$title.'</b></h3>
                <h5 style="text-align:justify;">'.$text.'</h5>
            </div>
            <div style="padding-left: 20px; padding-right: 20px;">
                <button type="button" onclick="window.location.href = \''.$button_link.'\'" class="blockButton">'.$button_text.'</button>
            </div>
        </div>';      
        return $html;    
    }

	public function vc_img_overlay_fade_html( $atts ,$content = null) {
		// Params extraction
		
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
					'button_text' => '',
					'button_link' => '',
					'image' => '',
                ), 
                $atts
            )
		);
		 $dir = get_template_directory_uri();
		 $image_src = $dir.'/assets/img/'.$image;
        // Fill $html var with data
        $html = '
		<div class="imgOverlayFade">
			<div class="container">
				<img src="'.$image_src.'" alt="" />
				<p class="title">'.$title.'</p>
				<div class="overlay"></div>
				<div class="button"><a href="'.$button_link.'">'.$button_text.'</a></div>
			</div>
        </div>';      
        return $html;    
    }
	
	public function vc_angled_div_html( $atts ,$content = null) {
		// Params extraction
		
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
					'text' => '',
					'image' => '',
                ), 
                $atts
            )
		);
		 $dir = get_template_directory_uri();
		 $image_src = $dir.'/assets/img/'.$image;
        // Fill $html var with data
        $html = '
        <div class="row" style="min-height: 500px; overflow: hidden; background: #505962;">
            <div class="col-lg-5" style="padding-right:0px; padding-left:0px; top:50%">
                <img class="image" style="border-bottom-right-radius: 300px; height: 100%; width: 100%; object-fit: cover; padding:0px;" src="'.$image_src.'"/>
            </div>   
            <div class="container col-lg-7 col-md-12" style="color: #fff; padding: 4rem; margin: 2rem atuo; top:50%;">
                <h3 style="text-align:center;">'.$title.'</h3>
                <h5 style="text-align:justify;">'.$text.'</h5>
            </div>
        </div>';
        return $html;    
    }
} // End Element Class

add_action( 'init', 'vc_before_init_actions' );
function vc_before_init_actions() {
     
    //.. Code from other Tutorials ..//
 
    // Require new custom Element
    new vcShortcodes(); 
     
}


function mytheme_theme_setup(){
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
    //add_image_size('featured-image',1000,1200,true);
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'navbar' ),
        //'secondary' => __( 'Secondary Menu', 'myfirsttheme' )
	) );

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
add_action('after_setup_theme', 'mytheme_theme_setup');

function mytheme_style_script(){
	wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/assets/bootstrap/css/bootstrap.css');
	wp_enqueue_style('swiper-css',get_template_directory_uri().'/assets/css/swiper.min.css');
	wp_enqueue_style('style',get_stylesheet_uri());	
	wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/assets/bootstrap/js/bootstrap.js');
	wp_enqueue_script('jquery');
	wp_enqueue_script('swiper-js',get_template_directory_uri().'/assets/js/swiper.min.js');
	wp_enqueue_script('script',get_template_directory_uri().'/script.js');
}
add_action('wp_enqueue_scripts','mytheme_style_script');

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Fugentheme for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'fugentheme_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function fugentheme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
        'name' => 'Visual Composer Website Builder',
        'slug' => 'visualcomposer',
        'required' => false,
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'fugentheme',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'fugentheme' ),
			'menu_title'                      => __( 'Install Plugins', 'fugentheme' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'fugentheme' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'fugentheme' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'fugentheme' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'fugentheme'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'fugentheme'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'fugentheme'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'fugentheme'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'fugentheme'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'fugentheme'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'fugentheme'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'fugentheme'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'fugentheme'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'fugentheme' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'fugentheme' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'fugentheme' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'fugentheme' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'fugentheme' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'fugentheme' ),
			'dismiss'                         => __( 'Dismiss this notice', 'fugentheme' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'fugentheme' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'fugentheme' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}

?>