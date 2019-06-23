<?php if ( has_custom_logo() ): ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php the_custom_logo(); ?>
    </a>

<?php else: ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img
            src="data:image/png;base64,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"
            alt="Logo"/>
    </a>
<?php endif; ?>

<?php if ( has_nav_menu( 'main' ) ): ?>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'main',
            'menu_class'     => 'navbar-nav main-menu',
            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'container'      => ''
        )
    );
    ?>
<?php endif; ?>
