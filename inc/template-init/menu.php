<?php

$locations     = get_theme_mod( 'nav_menu_locations' );
$jobs_category = get_taxonomy( 'trade' );
$news_category = get_category_by_slug( 'tin-tuc' );
$about_page    = get_page_by_path( 'about' );
$contact_page  = get_page_by_path( 'contact' );

//dd( $jobs_category );

//wp_delete_nav_menu( 'Main menu' );
if ( ! wp_get_nav_menu_object( 'Main menu' ) ) {
    $main_menu_id = wp_create_nav_menu( 'Main menu' );

    wp_update_nav_menu_item( $main_menu_id, 0, array(
        'menu-item-title'  => __( 'Trang Chủ' ),
        'menu-item-url'    => get_bloginfo( 'url' ),
        'menu-item-status' => 'publish'
    ) );

    wp_update_nav_menu_item( $main_menu_id, 0, array(
        'menu-item-title'     => __( 'Đơn hàng đi Nhật' ),
        'menu-item-url'       => get_category_link( $jobs_category->term_id ),
        'menu-item-object-id' => $jobs_category->term_id,
        'menu-item-object'    => 'category',
        'menu-item-type'      => 'taxonomy',
        'menu-item-status'    => 'publish'
    ) );

    wp_update_nav_menu_item( $main_menu_id, 0, array(
        'menu-item-title'     => $news_category->name,
        'menu-item-url'       => get_category_link( $news_category->term_id ),
        'menu-item-object-id' => $news_category->term_id,
        'menu-item-object'    => 'category',
        'menu-item-type'      => 'taxonomy',
        'menu-item-status'    => 'publish'
    ) );

    wp_update_nav_menu_item( $main_menu_id, 0, array(
        'menu-item-title'     => __( 'giới thiệu' ),
        'menu-item-url'       => get_category_link( $about_page->ID ),
        'menu-item-object-id' => $about_page->ID,
        'menu-item-object'    => 'page',
        'menu-item-type'      => 'post_type',
        'menu-item-status'    => 'publish'
    ) );

    wp_update_nav_menu_item( $main_menu_id, 0, array(
        'menu-item-title'     => __( 'Liên hệ' ),
        'menu-item-url'       => get_category_link( $contact_page->ID ),
        'menu-item-object-id' => $contact_page->ID,
        'menu-item-object'    => 'page',
        'menu-item-type'      => 'post_type',
        'menu-item-status'    => 'publish'
    ) );

    wp_update_nav_menu_item( $main_menu_id, 0, array(
        'menu-item-title'   => '0986.111.979',
        'menu-item-url'     => 'tel:0986111979',
        'menu-item-classes' => 'tel',
        'menu-item-type'    => 'custom',
        'menu-item-status'  => 'publish'
    ) );

    $locations['main'] = $main_menu_id;
}

//wp_delete_nav_menu( 'Footer About' );
if ( ! wp_get_nav_menu_object( 'Footer About' ) ) {
    $about_menu_id = wp_create_nav_menu( 'Footer About' );

    wp_update_nav_menu_item( $about_menu_id, 0, array(
        'menu-item-title'     => __( 'Giới thiệu' ),
        'menu-item-url'       => get_category_link( $about_page->ID ),
        'menu-item-object-id' => $about_page->ID,
        'menu-item-object'    => 'page',
        'menu-item-type'      => 'post_type',
        'menu-item-status'    => 'publish'
    ) );

    wp_update_nav_menu_item( $about_menu_id, 0, array(
        'menu-item-title'     => __( 'Tầm nhìn - Sứ mệnh' ),
        'menu-item-url'       => get_category_link( $news_category->term_id ),
        'menu-item-object-id' => $news_category->term_id,
        'menu-item-object'    => 'category',
        'menu-item-type'      => 'taxonomy',
        'menu-item-status'    => 'publish'
    ) );

    $locations['about'] = $about_menu_id;
}

//wp_delete_nav_menu( 'Footer Menu' );
if ( ! wp_get_nav_menu_object( 'Footer Menu' ) ) {
    $footer_menu_id = wp_create_nav_menu( 'Footer Menu' );

    wp_update_nav_menu_item( $footer_menu_id, 0, array(
        'menu-item-title'     => __( 'Đơn hàng đi Nhật' ),
        'menu-item-url'       => get_category_link( $jobs_category->term_id ),
        'menu-item-object-id' => $jobs_category->term_id,
        'menu-item-object'    => 'category',
        'menu-item-type'      => 'taxonomy',
        'menu-item-status'    => 'publish'
    ) );

    wp_update_nav_menu_item( $footer_menu_id, 0, array(
        'menu-item-title'     => $news_category->name,
        'menu-item-url'       => get_category_link( $news_category->term_id ),
        'menu-item-object-id' => $news_category->term_id,
        'menu-item-object'    => 'category',
        'menu-item-type'      => 'taxonomy',
        'menu-item-status'    => 'publish'
    ) );

    $locations['footer'] = $footer_menu_id;
}

set_theme_mod( 'nav_menu_locations', $locations );
