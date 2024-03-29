<?php
/**
 * Displays the footer widget area
 *
 * @package WordPress
 * @since 1.0.0
 */

if ( is_active_sidebar( 'sidebar-title' ) ) : ?>

    <aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer' ); ?>">
        <div class="widget-column footer-widget-title">
            <?php dynamic_sidebar( 'sidebar-title' ); ?>
        </div>
    </aside><!-- .widget-area -->

<?php endif; ?>
