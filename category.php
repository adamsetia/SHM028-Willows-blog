<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php
	$catColor = strip_tags(category_description());
	$catName = single_cat_title( '', false );
?>
<?php query_posts( 'tag=featured&category_name='.$catName ); ?>
<?php if ( have_posts() ) : ?>
<section class="featured sec-pad">
  <div class="container clearfix">
    <div class="grid_full">
      <h3 class="bar-header <?php echo $catColor; ?>">Featured</h3>
      <div class="hq-carousel owl-carousel">
<?php while ( have_posts() ) : the_post(); ?>
	<div class="item">
          <div class="holder">
            <div class="img-cont"> <?php the_post_thumbnail(array(370, 232)); ?>
              <div class="tag-holder">
                	<div class="tagger <?php echo $catColor; ?>"><?php echo $catName; ?></div>
                </div>
                <!-- tag-holder -->
            </div>
            <!-- img-cont -->
            <div class="info">
              <h4><?php the_title(); ?></h4>
              <?php the_excerpt(); ?> 
            </div>
            <!-- info --> 
            <a href="<?php the_permalink(); ?>"><span>Read more</span></a> </div>
          <!-- holder --> 
        </div>
        <!-- item -->
<?php endwhile; ?>
</div>
      <!-- owl-carousel --> 
    </div>
    <!-- grid_full --> 
  </div>
  <!-- container --> 
</section>
<!-- section.featured -->
<?php endif; ?>
<?php wp_reset_query(); ?>

<section class="main-content sec-pad">
  <div class="container clearfix">
    <div class="grid_thirds two main-listing">
      <h3 class="bar-header <?php echo $catColor; ?>">Latest</h3>
      <?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="item clearfix">
            <div class="holder">
              <div class="img-cont"> <?php the_post_thumbnail( array(720, 515) ); ?>
              	<div class="tag-holder">
                	<div class="tagger <?php echo $catColor; ?>"><?php echo $catName; ?></div>
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
	<?php get_sidebar(); ?>
  </div>
  <!-- container --> 
</section>
<!-- main-content -->
<?php get_footer(); ?>