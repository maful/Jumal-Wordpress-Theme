<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <script>(function(){document.documentElement.className='js'})();</script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="container">
    <header class="margin20 no-margin-left no-margin-right">
        <div class="clear-float">
            <div class="place-right">
                <form id="quick-search" method="get" action="<?php bloginfo('siteurl'); ?>">
                    <div class="input-control text margin20" style="width: 300px">
                        <input type="text" id="s" name="s" placeholder="Search...">
                        <button class="button"><span class="mif-search"></span></button>
                    </div>
                </form>
            </div>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h1 class="head-blog"><?php bloginfo( 'name' ); ?></h1></a>
        </div>

        <div class="main-menu-wrapper">
            <ul class="horizontal-menu">
                <?php wp_nav_menu( array( 'items_wrap' => '%3$s', 'container' => '' ) ); ?>
            </ul>
        </div>
    </header>