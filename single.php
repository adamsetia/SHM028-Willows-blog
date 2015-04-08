<?php get_header(); the_post(); ?>
<?php
	$category = get_the_category();
	$catName = $category[0]->cat_name;
	$catColor = $category[0]->category_description;
?>
<section class="main-content sec-pad">
  <div class="container clearfix">
    <div class="grid_full">
      <div class="main-banner"><?php the_post_thumbnail( 'full' ); ?></div>
      
      <div class="title-bar bar-header <?php echo $catColor; ?> clearfix">
        <div class="grid_thirds two grid_centered"><h1><?php the_title(); ?></h1></div>
      </div>
      <!-- title-bar -->
    </div>
    <div class="grid_thirds two grid_centered">
    	<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
      <div class="entry <?php echo $catColor; ?>">
      	<?php the_content(); ?>
        <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
        <?php edit_post_link('Edit this entry','','.'); ?>
      </div>
      <!-- entry -->
    </div>
    <!-- grid_thirds two --> 
  </div>
  <!-- container --> 
</section>
<!-- section.main-content -->

<?php query_posts( 'posts_per_page=6&category_name=' . $catName ); ?>
<?php if ( have_posts() ) : ?>
<section class="rel-tiles">
  <div class="container clearfix">
    <div class="grid_thirds two grid_centered">
      <h3>Check this out</h3>
      <div class="inner">
<?php while ( have_posts() ) : the_post(); ?>
	<div class="item clearfix">
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
            </div>
            <!-- info --> 
            <a href="<?php the_permalink(); ?>"><span>Read more</span></a> </div>
          <!-- holder --> 
        </div>
        <!-- item -->
<?php endwhile; ?>
	</div>
      <!-- inner --> 
    </div>
    <!-- grid_thirds --> 
  </div>
  <!-- container --> 
</section>
<!-- section.rel-tiles -->
<?php endif; ?>
<?php wp_reset_query(); ?>
      
<?php get_footer(); ?>