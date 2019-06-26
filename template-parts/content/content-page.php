<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0.0
 */

; ?>
<div class="container">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if ( ! theme_can_show_post_thumbnail() ): ?>
            <header class="entry-header">
                <?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
            </header>
        <?php endif; ?>

        <div class="entry-content">
            <?php the_content(); ?>
        </div><!-- .entry-content -->

    </article><!-- #post-<?php the_ID(); ?> -->

</div>
