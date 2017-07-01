<?php

/**
 * Add Google Fonts
 */
function ic_google_fonts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Niconne|Raleway:400,400i,700,700i' );
}
add_action( 'wp_enqueue_scripts', 'ic_google_fonts' );
