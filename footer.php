<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
    <div class="site-info">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="imprint">
            <?php
            _e( 'Copyright Ⓒ 2019 viet-nhat.com. All rights reserved' );
            ?>
        </a>

        <?php if ( has_nav_menu( 'about' ) ) : ?>
            <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'About Menu' ); ?>">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'about',
                        'menu_class'     => 'about-menu',
                        'depth'          => 1,
                    )
                );
                ?>
            </nav><!-- .footer-navigation -->
        <?php endif; ?>

        <?php if ( has_nav_menu( 'footer' ) ) : ?>
            <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu' ); ?>">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'depth'          => 1,
                    )
                );
                ?>
            </nav><!-- .footer-navigation -->
        <?php endif; ?>

    </div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
