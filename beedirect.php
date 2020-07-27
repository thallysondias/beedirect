<?php
/*
  Plugin name: BeeDirect by Omnibees
  Plugin uri: widgets.omnibees.com/manual
  Description: Widgets to BeeDirect
  Version: 1.3.7
  Author: Omnibees
  Author uri: www.omnibees.com
  License: GPlv2 or Later
  Text Domain: beedirect
*/

if(!defined('ABSPATH'))
exit;

require 'update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
  'https://github.com/thallysondias/beedirect',
  __FILE__,
  'beedirect'
);

add_action('admin_menu', 'BeeDirect');

function beedirect() {
  add_menu_page ('BeeDirect by Omnibees',
                 'BeeDirect',
                 'manage_options',
                 'beedirect',
                 'beedirect_omnibees',
                 'dashicons-calendar-alt',
                 90);
}
function beedirect_omnibees() {
  //Load Page
  include_once ('admin/index.php');

  //Load Assets
  wp_enqueue_style('beedirect', plugin_dir_url( __FILE__ ) . 'assets/beedirect-style.css?v=omnibees1');
}

function add_elementor_widget_categories( $elements_manager ) {
  $elements_manager->add_category(
    'Omnibees',
    [
      'title' => __( 'Omnibees', 'elementor' ),
      'icon' => 'fa fa-calendar',
    ]
  );
}

add_action('elementor/elements/categories_registered','add_elementor_widget_categories');
require_once('elementor/init.php');

function beedirect_init_style(){
  wp_enqueue_style('beedirect-rooms', plugin_dir_url( __FILE__ ) . 'widgets/rooms/assets/css/style.css?v=2.1');
  wp_enqueue_style('beedirect-calendar', plugin_dir_url( __FILE__ ) . 'widgets/calendar/assets/css/style.css?v=2.1');
  wp_enqueue_style('beedirect-rooms-flatpickr', plugin_dir_url( __FILE__ ) . 'widgets/rooms/assets/css/flatpickr.min.css');
  wp_enqueue_style('beedirect-rooms-font','https://use.fontawesome.com/releases/v5.13.0/css/all.css');
}

function beedirect_init_script(){
  wp_enqueue_script('flatpickr-omnibees', plugin_dir_url( __FILE__ ) . 'widgets/rooms/assets/js/flatpickr.min.js?v=omnibees' , array ( 'jquery' ), true);
  wp_enqueue_script('glide-omnibees', plugin_dir_url( __FILE__ ) . 'widgets/rooms/assets/js/glide.min.js?v=omnibees', array ( 'jquery' ), true);
  wp_enqueue_script('lightpick-omnibees', plugin_dir_url( __FILE__ ) . 'widgets/calendar/assets/js/lightpick.js?v=omnibees', array ( 'jquery' ), true);
  wp_enqueue_script('moment-omnibees', plugin_dir_url( __FILE__ ) . 'widgets/calendar/assets/js/moment.js?v=omnibees', array ( 'jquery' ), true);
}

function beedirect_listrooms_init() {
    echo '<script type="text/javascript">
    jQuery(document).ready(function($){
      setTimeout(function(){
        listRoomsApi.init();
      },500);
    });
  </script>';
}

add_action('wp_enqueue_scripts','beedirect_init_style', 9999);
add_action('wp_footer','beedirect_init_script');

//add_action('wp_footer', 'beedirect_listrooms_init');
