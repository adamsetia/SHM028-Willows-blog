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
            <h2><?php echo $f_cat." : " ?><?php the_title(); ?></h2>
            <div class="post-date"><?php the_time('F j, Y') ?></div>
          </div>
          <!-- heading --> 
          <?php the_content(); ?>
        </div>
        <!-- holder --> 
        <div class="share"></div>
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
    <!-- grid_thirds  --> 
  </div>
  <!-- container --> 
</section>
<!-- main-content -->
<?php get_footer(); ?>

