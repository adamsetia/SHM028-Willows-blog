<?php

	/*
		Template Name: Blog Homepage
	*/

?>

<?php get_header(); ?>

<div id='main-content'>
	
	<h1 class="giant">The Grind</h1>
	
	<?php query_posts("posts_per_page=5"); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>

			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">
				<?php the_excerpt(); ?>
			</div>

		</div>

	<?php endwhile; ?>

	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>
	
</div> <!-- END main-content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>