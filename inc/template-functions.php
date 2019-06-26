<?php

add_filter( 'body_class', 'themeBodyClasses' );
function themeBodyClasses( $classes ) {

    if ( is_singular() ) {
        // Adds `singular` to singular pages.
        $classes[] = 'singular';
    } else {
        // Adds `hfeed` to non singular pages.
        $classes[] = 'hfeed';
    }

    // Adds a class if image filters are enabled.
    if ( themeImageFiltersEnabled() ) {
        $classes[] = 'image-filters-enabled';
    }

    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }

    return $classes;
}


add_filter( 'post_class', 'themePostClasses', 10, 3 );
function themePostClasses( $classes, $class, $post_id ) {
    $classes[] = 'entry';

    return $classes;
}


add_action( 'wp_head', 'themePingbackHeader' );
function themePingbackHeader() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}

add_filter( 'get_the_archive_title', 'themeGetTheArchiveTitle' );
function themeGetTheArchiveTitle() {
    if ( is_category() ) {
        $title = __( 'Category Archives: ' ) . '<span class="page-description">' . single_term_title( '',
                false ) . '</span>';
    } elseif ( is_tag() ) {
        $title = __( 'Tag Archives: ' ) . '<span class="page-description">' . single_term_title( '',
                false ) . '</span>';
    } elseif ( is_author() ) {
        $title = __( 'Author Archives: ' ) . '<span class="page-description">' . get_the_author_meta( 'display_name' ) . '</span>';
    } elseif ( is_year() ) {
        $title = __( 'Yearly Archives: ' ) . '<span class="page-description">' . get_the_date( _x( 'Y',
                'yearly archives date format' ) ) . '</span>';
    } elseif ( is_month() ) {
        $title = __( 'Monthly Archives: ' ) . '<span class="page-description">' . get_the_date( _x( 'F Y',
                'monthly archives date format' ) ) . '</span>';
    } elseif ( is_day() ) {
        $title = __( 'Daily Archives: ' ) . '<span class="page-description">' . get_the_date() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = __( 'Post Type Archives: ' ) . '<span class="page-description">' . post_type_archive_title( '',
                false ) . '</span>';
    } elseif ( is_tax() ) {
        $tax = get_taxonomy( get_queried_object()->taxonomy );
        /* translators: %s: Taxonomy singular name */
        $title = sprintf( esc_html__( '%s Archives:' ), $tax->labels->singular_name );
    } else {
        $title = __( 'Archives:' );
    }

    return $title;
}


function theme_can_show_post_thumbnail() {
    return apply_filters( 'theme_can_show_post_thumbnail',
        ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}

function themeImageFiltersEnabled() {
    return 0 !== get_theme_mod( 'image_filter', 1 );
}

add_filter( 'wp_get_attachment_image_attributes', 'themePostThumbnailSizesAttr', 10, 1 );
function themePostThumbnailSizesAttr( $attr ) {

    if ( is_admin() ) {
        return $attr;
    }

    if ( ! is_singular() ) {
        $attr['sizes'] = '(max-width: 34.9rem) calc(100vw - 2rem), (max-width: 53rem) calc(8 * (100vw / 12)), (min-width: 53rem) calc(6 * (100vw / 12)), 100vw';
    }

    return $attr;
}


add_filter( 'wp_nav_menu', 'themeAddEllipsesToNav', 10, 2 );
function themeAddEllipsesToNav( $nav_menu, $args ) {

    if ( 'menu-1' === $args->theme_location ):

        $nav_menu .= '<div class="main-menu-more">';
        $nav_menu .= '<ul class="main-menu">';
        $nav_menu .= '<li class="menu-item menu-item-has-children">';
        $nav_menu .= '<button class="submenu-expand main-menu-more-toggle is-empty" tabindex="-1" aria-label="More" aria-haspopup="true" aria-expanded="false">';
        $nav_menu .= '<span class="screen-reader-text">' . esc_html__( 'More' ) . '</span>';
        $nav_menu .= theme_get_icon_svg( 'arrow_drop_down_ellipsis' );
        $nav_menu .= '</button>';
        $nav_menu .= '<ul class="sub-menu hidden-links">';
        $nav_menu .= '<li id="menu-item--1" class="mobile-parent-nav-menu-item menu-item--1">';
        $nav_menu .= '<button class="menu-item-link-return">';
        $nav_menu .= theme_get_icon_svg( 'chevron_left' );
        $nav_menu .= esc_html__( 'Back' );
        $nav_menu .= '</button>';
        $nav_menu .= '</li>';
        $nav_menu .= '</ul>';
        $nav_menu .= '</li>';
        $nav_menu .= '</ul>';
        $nav_menu .= '</div>';

    endif;

    return $nav_menu;
}

add_filter( 'nav_menu_link_attributes', 'themeNavMenuLinkAttributes', 10, 4 );
function themeNavMenuLinkAttributes( $atts, $item, $args, $depth ) {

    // Add [aria-haspopup] and [aria-expanded] to menu items that have children
    $item_has_children = in_array( 'menu-item-has-children', $item->classes );
    if ( $item_has_children ) {
        $atts['aria-haspopup'] = 'true';
        $atts['aria-expanded'] = 'false';
    }

    return $atts;
}


add_filter( 'walker_nav_menu_start_el', 'themeAddDropdownIcons', 10, 4 );
function themeAddDropdownIcons( $output, $item, $depth, $args ) {

    // Only add class to 'top level' items on the 'primary' menu.
    if ( ! isset( $args->theme_location ) || 'menu-1' !== $args->theme_location ) {
        return $output;
    }

    if ( in_array( 'mobile-parent-nav-menu-item', $item->classes, true ) && isset( $item->original_id ) ) {
        // Inject the keyboard_arrow_left SVG inside the parent nav menu item, and let the item link to the parent item.
        // @todo Only do this for nested submenus? If on a first-level submenu, then really the link could be "#" since the desire is to remove the target entirely.
        $link = sprintf(
            '<button class="menu-item-link-return" tabindex="-1">%s',
            theme_get_icon_svg( 'chevron_left', 24 )
        );

        // replace opening <a> with <button>
        $output = preg_replace(
            '/<a\s.*?>/',
            $link,
            $output,
            1// Limit.
        );

        // replace closing </a> with </button>
        $output = preg_replace(
            '#</a>#i',
            '</button>',
            $output,
            1// Limit.
        );

    } elseif ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

        // Add SVG icon to parent items.
        $icon = theme_get_icon_svg( 'keyboard_arrow_down', 24 );

        $output .= sprintf(
            '<button class="submenu-expand" tabindex="-1">%s</button>',
            $icon
        );
    }

    return $output;
}

add_filter( 'wp_nav_menu_objects', 'themeAddMobileParentNavMenuItems', 10, 2 );
function themeAddMobileParentNavMenuItems( $sorted_menu_items, $args ) {
    static $pseudo_id = 0;
    if ( ! isset( $args->theme_location ) || 'menu-1' !== $args->theme_location ) {
        return $sorted_menu_items;
    }

    $amended_menu_items = array();
    foreach ( $sorted_menu_items as $nav_menu_item ) {
        $amended_menu_items[] = $nav_menu_item;
        if ( in_array( 'menu-item-has-children', $nav_menu_item->classes, true ) ) {
            $parent_menu_item                   = clone $nav_menu_item;
            $parent_menu_item->original_id      = $nav_menu_item->ID;
            $parent_menu_item->ID               = -- $pseudo_id;
            $parent_menu_item->db_id            = $parent_menu_item->ID;
            $parent_menu_item->object_id        = $parent_menu_item->ID;
            $parent_menu_item->classes          = array( 'mobile-parent-nav-menu-item' );
            $parent_menu_item->menu_item_parent = $nav_menu_item->ID;

            $amended_menu_items[] = $parent_menu_item;
        }
    }

    return $amended_menu_items;
}

function themeHslToHex( $h, $s, $l, $to_hex = true ) {

    $h /= 360;
    $s /= 100;
    $l /= 100;

    $r = $l;
    $g = $l;
    $b = $l;
    $v = ( $l <= 0.5 ) ? ( $l * ( 1.0 + $s ) ) : ( $l + $s - $l * $s );
    if ( $v > 0 ) {
        $m;
        $sv;
        $sextant;
        $fract;
        $vsf;
        $mid1;
        $mid2;

        $m       = $l + $l - $v;
        $sv      = ( $v - $m ) / $v;
        $h       *= 6.0;
        $sextant = floor( $h );
        $fract   = $h - $sextant;
        $vsf     = $v * $sv * $fract;
        $mid1    = $m + $vsf;
        $mid2    = $v - $vsf;

        switch ( $sextant ) {
            case 0:
                $r = $v;
                $g = $mid1;
                $b = $m;
                break;
            case 1:
                $r = $mid2;
                $g = $v;
                $b = $m;
                break;
            case 2:
                $r = $m;
                $g = $v;
                $b = $mid1;
                break;
            case 3:
                $r = $m;
                $g = $mid2;
                $b = $v;
                break;
            case 4:
                $r = $mid1;
                $g = $m;
                $b = $v;
                break;
            case 5:
                $r = $v;
                $g = $m;
                $b = $mid2;
                break;
        }
    }
    $r = round( $r * 255, 0 );
    $g = round( $g * 255, 0 );
    $b = round( $b * 255, 0 );

    if ( $to_hex ) {

        $r = ( $r < 15 ) ? '0' . dechex( $r ) : dechex( $r );
        $g = ( $g < 15 ) ? '0' . dechex( $g ) : dechex( $g );
        $b = ( $b < 15 ) ? '0' . dechex( $b ) : dechex( $b );

        return "#$r$g$b";

    }

    return "rgb($r, $g, $b)";
}

if ( ! function_exists( 'dump' ) ) {
    function dump() {
        $args = func_get_args();
        ini_set( "highlight.comment", "#969896; font-style: italic" );
        ini_set( "highlight.default", "#FFFFFF" );
        ini_set( "highlight.html", "#D16568" );
        ini_set( "highlight.keyword", "#7FA3BC; font-weight: bold" );
        ini_set( "highlight.string", "#F2C47E" );
        $output = highlight_string( "<?php\n\n" . var_export( $args, true ), true );
        echo "<div style=\"background-color: #1C1E21; padding: 1rem\">{$output}</div>";
    }
}

if ( ! function_exists( 'dd' ) ) {
    function dd() {
        $args = func_get_args();
        call_user_func_array( 'dump', $args );
        die();
    }
}
if ( ! function_exists( 'd' ) ) {
    function d() {
        $args = func_get_args();
        call_user_func_array( 'dump', $args );
    }
}
