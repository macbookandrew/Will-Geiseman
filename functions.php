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

/**
 * Render sermon excerpt (customized)
 */
function ic_wpfc_sermon_excerpt() {
    global $post; ?>
    <div class="wpfc_sermon_wrap cf">
        <div class="wpfc_sermon_image">
            <?php render_sermon_image( 'sermon_small' ); ?>
        </div>
        <div class="wpfc_sermon_meta cf">
            <p>
                <?php
                wpfc_sermon_date( get_option( 'date_format' ), '<span class="sermon_date">', '</span> ' );
                echo the_terms( $post->ID, 'wpfc_service_type', ' <span class="service_type">(', ' ', ')</span>' );
                ?></p>
            <p><?php
                wpfc_sermon_meta( 'bible_passage', '<span class="bible_passage">' . __( 'Bible Text: ', 'sermon-manager' ), '</span>' );
                echo the_terms( $post->ID, 'wpfc_preacher', '<span class="preacher_name">', ', ', '</span>' );
                echo the_terms( $post->ID, 'wpfc_sermon_series', '<p><span class="sermon_series">' . __( 'Series: ', 'sermon-manager' ), ' ', '</span></p>' );
                ?>
            </p>
        </div>
        <?php if ( \SermonManager::getOption( 'archive_player' ) ): ?>
            <div class="wpfc_sermon cf">
                <?php echo wpfc_sermon_media(); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
}
remove_action( 'sermon_excerpt', 'wpfc_sermon_excerpt' );
add_action( 'sermon_excerpt', 'ic_wpfc_sermon_excerpt' );
