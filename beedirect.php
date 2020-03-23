<?php
ob_start();
/*
  Plugin name: BeeDirect by Omnibees
  Plugin uri: widgets.omnibees.com/manual
  Description: Widgets to BeeDirect
  Version: 0.0.1
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
      'title' => __( 'Omnibees', 'plugin-name' ),
      'icon' => 'fa fa-calendar',
    ]
  );
}

add_action('elementor/elements/categories_registered','add_elementor_widget_categories');
require_once('elementor/init.php');


function beedirect_init_script(){
  wp_enqueue_script(
    'beedirect-init','https://code.jquery.com/jquery-3.4.1.min.js', 
    array('jquery')
  );
}

add_action('wp_enqueue_scripts','beedirect_init_script');
