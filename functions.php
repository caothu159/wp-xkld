<?php

if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
    require get_template_directory() . '/inc/back-compat.php';

    return;
}

if ( ! function_exists( 'themeSetup' ) ):
    function themeSetup() {
        load_theme_textdomain( 'xkld', get_template_directory() . '/languages' );
        add_theme_support( 'title-tag' );

        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1568, 9999 );

        register_nav_menus(
            array(
                'main'   => __( 'Main Menu' ),
                'footer' => __( 'Footer Menu' ),
                'about'  => __( 'About Menu' ),
            )
        );

        add_theme_support(
            'html5',
            array(
                'gallery',
                'caption',
            )
        );

        add_theme_support(
            'custom-logo',
            array(
                'height'      => 190,
                'width'       => 190,
                'flex-width'  => false,
                'flex-height' => false,
            )
        );

        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'responsive-embeds' );
    }
endif;
add_action( 'after_setup_theme', 'themeSetup' );

function themeScripts() {
    wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

    wp_style_add_data( 'theme-style', 'rtl', 'replace' );

    if ( has_nav_menu( 'main' ) ) {
        wp_enqueue_script( 'theme-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.1', true );
        wp_enqueue_script( 'theme-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(),
            '1.1', true );
    }
}

add_action( 'wp_enqueue_scripts', 'themeScripts' );

function themeSkipLinkFocusFix() {
    ?>
    <script>
        /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function () {
            var t, e = location.hash.substring(1);
            /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
        }, !1);
    </script>
<?php }

add_action( 'wp_print_footer_scripts', 'themeSkipLinkFocusFix' );

require get_template_directory() . '/classes/themeSvgIcons.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/icon-functions.php';

require get_template_directory() . '/inc/template-tags.php';

