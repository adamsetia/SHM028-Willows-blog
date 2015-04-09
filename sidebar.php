<?php if (function_exists('dynamic_sidebar') && is_active_sidebar( 'Sidebar Widgets' )) : ?>
	<div class="grid_thirds sidebar">
		<div class="holder"><?php dynamic_sidebar( 'Sidebar Widgets' ); ?></div>
	</div>
	<!-- grid_thirds  -->
<?php endif; ?>

