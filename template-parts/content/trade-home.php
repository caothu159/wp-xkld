<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

; ?>
<div class="col-6 col-md-4">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'overflow-hidden' ); ?>>
        <div class="entry-thumbnail">
            <?php theme_post_thumbnail(); ?>
        </div><!-- .entry-thumbnail -->

        <div class="entry-body col-12">

            <header class="entry-header">
                <?php
                the_title( sprintf( '<h3 class="entry-title mt-2 mb-2"><a href="%s" rel="bookmark">',
                    esc_url( get_permalink() ) ),
                    '</a></h3>' );
                ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                $_the_excerpts = get_the_excerpt();

                $_the_excerpts = explode( "\n", $_the_excerpts );

                $the_excerpt = "<ul>";
                foreach ( $_the_excerpts as $_the_excerpt ) {
                    $the_excerpt .= "<li>" . $_the_excerpt . "</li>";
                }
                $the_excerpt .= "</ul>";
                echo $the_excerpt;
                ?>
                <a class="more-link" href="<?php echo esc_url( get_permalink() ) ?>"><?php _e( 'xem chi tiết' ) ?></a>
            </div><!-- .entry-content -->

        </div><!-- .entry-body -->
    </article><!-- #post-<?php the_ID(); ?> -->
</div>
