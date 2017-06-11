<?php
/**
 **Template Name:contact
 */
get_header();

include(TEMPLATEPATH . '/includes/breadcrumb.php');
?>

<div class="contact-container">
    <?php echo do_shortcode('[contact-form-7 id="159" title="联系我们"]');?>
</div>

<?php
get_footer();
?>
