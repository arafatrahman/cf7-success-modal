<?php
/**
 * Plugin Name: CF7 Success Modal
 * Description: A plugin to show success modal after contact form 7 form submission.
 * Version: 1.0
 * Author: Arafat Rahman
 */

define( 'CF7_SUCCESS_MODAL_ASSETS', plugin_dir_url( __FILE__ ) . 'admin/assets/');
define( 'CF7_SUCCESS_MODAL_VIEWS', plugin_dir_url( __FILE__ ) . 'admin/views/');


function cf7_success_modal_plugin_load(){
    require_once( plugin_dir_path( __FILE__ ) . 'admin/cf7-success-modal-admin.php' );
}

add_action('plugins_loaded', 'cf7_success_modal_plugin_load');

