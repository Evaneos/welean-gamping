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

    $("[name='country']").change(function(e) {
        $.ajax({
            'dataType': 'json',
            'url': '/ajax/regions-by-country/id/' + e.target.value,
            'success' :function(data) {
                var select = $("[name='state']");
                select.find('option:not(:first-child)').remove();
                $.each(data, function(key, value) {
                    $('<option />', { value: value.id, html: value.name }).appendTo(select);
                });
            }
        });
    });
})
