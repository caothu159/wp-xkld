<?php
/**
 * Displays the footer widget area
 *
 * @package WordPress
 * @since 1.0.0
 */

if ( is_active_sidebar( 'sidebar-address' ) ) : ?>

    <aside class="widget-area sidebar-address" role="complementary" aria-label="<?php esc_attr_e( 'Footer' ); ?>">
        <div class="widget-column footer-widget-address">
            <?php dynamic_sidebar( 'sidebar-address' ); ?>
        </div>
    </aside><!-- .widget-area -->

<?php endif; ?>
