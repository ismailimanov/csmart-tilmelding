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

function csmart_tilmelding_menu(){

    $page_title = 'C-Smart Tilmelding1';
    $menu_title = 'C-Smart Tilmelding2';
    $capability = 'manage_options';
    $menu_slug  = 'csmart-tilmelding';
    $function   = 'csmart_tilmelding_side';
    $icon_url   = 'dashicons-media-code';
    $position   = 2;

    add_menu_page( $page_title,
        $menu_title,
        $capability,
        $menu_slug,
        $function,
        $icon_url,
        $position );
}

function csmart_tilmelding_side() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }

    echo '<div class="wrap">';
    echo '<p>Indhold</p>';
    echo '</div>';
}