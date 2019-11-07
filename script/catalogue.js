reloadSelectOption();


          

function reloadSelectOption() {
$.ajax({
    url: './server/categories_getList.php',
    type: 'post',
    data: { request_list: true },
    success: function (result) {
        r2 = JSON.parse(result);
        console.log(result);
        console.log(r2);

        optionReference = $(".categorie_option").first();
        $('#categorie_list').html("");
        
        optionReference.appendTo($('#categorie_list'));
        if(true) {
            cloneOption = optionReference.clone();
            cloneOption.text("*");
            cloneOption.val(0);
            cloneOption.appendTo($('#categorie_list'));
        }

        r2.forEach(element => {
            // console.log("test : " + element['category']);
            cloneOption = optionReference.clone();
            cloneOption.text(element['category']);
            cloneOption.val(element['category_id']);
            // console.log(cloneOption);
            // console.log($("#categorie_list"));
            cloneOption.appendTo($('#categorie_list'));
            // console.log()
        });

        optionReference.hide();
        // reset the default value

    },
    error: function (err) {
        console.log("failed  !!!");
        $('#categorie_list').html((err));

        // If ajax errors happens
    }
});
}


$('#categorie_list').change(function (e) {


    // get the number of row for that category


    $varToSend = $(this).find('option:selected').text() ;
    $.ajax({
        url: './server/categories_getList.php',
        type: 'post',
        data: { request_list: true },
        success: function (result) {
            // On success I'v got the number of rows returned

            console.log( "Success !!!" );

            $.ajax({
                url: './server/catalogue_getAllMovies.php',
                type: 'post',
                data: { category: $varToSend },
                success: function (result) {
                    console.log(result);
                     returnCode = JSON.parse(result);
                    console.log(returnCode);
                    
        
                    // take the original
                    parentMovie = $(".catalogue_showAllMovies");
        
                    children = parentMovie.find(".catalogue_OneMovieToDelete");
               
                    if ( children ) {
                        //console.log()
                        console.log( children );
                    }
               
        
        
                    oneMovie = $(".catalogue_OneMovie").first();
                    //oneMovie.show();
                    
                    parentMovie.text("");
        
                    returnCode.forEach(element => { 
                        newMovie = oneMovie.clone();
                        
                        newMovie.find("h3").text("#"+element['movie_id']+ " " + element['title']);
                        newMovie.find("p").text(element['synopsis']);
                        //console.log( newMovie.find("img")[0].src) ;
                        newMovie.find("img")[0].src = "database/movie_posters/" + element['poster'];
                        newMovie.find(".catalogue_a1").attr("href","movie_detail.php?moid=" + element['movie_id']);
                        newMovie.find(".catalogue_a2").attr("href", "editMovies.php?moid=" + element['movie_id']);
                        console.log(newMovie.find("catalogue_a1"));
                        newMovie.appendTo(parentMovie);
                    });
        
                    //oneMovie.hide();
        
                    //newTitle = original.clone();
                    //newTitle.find("");
        
                   // console.log(original);
        
                    // hide the original
        
        
        
        
        
        
            
                },
                error: function (err) {
                    console.log("mqdjfmqdlfjqmdlf");
                    //$('#resultForm').html(print_r(err));
            
                    // If ajax errors happens
                }
            });



            
    
        },
        error: function (err) {
            console.log("failed  !!!");
            $('#categorie_list').html(print_r(err));
    
            // If ajax errors happens
        }
    });
    
    

});






/*$(function() { /* code here */ //});













