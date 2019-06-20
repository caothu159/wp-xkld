<?php
function theme_switch_theme() {
    switch_theme( WP_DEFAULT_THEME );
    unset( $_GET['activated'] );
    add_action( 'admin_notices', 'theme_upgrade_notice' );
}

add_action( 'after_switch_theme', 'theme_switch_theme' );

function theme_upgrade_notice() {
    $message = sprintf( __( 'This theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.' ),
        $GLOBALS['wp_version'] );
    printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @global string $wp_version WordPress version.
 */
function theme_customize() {
    wp_die(
        sprintf(
            __( 'This theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.' ),
            $GLOBALS['wp_version']
        ),
        '',
        array(
            'back_link' => true,
        )
    );
}

add_action( 'load-customize.php', 'theme_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @global string $wp_version WordPress version.
 */
function theme_preview() {
    if ( isset( $_GET['preview'] ) ) {
        wp_die( sprintf( __( 'This theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.' ),
            $GLOBALS['wp_version'] ) );
    }
}

add_action( 'template_redirect', 'theme_preview' );
