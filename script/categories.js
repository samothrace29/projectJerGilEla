$('#categorie_list').change(function(e){
    //alert("PROBANDO");
    console.log($(this).val());
    //console.log(e);
    $('#categories').val($(this).val());
    


});