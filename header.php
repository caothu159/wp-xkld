<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wpBodyOpen(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content' ); ?></a>

    <nav class="main-navigation navbar navbar-expand-md" style="visibility: hidden;">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center w-100">
                <?php get_template_part( 'template-parts/header/header', 'menu' ); ?>
            </div>
        </div>
    </nav>

    <nav class="main-navigation navbar fixed-top navbar-expand-md navbar-dark bg-dark">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center w-100">
                <?php get_template_part( 'template-parts/header/header', 'menu' ); ?>
            </div>
        </div>
    </nav>

    <?php get_template_part( 'template-parts/header/header', 'breadcrumb' ); ?>

    <header id="masthead"
            class="<?php echo is_singular() && theme_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">


    </header><!-- #masthead -->

    <div id="content" class="site-content">
