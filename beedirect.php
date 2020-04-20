<?php
ob_start();
/*
  Plugin name: BeeDirect by Omnibees
  Plugin uri: widgets.omnibees.com/manual
  Description: Widgets to BeeDirect
  Version: 0.1.1
  Author: Omnibees
  Author uri: www.omnibees.com
  License: GPlv2 or Later
*/

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
  include_once ('admin/index.php');
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


function beedirect_init_script(){
  wp_enqueue_style('beedirect-rooms', plugin_dir_url( __FILE__ ) . 'widgets/rooms/assets/css/style.css?v=1.3');
  wp_enqueue_style('beedirect-rooms-flatpikr', plugin_dir_url( __FILE__ ) . 'widgets/rooms/assets/css/flatpickr.min.css');
  wp_enqueue_style('beedirect-rooms-font','https://use.fontawesome.com/releases/v5.13.0/css/all.css');

  wp_enqueue_script('beedirect-init','https://code.jquery.com/jquery-3.4.1.min.js');
  wp_enqueue_script('glide', 'https://cdn.jsdelivr.net/npm/@glidejs/glide', array ( 'jquery' ), true);

}

add_action('wp_enqueue_scripts','beedirect_init_script');
