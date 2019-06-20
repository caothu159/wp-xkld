<?php
/**
 * SVG icons related functions
 *
 * @package WordPress
 * @since 1.0.0
 */

function theme_get_icon_svg( $icon, $size = 24 ) {
    return ThemeSvgIcons::getSvg( 'ui', $icon, $size );
}

function themeGetSocialIconSvg( $icon, $size = 24 ) {
    return ThemeSvgIcons::getSvg( 'social', $icon, $size );
}

function themeGetSocialLinkSvg( $uri, $size = 24 ) {
    return ThemeSvgIcons::getSocialLinkSvg( $uri, $size );
}

function themeNavMenuSocialIcons( $item_output, $item, $depth, $args ) {
    if ( 'social' === $args->theme_location ) {
        $svg = themeGetSocialLinkSvg( $item->url, 26 );
        if ( empty( $svg ) ) {
            $svg = theme_get_icon_svg( 'link' );
        }
        $item_output = str_replace( $args->link_after, '</span>' . $svg, $item_output );
    }

    return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'themeNavMenuSocialIcons', 10, 4 );
