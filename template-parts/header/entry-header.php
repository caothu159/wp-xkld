<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @since 1.0.0
 */

?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

<?php if ( ! is_page() ) : ?>
    <div class="entry-meta">
        <?php theme_posted_on(); ?>
    </div><!-- .entry-meta -->
<?php endif; ?>
