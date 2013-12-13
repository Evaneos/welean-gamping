jQuery(document).ready(function() {
    // Big image
    jQuery('body').find('[data-backstretch-image]').each(function() {
        var url = jQuery(this).data('backstretch-image');
        jQuery(this).backstretch(jQuery(this).data('backstretch-image'));
    });

    // Autocompletion
    initPlaces();
    jQuery('#place').autocomplete({
        lookup: places,
        onSelect: function (suggestion) {
            jQuery('#place').val(suggestion.value);
            jQuery('#placeid').val(suggestion.data);
            jQuery('#searchform').submit();
        }
    });
})

// Init the place for autocomplete from select
var places = [];
function initPlaces() {
    jQuery('#places_values').find('option').each(function() {
        var tmp = { value: jQuery(this).html(), data: jQuery(this).val() };
        places.push(tmp);
    })
}
