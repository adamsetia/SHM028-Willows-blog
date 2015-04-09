	 </div>
	  <!-- sticky.top -->
	  <footer class="sticky btm">
	      <div class="container clearfix">
	        <div class="grid_thirds two">
	          <?php if (function_exists('dynamic_sidebar') && is_active_sidebar( 'Footer Widgets' )) : ?>
            	<?php dynamic_sidebar( 'Footer Widgets' ); ?>
            <?php endif; ?>
	        </div>
	        <!-- grid_full --> 
	      </div>
	      <!-- container --> 
	  </footer>
	  <!-- footer sticky.btm--> 
	</div>
	<!-- wrapper --> 
	<?php wp_footer(); ?>
    <div class="scrollTop">
		<a class="scr-link" href=".wrapper"></a>
	</div>
</body>

</html>