<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0.0
 */

; ?>

<div class="container">
    <div class="row">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if ( ! theme_can_show_post_thumbnail() ): ?>
                <header class="entry-header">
                    <?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
                </header>
            <?php endif; ?>

            <div class="entry-content p-3">
                <?php
                the_content(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    )
                );

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . __( 'Pages:' ),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->

    </div>
</div>
