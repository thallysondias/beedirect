<?php

class Omnibees_Widget {

  protected static $instance = null;

  public static function get_instance(){
    if(! isset( static::$instance)){
      static::$instance = new static;
    }
    return static::$instance;
  }
  protected function __construct(){
    require_once( WP_PLUGIN_DIR .'/beedirect/widgets/price/index.php');
    require_once( WP_PLUGIN_DIR .'/beedirect/widgets/rooms/index.php');
    add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
  }

  public function register_widgets(){
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\beePrice());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\beeRooms());
  }
}

function beedirect_init(){
  Omnibees_Widget::get_instance();
}

add_action('init', 'beedirect_init');
