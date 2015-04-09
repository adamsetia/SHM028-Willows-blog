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
            <h2><a href="<?php the_permalink(); ?>"><?php echo $f_cat." : " ?>
              <?php the_title(); ?></a>
            </h2>
            <div class="post-date">
              <?php the_time('F j, Y') ?>
            </div>
          </div>
          <!-- heading -->
          <?php the_content(); ?>
          <div class="rm">
          <a href="<?php the_permalink(); ?>"><span>Read more</span></a> 
          </div>
        </div>
        <!-- holder -->
         <?php include (TEMPLATEPATH . '/inc/meta-social.php' ); ?>
      </div>
      <!-- item -->
      <?php endwhile; ?>
      <?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
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
