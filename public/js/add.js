jQuery(document).ready(function() {
    jQuery('form.smart-form').each(function() {
        var f = jQuery(this);
        f.find('*[data-form-choices="multiple"]').each(function() {
            jQuery(this).find('li a').each(function() {
                jQuery(this).click(function(e) {
                    e.preventDefault();

                    var name = jQuery(this).data('name');

                    var hidden = f.find('[name="'+name+'"]');
                    var current = hidden.val();
                    if('0'==current) {
                        hidden.val('1');
                        jQuery(this).addClass('selected');
                    }
                    else {
                        hidden.val('0');
                        jQuery(this).removeClass('selected');
                    }
                    return false;
                })
            })
        })
    })
})
