<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
<!--        <link href='/wp-content/themes/care/assets/stylesheets/foundation.css?ver=2.9.0' rel='stylesheet' type='text/css' />-->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400italic,700italic,300,700,300italic,400' rel='stylesheet' type='text/css' />
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

  <!--******************-->
  <!--Off canvas wrapper-->
  <!--******************-->
<div id="uthsc-off-canvas-wrapper" class="uthsc-off-canvas-wrapper">

<!--	--><?php //if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
<!--		--><?php //get_template_part( 'template-parts/mobile-off-canvas' ); ?>
<!--	--><?php //endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

  <?php get_template_part('template-parts/uthsc-site-nav'); ?>
  <?php get_template_part('template-parts/uthsc-banner'); ?>
  <?php get_template_part('template-parts/uthsc-breadcrumbs'); ?>

	<header id="masthead" class="site-header" role="banner">
<!--		<div class="title-bar" data-responsive-toggle="site-navigation">-->
<!--			<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>-->
<!--			<div class="title-bar-title">-->
<!--				<a href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home">--><?php //bloginfo( 'name' ); ?><!--</a>-->
<!--			</div>-->
<!--		</div>-->

		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
      <div class="row">
        <div class="top-bar-left">
            <?php foundationpress_top_bar(); ?>

        </div>
      </div>

		</nav>
	</header>
	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
