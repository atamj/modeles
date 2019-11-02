jQuery( document ).ready( function() {

    let form = document.querySelector('#filtres_modeles');
    jQuery('#filtres_modeles select').val("tous");
    jQuery('#filtres_modeles select').change(get_modeles);
    get_modeles();
    function get_modeles(){
        jQuery("#sec-modeles").hide();
        jQuery("#loader").show();
        jQuery.post(
            ajaxurl,{
                'action': 'get_modeles',
                'modeles': form.modeles.value,
                'chambres': form.chambres.value,
                'sdb': form.sdb.value,
                'superficie': form.superficie.value,

            },
            function (response) {
                jQuery("#loader").hide();
                jQuery("#sec-modeles").html(response);
                jQuery("#sec-modeles").show();
            }
        )
    }
});