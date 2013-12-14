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
            jQuery(location).attr('href', "/search/" + suggestion.data);
        }
    });

    /*jQuery("#searchform").submit (function( event ) {
        alert(jQuery("#place").val());
        jQuery(location).attr('href', "/search");
        event.stopPropagation();
    });*/

})

// Init the place for autocomplete from select
var places = [];
function initPlaces() {
    jQuery('#places_values').find('option').each(function() {
        var tmp = { value: jQuery(this).html(), data: jQuery(this).val() };
        places.push(tmp);
    })
}
