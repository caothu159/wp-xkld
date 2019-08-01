<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @since 1.0.0
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="container text-white">
        <?php get_template_part( 'template-parts/footer/footer', 'title' ); ?>

        <div class="site-info row">

            <?php if ( is_active_sidebar( 'sidebar-address' ) ) : ?>

                <aside class="widget-area sidebar-address col-md-4" role="complementary"
                       aria-label="<?php esc_attr_e( 'Footer' ); ?>">
                    <div class="widget-column footer-widget-address">
                        <?php dynamic_sidebar( 'sidebar-address' ); ?>
                    </div>
                </aside><!-- .widget-area -->

            <?php endif; ?>

            <?php if ( has_nav_menu( 'about' ) ) : ?>
                <nav class="footer-navigation col-md-4" aria-label="<?php esc_attr_e( 'About Menu' ); ?>">
                    <span class="footer-navigation-title text-uppercase d-block mb-4">
                        <?php _e( 'về chúng tôi' ); ?>
                    </span>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'about',
                            'menu_class'     => 'about-menu',
                            'depth'          => 1,
                        )
                    ); ?>
                </nav><!-- .footer-about-navigation -->
            <?php endif; ?>

            <?php if ( has_nav_menu( 'footer' ) ) : ?>
                <nav class="footer-navigation col-md-4" aria-label="<?php esc_attr_e( 'Footer Menu' ); ?>">
                    <span class="footer-navigation-title text-uppercase d-block mb-4">
                        <?php _e( 'xuất khẩu lao động Singapore' ); ?>
                    </span>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-menu',
                            'depth'          => 1,
                        )
                    ); ?>
                </nav><!-- .footer-navigation -->
            <?php endif; ?>
        </div><!-- .site-info -->

        <div class="imprint">
            <?php _e( 'Copyright Ⓒ 2019 xuatkhaulaodongsingapore.vn. All rights reserved' ); ?>
        </div>
    </div>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
