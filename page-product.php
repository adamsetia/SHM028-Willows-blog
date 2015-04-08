<?php

	/*
		Template Name: Product Page
	*/

?>

<?php get_header(); the_post(); ?>

<div id='main-content'>

	<h2 class="product-title"><?php the_title(); ?></h2>

    <div class="product-info-box">
        <img src='<?php echo get_post_meta($post->ID, 'product_large', true); ?>' />            
        <ul>
            <li><h5>Price</h5> $<?php echo get_post_meta($post->ID, 'price', true); ?></li>
            <li><h5>Product Code</h5> <?php echo get_post_meta($post->ID, 'product_code', true); ?></li>
            <li><h5>Dimensions</h5> <?php echo get_post_meta($post->ID, 'dimensions', true); ?></li>
            <li><a class="button" href="#">Add to Cart</a></li>
        </ul>
    </div>

    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
	
</div> <!-- END main-content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>