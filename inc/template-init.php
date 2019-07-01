<?php

add_action( 'init', 'create_example' );
function create_example() {
    if ( is_admin() ) {
        return;
    }

    $init_folder = get_template_directory() . '/inc/template-init/';

    require $init_folder . 'category.php';
    require $init_folder . 'post.php';
    require $init_folder . 'page.php';
    require $init_folder . 'menu.php';
    require $init_folder . 'sidebar.php';
}
