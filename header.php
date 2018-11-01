<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-105866411-4"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-105866411-4');
        </script>

        <meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">



			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
                <div class="container-fluid">
					<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>


					<?php // if you'd like to use the site description you can un-comment it below ?>
					<?php // bloginfo('description'); ?>


                    <nav class="navbar navbar-expand-lg navbar-light" role="navigation">
                        <?php if (!is_front_page()) { ?>
                        <a class="navbar-brand" href="<?php echo home_url(); ?>"><img height="25" src="<?php echo site_icon_url($size=125); ?>"><?php bloginfo('name'); ?></a>
                        <?php } ?>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-1" aria-controls="navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="navbar-collapse-1" class="navbar-collapse collapse" style="">
                        <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'main-nav',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav ml-auto',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker(),
                        ) );
                        ?>
                            <form class="form-inline my-2 my-lg-0 searchform" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                                <input class="form-control mr-sm-2 my-lg-2" id="s" name="s" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" id="searchsubmit" type="submit">Search</button>
                            </form>
                        </div>
					</nav>
                </div>
			</header>
            <div class="container-fluid">