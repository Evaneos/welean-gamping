jQuery(document).ready(function() {
    var doResize = jQuery(window).width()>980;
    jQuery(window).scroll(function() {
        if(doResize) {
            var docScroll = jQuery(document).scrollTop();
            if(docScroll>20) {
                jQuery('body').addClass('scrolled');
            }
            else {
                jQuery('body').removeClass('scrolled');
            }
        }
        else {
            jQuery('body').removeClass('scrolled');
            jQuery('body').removeClass('fixed');
        }
    })
});
