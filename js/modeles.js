jQuery( document ).ready( function() {

    let form = document.querySelector('#filtres_modeles');
    jQuery('#filtres_modeles select').val("tous");
    jQuery('#filtres_modeles select').change(get_modeles);
    get_modeles();
    function get_modeles(){
        jQuery.post(
            ajaxurl,{
                'action': 'get_modeles',
                'modeles': form.modeles.value,
                'chambres': form.chambres.value,
                'sdb': form.sdb.value,
                'superficie': form.superficie.value,

            },
            function (response) {
                jQuery("#sec-modeles").html(response);
            }
        )
    }
    function test() {
        alert("test")
    }

    /*let form = document.querySelector('#filtres_modeles');
    jQuery('#filtres_modeles input[type=submit]').hide();
    jQuery('#filtres_modeles select').val("tous");

    jQuery('#filtres_modeles select').change('wordcamp2013_refresh_list');

    function wordcamp2013_refresh_list() {
        jQuery('#sec-modeles').hide()

        jQuery.ajax({
            type: "POST",
            url: '/wp-admin/admin-ajax.php?wordcamp2013_callback',
            data: form.serialize(),
            dataType: "json",
            success: wordcamp2013_refresh_list_ajax_success
        })
    }

    function wordcamp2013_refresh_list_ajax_success(response) {

        if (response.handler == "success"){
            jQuery('#sec-modeles').html(response.html);
        }else {
            alert('An error occured' + response.message);
        }

        jQuery('#sec-modeles').show();
    }*/

    /*jQuery("#modeles, #chambres, #sdb, #superficie").val("tous")*/
    /*jQuery("#modeles, #chambres, #sdb, #superficie").change(function () {
        modeles =  document.querySelector("#modeles").value
        chambres =  document.querySelector("#chambres").value
        sdb =  document.querySelector("#sdb").value
        superficie =  document.querySelector("#superficie").value
        jQuery.ajax({
            type: 'GET',
            url: "/wp-json/modeles/v1/modeles",
            data: {modeles: modeles, chambres: chambres, sdb: sdb, superficie: superficie},
            success: function(response, status, xhr) {
                console.log(xhr)
            }
        });
     
        /!*jQuery.get("/wp-json/modeles/v1/modeles?modeles="+modeles+"&chambres="+chambres+"&sdb="+sdb+"&superficie="+superficie,
            function(data, status){
                jQuery("#sec-modeles").html("test")
        });*!/
    })*/
});