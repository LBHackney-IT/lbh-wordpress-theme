<div id="comments" class="lbh-comments">
	<?php if (have_comments()) : ?>
		<h2 class="lbh-heading-h2"><?php comments_number(); ?></h2>
		<ul class="lbh-list lbh-content">
			<?php wp_list_comments('type=comment&callback=html5blankcomments'); // Custom callback in functions.php ?>
		</ul>
	<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="lbh-body-m"><?php _e( 'Comments are closed here.', 'html5blank' ); ?></p>
	<?php endif; ?>
	<?php comment_form(); ?>
</div>
