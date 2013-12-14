jQuery(document).ready(function() {
    // Big image
    jQuery('body').find('[data-backstretch-image]').each(function() {
        var url = jQuery(this).data('backstretch-image');
        jQuery(this).backstretch(jQuery(this).data('backstretch-image'));
    });
})
