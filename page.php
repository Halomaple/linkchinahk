<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php the_content('More &raquo;'); ?>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>