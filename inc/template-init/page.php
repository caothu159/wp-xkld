<?php

//get_template_part( 'inc/template-init/page/home' );
//get_template_part( 'inc/template-init/page/contact' );
//get_template_part( 'inc/template-init/page/about' );
//get_template_part( 'inc/template-init/page/career' );
//get_template_part( 'inc/template-init/page/career', 'image' );
//get_template_part( 'inc/template-init/page/info' );
//get_template_part( 'inc/template-init/page/info', 'image' );

function create_pages_fly( $page_name, $page_content = 'Starter content', $page_title = '' ) {
    // Insert the post into the database
    wp_insert_post( array(
        'post_title'   => $page_title ?: $page_name,
        'post_content' => $page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_type'    => 'page',
        'post_name'    => $page_name
    ) );
}

function create_image_fly( $image_name, $image_content = '' ) {
    $upload_dir  = wp_upload_dir();
    $upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

    $img = $image_content;
    $img = str_replace( ' ', '+', $img );

    $decoded = base64_decode( $img );

    $filename        = "$image_name-img.jpg";
    $hashed_filename = md5( $filename . uniqid() ) . '_' . $filename;
// @new
    $image_upload = file_put_contents( $upload_path . $hashed_filename, $decoded );

//HANDLE UPLOADED FILE
    if ( ! function_exists( 'wp_handle_sideload' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }

// Without that I'm getting a debug error!?
    if ( ! function_exists( 'wp_get_current_user' ) ) {
        require_once( ABSPATH . 'wp-includes/pluggable.php' );
    }

// @new
    $file             = array();
    $file['error']    = '';
    $file['tmp_name'] = $upload_path . $hashed_filename;
    $file['name']     = $filename;
    $file['type']     = 'image/jpeg';
    $file['size']     = filesize( $upload_path . $hashed_filename );

    wp_delete_file( $filename );

// upload file to server
// @new use $file instead of $image_upload
    $results = wp_handle_sideload( $file, array(
        'test_form'                => false,
        'unique_filename_callback' => function ( $dir, $name, $ext ) {
            $name = str_replace( ' ', '-', $name );

            return $name;
        }
    ) );

    if ( ! empty( $results['error'] ) ) {
        dd( $results );

        return;
    }

    $filename  = $results['file']; // Full path to the file
    $local_url = $results['url'];  // URL to the file in the uploads dir
    $type      = $results['type']; // MIME type of the file

// Get file title
    $title = preg_replace( '/\.[^.]+$/', '', basename( $filename ) );
// Perform any actions here based in the above results
    $attachment = array(
        'post_mime_type' => $type,
        'post_title'     => $title,
        'post_content'   => '',
        'post_status'    => 'inherit',
        'guid'           => $upload_dir['url'] . '/' . basename( $filename )
    );
// Does the attachment already exist ?
    if ( ! function_exists( 'post_exists' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/post.php' );
    }
    if ( post_exists( $title ) ) {
        $attachment_exists = get_page_by_title( $title, OBJECT, 'attachment' );
        if ( ! empty( $attachment_exists ) ) {
            $attachment['ID'] = $attachment_exists->ID;
        }
    }
    $attachment_id = wp_insert_attachment( $attachment, $filename );

// Without that I'm getting a debug error!?
    if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
    }
    $attachment = wp_generate_attachment_metadata( $attachment_id, $filename );
    wp_update_attachment_metadata( $attachment_id, $attachment );
    set_post_thumbnail( get_page_by_path( "$image_name" )->ID, $attachment_id );
}
