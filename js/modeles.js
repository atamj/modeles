jQuery( document ).ready( function() {
    let modeles, chambres, sdb, superficie;
    jQuery("#modeles, #chambres, #sdb, #superficie").val("tous")
    jQuery("#modeles, #chambres, #sdb, #superficie").change(function () {
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
     
        /*jQuery.get("/wp-json/modeles/v1/modeles?modeles="+modeles+"&chambres="+chambres+"&sdb="+sdb+"&superficie="+superficie,
            function(data, status){
                jQuery("#sec-modeles").html("test")
        });*/
    })
});