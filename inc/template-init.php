<?php

//Let Contributor Role to Upload Media
if ( current_user_can( 'contributor' ) && ! current_user_can( 'upload_files' ) ) {
    add_action( 'admin_init', 'allow_contributor_uploads' );
    function allow_contributor_uploads() {
        $contributor = get_role( 'contributor' );
        $contributor->add_cap( 'upload_files' );
    }
}

add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {

    /**
     * Post Type: Jobs.
     */

    $labels = array(
        "name"          => __( "Jobs", "custom-post-type-ui" ),
        "singular_name" => __( "Job", "custom-post-type-ui" ),
    );

    $args = array(
        "label"                 => __( "Jobs", "custom-post-type-ui" ),
        "labels"                => $labels,
        "description"           => "",
        "public"                => true,
        "publicly_queryable"    => true,
        "show_ui"               => true,
        "delete_with_user"      => false,
        "show_in_rest"          => true,
        "rest_base"             => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive"           => false,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "menu_position"         => 2,
        "exclude_from_search"   => false,
        "capability_type"       => "post",
        "map_meta_cap"          => true,
        "hierarchical"          => false,
        "rewrite"               => array( "slug" => "job", "with_front" => true ),
        "query_var"             => true,
        "supports"              => array( "title", "editor", "thumbnail" ),
        "taxonomies"            => array( "trade" ),
    );

    register_post_type( "job", $args );
}

add_action( 'init', 'cptui_register_my_taxes' );
function cptui_register_my_taxes() {

    /**
     * Taxonomy: Trade.
     */

    $labels = array(
        "name"          => __( "Trade" ),
        "singular_name" => __( "Ngành nghề" ),
    );

    $args = array(
        "label"                 => __( "Trade" ),
        "labels"                => $labels,
        "public"                => true,
        "publicly_queryable"    => true,
        "hierarchical"          => true,
        "show_ui"               => true,
        "show_in_menu"          => true,
        "show_in_nav_menus"     => true,
        "query_var"             => true,
        "rewrite"               => array( 'slug' => 'nganh-nghe', 'with_front' => true, ),
        "show_admin_column"     => true,
        "show_in_rest"          => true,
        "rest_base"             => "trade",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit"    => true,
    );
    register_taxonomy( "trade", array( "job" ), $args );
}

add_action( 'init', 'create_example' );
function create_example() {
    if ( is_admin() ) {
        return;
    }

    get_template_part( 'inc/template-init/category' );
    get_template_part( 'inc/template-init/post' );
    get_template_part( 'inc/template-init/page' );
    get_template_part( 'inc/template-init/menu' );
    get_template_part( 'inc/template-init/sidebar' );
}
