<?php

	/*
		Template Name: Home page
	*/

?>

<?php get_header(); ?>


<section class="main-content sec-pad">
  <div class="container clearfix">
    <div class="grid_thirds two main-listing">
      <h3 class="bar-header">Latest</h3>
      <?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="item clearfix">
            <div class="holder">
              <div class="img-cont"> <?php the_post_thumbnail( array(720, 515) ); ?>
              	<div class="tag-holder">
                	<?php
						foreach((get_the_category()) as $category) {
							echo '<div class="tagger ' . $category->category_description . '">' . $category->cat_name . '</div>';
						}
					?>
                </div>
                <!-- tag-holder -->
              </div>
              <!-- img-cont -->
              <div class="info">
                <h2><?php the_title(); ?></h2>
              </div>
              <!-- info --> 
              <a href="<?php the_permalink(); ?>"><span>Read more</span></a> </div>
            <!-- holder --> 
          </div>
          <!-- item -->
        <?php endwhile; ?>

        <?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

    <?php else : ?>
    	<p>No entries were found</p>
    <?php endif; ?>
    </div>
    <!-- grid_thirds two -->
    <div class="grid_thirds">

    </div>
    <!-- grid_thirds  --> 
  </div>
  <!-- container --> 
</section>
<!-- main-content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

