<?php get_header();

include(TEMPLATEPATH . '/includes/part-page-nav.php');
include(TEMPLATEPATH . '/includes/breadcrumb.php');

$the_query = new WP_Query($args);

if (have_posts()) :
    while (have_posts()) :the_post();
        update_post_caches($posts); ?>
        <div class="blog-post-header">
            <img src="<?php bloginfo('template_directory'); ?>/images/blog-post-header.jpg">
            <div class="blog-post-tag">
                <span class="tag-left pull-left"></span>
                <span class="tag-text"><?php if (in_category('未分类')) {
                the_title();
            } else {
                $category = get_the_category();
                if ($category[0]) {
                    echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a>';
                }
            } ?></span>
                <span class="tag-right pull-right"></span>
            </div>
            <div class="blank-header"></div>
        </div>

        <div class="blog-post">
            <h1 class="blog-post-title"><?php the_title(); ?></h1>
            <div class="blog-post-content"><?php the_content() ?></div>
        </div>
        <?php
    endwhile;
endif;
wp_reset_query();     // Restore global post data stomped by the_post().
get_footer();
?>
