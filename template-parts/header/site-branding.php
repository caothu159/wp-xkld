<div class="site-branding">

    <?php if ( has_custom_logo() ): ?>
        <div class="site-logo"><?php the_custom_logo(); ?></div>
    <?php else: ?>
        <?php $blog_info = get_bloginfo( 'name' ); ?>
        <?php if ( ! empty( $blog_info ) ): ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                      rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ( has_nav_menu( 'main' ) ): ?>
        <nav id="site-navigation" class="main-navigation"
             aria-label="<?php esc_attr_e( 'Top Menu' ); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'main',
                    'menu_class'     => 'main-menu',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                )
            );
            ?>
        </nav><!-- #site-navigation -->
    <?php endif; ?>

</div><!-- .site-branding -->
