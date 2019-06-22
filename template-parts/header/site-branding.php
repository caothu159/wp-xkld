<?php if ( has_custom_logo() ): ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php the_custom_logo(); ?>
    </a>

<?php else: ?>
    <?php $blog_info = get_bloginfo( 'name' ); ?>
    <?php if ( ! empty( $blog_info ) ): ?>
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php bloginfo( 'name' ); ?>
        </a>
    <?php endif; ?>
<?php endif; ?>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="site-branding">


    <?php if ( has_nav_menu( 'main' ) ): ?>
        <nav id="site-navigation" class="main-navigation"
             aria-label="<?php esc_attr_e( 'Top Menu' ); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'main',
                    'menu_class'     => 'main-menu navbar-nav',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                )
            );
            ?>
        </nav><!-- #site-navigation -->
    <?php endif; ?>

</div><!-- .site-branding -->
