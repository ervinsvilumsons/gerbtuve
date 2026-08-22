<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yosemite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="google-site-verification" content="q_Xj84-eIy7BlKKLTcY7oWULITIRcWJVBU52qlLhAJ0"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'yosemite-lite' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding container">
			<h1 id="site-title"><?php bloginfo('name') ?></h1>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() . '/images/logo.png' ?>" alt="Ģērbtuve" /></a>
		</div><!-- .logo -->

		<div class="header-content">
			<div class="header-content__container container">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( '', 'yosemite-lite' ); ?></button>
					<?php wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id' => 'primary-menu',
					) ); ?>
				</nav><!-- #site-navigation -->

				<!-- .header-search -->
				<?php get_search_form(); ?>

			</div>
		</div><!-- .header-content -->

	</header><!-- #masthead -->

	<div id="content" class="site-content container">
