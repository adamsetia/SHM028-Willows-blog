<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<?php if (is_search()) { ?>
	<meta name = "robots" content="noindex, nofollow" /> 
<?php } ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>
<?php
	if (function_exists('is_tag') && is_tag()) {
		single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; 
	} elseif (is_archive()) {
		wp_title(''); echo ' - '; 
	} elseif (is_search()) {
		echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; 
	} elseif (!(is_404()) && (is_single()) || (is_page())) {
		wp_title(''); echo ' - '; 
	} elseif (is_404()) {
		echo 'Not Found - '; 
	} 
	if (is_home()) {
		bloginfo('name'); 
		if(bloginfo('description')) {
			echo ' - '; bloginfo('description'); 
		}
	} else {
		bloginfo('name'); 
	} 
	if ($paged>1) {
		echo ' - page '. $paged; 
	} 
?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>
<script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body <?php body_class(); ?>>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="wrapper">
  <div class="sticky top">
    <header>
      <div class="container clearfix">
        <div class="grid_full">
          <div class="logo"> <a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('template_url'); ?>/img/wht-logo.png" alt="Willows Home Traders" ></a> </div>
          <!-- logo --> </div>
      </div>
      <!-- container --> 
    </header>
    <!-- header -->

