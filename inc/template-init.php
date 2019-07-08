<?php

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

//Let Contributor Role to Upload Media
if ( current_user_can( 'contributor' ) && ! current_user_can( 'upload_files' ) ) {
    add_action( 'admin_init', 'allow_contributor_uploads' );
    function allow_contributor_uploads() {
        $contributor = get_role( 'contributor' );
        $contributor->add_cap( 'upload_files' );
    }
}
