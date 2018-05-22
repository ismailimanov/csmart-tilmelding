<?php
/*
Plugin Name: C-Smart Tilmelding
Plugin URI: https://csmart.imanov.io
Description: Tilmeldingssystem til C-Smart
Version: 1.0
Author: Ismail og Kevin
Author URI: https://imanov.io
*/

add_action( 'admin_menu', 'csmart_tilmelding_menu' );

/** Step 1. */
function csmart_tilmelding_menu() {
    add_options_page( 'test 1', 'Test 2', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}

/** Step 3. */
function my_plugin_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    echo '<div class="wrap">';
    echo '<p>Indhold</p>';
    echo '</div>';
}