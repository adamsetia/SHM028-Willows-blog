<?php get_header(); ?>

<?php
	/* get custom field from home page that has an id of 11 */

  $home_page = get_post_custom(11);
  $my_custom_field = $home_page['top story post'];
  $top_story_ids = $my_custom_field[0];
  //echo $top_story_ids;
  if($top_story_ids): 
?>
<section class="top-story sec-pad">
      <div class="container clearfix">
        <div class="grid_full">
          <div class="ts-carousel owl-carousel">
<?php
  $post_list = explode(",", $top_story_ids);// array(31, 35, 23);
  foreach( $post_list as $post_id ) :
  query_posts('p='.$post_id);
  while (have_posts()) : the_post();
	$category = get_the_category();
	$catName = $category[0]->cat_name;
	$catColor = $category[0]->category_description;
?>
  <div class="item">
  <div class="holder">
    <div class="img-cont"> <?php the_post_thumbnail('full'); ?>
      <div class="tag-holder"><div class="tagger <?php echo $catColor; ?>"><h1><?php the_title(); ?></h1></div></div>
    </div>
    <!-- img-cont -->
    <a href="<?php the_permalink(); ?>"><span>Read more</span></a> </div>
  <!-- holder --> 
</div>
<!-- item --> 
  
<?php
  endwhile;
  wp_reset_query();
  endforeach;
?>
</div>
          <!-- owl-carousel --> 
        </div>
        <!-- grid_full --> 
      </div>
      <!-- container --> 
    </section>
    <!-- section.top-story -->
<?php endif; ?>

<?php query_posts( 'tag=featured' ); ?>
<?php if ( have_posts() ) : ?>
<section class="featured sec-pad">
  <div class="container clearfix">
    <div class="grid_full">
      <h3 class="bar-header">Featured</h3>
      <div class="hq-carousel owl-carousel">
<?php while ( have_posts() ) : the_post(); ?>
	<div class="item">
          <div class="holder">
            <div class="img-cont"> <?php the_post_thumbnail(array(370, 232)); ?>
              <div class="tag-holder">
				<?php
					foreach((get_the_category()) as $category) {
						echo '<div class="tagger ' . $category->category_description . '">' . $category->cat_name . '</div>';
					}
				?>
              </div>
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
	<?php get_sidebar(); ?>
  </div>
  <!-- container --> 
</section>
<!-- main-content -->
<?php get_footer(); ?>

