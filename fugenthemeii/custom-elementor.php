<?php
namespace WPC;

// use Elementor\Plugin; ?????

class Widget_Loader{

  private static $_instance = null;

  public static function instance()
  {
    if (is_null(self::$_instance)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }


  private function include_widgets_files(){
    require_once(__DIR__ . '/widgets/element.php');
    require_once(__DIR__ . '/widgets/element_2.php');
    require_once(__DIR__ . '/widgets/element_3.php');
    require_once(__DIR__ . '/widgets/element_4.php');
    require_once(__DIR__ . '/widgets/element_5.php');
    require_once(__DIR__ . '/widgets/element_6.php');
    require_once(__DIR__ . '/widgets/element_7.php');
    require_once(__DIR__ . '/widgets/element_8.php');
  }

  public function register_widgets(){

    $this->include_widgets_files();

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Element());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Element2());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Element3());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Element4());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Element5());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Element6());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Element7());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Element8());
  }

  public function __construct(){
    add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);
  }
}

// Instantiate Plugin Class
Widget_Loader::instance();
