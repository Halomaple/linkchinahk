<?php get_header();?>

<div class="container">
	<div class="row">
		<div class="archive clearfix">
		<?php while (have_posts()) : the_post(); ?>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pointer archive-items">
				<div class="archive-post-item" onclick="window.location.href='<?php the_permalink(); ?>'">
					<div class="archive-post-info">
						<h5 class="archive-post-title">
							<a href="<?php the_permalink() ?>" title="更多信息"><?php the_title(); ?></a>
						</h5>
						<span class="archive-post-excerpt"><?php the_excerpt(); ?></span>
						<div class="archive-post-time text-gray">
							<span style="font-weight: normal"><?php the_time('Y-m-d') ?></span>
						</div>
					</div>
					<div class="archive-post-thumbnail">
						<?php
						$first_image = catch_first_image();
						if (has_post_thumbnail()) { ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
								<?php the_post_thumbnail('homepage-thumb'); ?>
							</a>
							<?php
						} else if (!empty($first_image)) { ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
								<?php catch_first_image(); ?>
							</a>
						<?php } else { ?>
							<a href="<?php the_permalink(); ?>" title="更多信息">
								<img src="<?php bloginfo('template_directory') ?>/images/default_thumb.png" alt="<?php the_title();?>"/>
							</a>
							<?php
						} ?>
					</div>
				</div>
			</div>
		<?php endwhile;?>
		</div>
		<?php wp_pagenavi(); ?>
	</div>
</div>
<?php get_footer(); ?>


