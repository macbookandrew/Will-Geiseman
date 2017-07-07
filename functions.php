<?php

/**
 * Add Google Fonts
 */
function ic_google_fonts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Niconne|Raleway:400,400i,700,700i' );
}
add_action( 'wp_enqueue_scripts', 'ic_google_fonts' );

/**
 * Tweak sermons archive title
 * @param  string $title default title
 * @return string modified title
 */
function ic_sermon_archive_title( $title ) {
    if ( is_post_type_archive( 'wpfc_sermon' ) ) {
        $title = 'Messages';
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'ic_sermon_archive_title' );
