<?php
/**
 **Template Name:recruit
 */
get_header();

include(TEMPLATEPATH . '/includes/breadcrumb.php');
?>

<div class="recruit-container">
    <?php echo do_shortcode('[contact-form-7 id="15" title="联系表单 1"]')
    ?>
</div>

<?php
get_footer();
?>
