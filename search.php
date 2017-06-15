<?php get_header();?>

<div class="container">
	<div class="row">
		<?php include(TEMPLATEPATH . '/includes/breadcrumb.php'); ?>

		<div class="content-container col-xs-12 col-sm-12 col-lg-12">
			<h3>Result: <?php echo get_search_query(); ?></h3>
			<?php while (have_posts()) : the_post(); 
				if(!in_category('uncategorized')) {?>
				<div class="archive col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="archive-post-list" onclick="window.location.href='<?php the_permalink(); ?>'">
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
								<a href="<?php the_permalink(); ?>" title="More">
									<img src="<?php bloginfo('template_directory') ?>/images/default_thumb.png"
										 alt="<?php the_title() ?>"/>
								</a>
								<?php
							} ?>
						</div>
						<div class="archive-post-info">
							<h5 class="archive-post-title">
								<a href="<?php the_permalink() ?>" title="More"><?php the_title(); ?></a>
							</h5>
							<div class="archive-post-excerpt"><?php the_excerpt(); ?></div>
							<div class="archive-post-link">
								<span><?php the_time('Y/m/d') ?></span>
								<a href="<?php the_permalink() ?>
							  " rel="bookmark">
									More..
								</a>
							</div>
						</div>
					</div><!-- /archive-post-list -->
				</div>
			<?php }
			endwhile; ?>
		</div>
	</div><!--/row-->
</div><!--/container-->
<?php get_footer(); ?>
