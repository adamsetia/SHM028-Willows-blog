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
            <h2>
              <?php the_title(); ?>
            </h2>
          </div>
          <!-- heading -->
          <?php the_content(); ?>
        </div>
        <!-- holder -->
         <?php include (TEMPLATEPATH . '/inc/meta-social-page.php' ); ?>
      </div>
      <!-- item -->
      <?php endwhile; ?>
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
