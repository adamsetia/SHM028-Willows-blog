	 </div>
	  <!-- sticky.top -->
	  <footer class="sticky btm">
	    <div class="container clearfix">
	      <div class="grid_full">
	        <nav class="footer-nav">
	          <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
	        </nav>
	        <!-- footer-nav -->
            <?php if (function_exists('dynamic_sidebar') && is_active_sidebar( 'Footer Widgets' )) : ?>
            	<?php dynamic_sidebar( 'Footer Widgets' ); ?>
            <?php endif; ?>
	        </div>
	    </div>
	    <!-- container -->
	    <div class="footer-btm">
	      <div class="container clearfix">
	        <div class="grid_full">
	          <p>&copy; Copyright <?php echo date("Y"); echo " "; bloginfo('name'); ?></p>
	        </div>
	        <!-- grid_full --> 
	      </div>
	      <!-- container --> 
	    </div>
	    <!--  footer-btm--> 
	  </footer>
	  <!-- footer sticky.btm--> 
	</div>
	<!-- wrapper --> 
	<?php wp_footer(); ?>
</body>

</html>