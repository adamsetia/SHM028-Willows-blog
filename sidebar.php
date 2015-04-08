<?php if (function_exists('dynamic_sidebar') && is_active_sidebar( 'Sidebar Widgets' )) : ?>
	<div class="grid_thirds">
		<?php dynamic_sidebar( 'Sidebar Widgets' ); ?>
	</div>
	<!-- grid_thirds  -->
<?php endif; ?>

