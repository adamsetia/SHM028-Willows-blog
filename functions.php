<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {	
		$jsdir = get_stylesheet_directory_uri() . '/js/';
		$gsdir = get_stylesheet_directory_uri() . '/js/greensock/';
		
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"), '', '',  true);
		wp_enqueue_script('jquery');
		
		wp_register_script( 'tweenlite', $gsdir . 'TweenLite.min.js', 'jquery', '1.0',  true );
		wp_enqueue_script( 'tweenlite' );
		
		wp_register_script( 'tweenlitecss', $gsdir . 'plugins/CSSPlugin.min.js', 'jquery', '1.0',  true );
		wp_enqueue_script( 'tweenlitecss' );
		
		wp_register_script( 'tweenliteease', $gsdir . 'easing/EasePack.min.js', 'jquery', '1.0',  true );
		wp_enqueue_script( 'tweenliteease' );
		
		wp_register_script( 'owlcarousel', $jsdir . 'vendor/owl.carousel.min.js', 'jquery', '1.0',  true );
		wp_enqueue_script( 'owlcarousel' );

		wp_register_script( 'plugins', $jsdir . 'plugins.js', 'jquery', '1.0',  true );
		wp_enqueue_script( 'plugins' );
		
		wp_register_script( 'mainjs', $jsdir . 'main.js', 'jquery', '1.0',  true );
		wp_enqueue_script( 'mainjs' );
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
	add_theme_support( 'post-thumbnails' ); 
    remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		register_sidebar(array(
    		'name' => 'Footer Widgets',
    		'id'   => 'footer-widgets',
    		'description'   => 'These are widgets for the footer.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	
	if (function_exists('register_nav_menus')) {
		register_nav_menus(
			array(
				'primary' => 'Main Navigation Menu'
			)
		);
		register_nav_menus(
			array(
				'footer' => 'Footer Navigation Menu'
			)
		);
	}

?>