<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

	<meta name="viewport" content="width=device-width">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0">
	<meta http-equiv="cleartype" content="on">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script><script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script><![endif]-->
	
	<!-- For everything else -->
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">

  <?php roots_stylesheets(); ?>
  <style type="text/css">
  	#sec-cont img {
  		max-height: 300px;
  		height: expression(this.height > 300 ? "300px" : true);
  	}
	.image-table tbody tr {
		width: 100%;
	}
	.image-table tbody tr td {
		width: 33.3333%;
		float: left;
	}
	.image-table tbody tr td img {
		width: 100%;
	}
	

  </style>

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

  <script src="<?php echo get_template_directory_uri(); ?>/js/libs/modernizr-2.5.3.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  
  <?php roots_head(); ?>
  <?php wp_head(); ?>
  
	<!--[if lt IE 9]><script src="<?php bloginfo('template_url'); ?>/js/libs/respond.min.js"></script><![endif]-->

</head>

<body <?php body_class(roots_body_class()); ?>>

  <!--[if lt IE 7]><p class="chromeframe">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

  <?php roots_header_before(); ?>
    <header id="banner" role="banner" class="clearfix">
      <?php roots_header_inside(); ?>
      <a href="<?php echo home_url(); ?>/" id="logo"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" title="Return to <?php bloginfo('name'); ?>" alt="AFC Logo" /></a>
      <h1 id="brand"><a href="<?php echo home_url(); ?>/">
        <?php bloginfo('name'); ?>
      </a></h1>
      <p id="phone"><?php echo AFC_PHONE; ?></p>
      <nav id="nav-main" class="nav-collapse" role="navigation">
        <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new Roots_Navbar_Nav_Walker())); ?>
      </nav>
    </header>
  <?php roots_header_after(); ?>

  <?php roots_wrap_before(); ?>
  <div id="wrap" class="<?php echo WRAP_CLASSES; ?>" role="document">
