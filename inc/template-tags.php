<?php
/**
 * Custom template tags for this theme
 *
 * @package WordPress
 * @since 1.0.0
 */

if ( ! function_exists( 'theme_posted_on' ) ):
    function theme_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        printf(
            '<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
            theme_get_icon_svg( 'watch', 16 ),
            esc_url( get_permalink() ),
            $time_string
        );
    }
endif;

if ( ! function_exists( 'themePostedBy' ) ):
    function themePostedBy() {
        printf(
            '<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
            theme_get_icon_svg( 'person', 16 ),
            __( 'Posted by' ),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_html( get_the_author() )
        );
    }
endif;

if ( ! function_exists( 'themePostThumbnail' ) ):

    function themePostThumbnail() {
        if ( ! theme_can_show_post_thumbnail() ) {
            return;
        }

        if ( is_singular() ):
            $thumbnail = get_the_post_thumbnail();
            echo <<<EOT
            <figure class="post-thumbnail">
                $thumbnail
            </figure>
EOT;
        else:
            $thumbnail = get_the_post_thumbnail( 'post-thumbnail' );
            $permalink = esc_url( apply_filters( 'the_permalink', get_permalink( $post ), $post ) );
            echo <<<EOT
            <figure class="post-thumbnail">
                <a class="post-thumbnail-inner" href="$permalink" aria-hidden="true" tabindex="-1">
                    $thumbnail
                </a>
            </figure>
EOT;
        endif; // End is_singular().
    }
endif;

if ( ! function_exists( 'themeThePostsNavigation' ) ):
    /**
     * Documentation for function.
     */
    function themeThePostsNavigation() {
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => sprintf(
                    '%s <span class="nav-prev-text">%s</span>',
                    theme_get_icon_svg( 'chevron_left', 22 ),
                    __( 'Newer posts' )
                ),
                'next_text' => sprintf(
                    '<span class="nav-next-text">%s</span> %s',
                    __( 'Older posts' ),
                    theme_get_icon_svg( 'chevron_right', 22 )
                ),
            )
        );
    }
endif;

if ( ! function_exists( 'wpBodyOpen' ) ):
    function wpBodyOpen() {
        do_action( 'wp_body_open' );
    }
endif;
