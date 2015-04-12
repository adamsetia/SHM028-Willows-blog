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
		
		wp_register_script( 'device', $jsdir . 'vendor/device.min.js', 'jquery', '1.0',  true );
		wp_enqueue_script( 'device' );
		
		wp_register_script( 'tweenlitescroll', $gsdir . 'plugins/ScrollToPlugin.min.js', 'jquery', '1.0',  true );
		wp_enqueue_script( 'tweenlitescroll' );

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
	// add first last class
	function wpb_first_and_last_menu_class($items) {
    	$items[1]->classes[] = 'first';
		$items[count($items)]->classes[] = 'last';
		return $items;
	}
	add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');		
	
	if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<span>%1$s %2$s</span>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( '(Post author)', 'twentytwelve' ) . '</span>' : ''
					);
					printf( ' <a href="%1$s"><time datetime="%2$s">on %3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s', 'twentytwelve' ), get_comment_date() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;	
?>