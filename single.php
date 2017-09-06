<?php get_header();?>

<div class="container">
	<div class="row">
		<?php $the_query = new WP_Query($args);
		if (have_posts()) :
			while (have_posts()) :the_post();
				update_post_caches($posts);?>
				<div class="blog-post-header">
					<div class="blog-post-tag">
						<span class="tag-left pull-left"></span>
						<span class="tag-right pull-right"></span>
					</div>
					<div class="blank-header"></div>
				</div>

				<div class="blog-post <?php echo $post -> post_name;?>">
					<h1 class="blog-post-title"><?php if(!in_category('uncategorized')){the_title();} ?></h1>
					<div class="blog-post-content"><?php the_content() ?></div>
				</div>
				<?php
			endwhile;
		endif;
		wp_reset_query();     // Restore global post data stomped by the_post().?>
	</div>
</div>

<?php get_footer();?>
