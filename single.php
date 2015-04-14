<?php get_header(); ?>

<section class="main-content sec-pad">
  <div class="container clearfix">
    <div class="grid_thirds two main-listing">
      <?php if ( have_posts() ) : ?>
      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>
      <div class="item clearfix">
        <div class="holder">
          <div class="heading">
            <?php
						$category = get_the_category();
						$f_cat = $category[0]->cat_name;
					?>
            <h2><?php echo $f_cat." : " ?>
              <?php the_title(); ?>
            </h2>
            <div class="post-date">
              <?php the_time('F j, Y') ?>
            </div>
          </div>
          <!-- heading -->
          <?php the_content(); ?>
        </div>
        <!-- holder -->
         <?php include (TEMPLATEPATH . '/inc/meta-social.php' ); ?>
      </div>
      <!-- item -->
      <?php previous_post_link( '%link', 'Take me back' ); ?>
      <?php echo get_next_posts_link(); 
	  	$nextpost = get_next_posts_link();
		echo $nextpost;
	  ?>
      <?php if(get_next_posts_link() || get_previous_posts_link()): ?>
      asda
      <?php endif; ?>
      <?php endwhile; ?>
      
      <?php comments_template( '', true ); ?>
      
      
      <?php else : ?>
      <div class="item clearfix">
        <div class="holder">
          <div class="heading">
            <h2>No entries were found</h2>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <!-- grid_thirds two -->
    <?php get_sidebar(); ?>
    <!-- grid_thirds  --> 
  </div>
  <!-- container --> 
</section>
<!-- main-content -->
<?php get_footer(); ?>
