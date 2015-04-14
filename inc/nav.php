<?php if(get_next_posts_link() || get_previous_posts_link()): ?>
<div class="nav-pager clearfix">
	<?php if(get_next_posts_link()): ?>
	<div class="next-posts"><?php next_posts_link('Take me back') ?></div>
    <?php endif; ?>
    <?php if(get_previous_posts_link()): ?>
	<div class="prev-posts"><?php previous_posts_link('Show me more') ?></div>
    <?php endif; ?>
</div>
<?php endif; ?>