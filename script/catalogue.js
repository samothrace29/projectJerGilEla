$.ajax({
    url: 'http://localhost:3000/server/catalogue_getAllMovies.php',
    type: 'post',
    data: { category: "drama" },
    success: function (result) {
        console.log(result);
        // returnCode = JSON.parse(result);
        console.log(returnCode);
        //var_dump(returnCode);
        if (returnCode[0]['rc'] == "0") {
            //console.log("qmdfkjfm");
           // reloadSelectOption();
        } else {
            console.log("Error detected !!! ");
        }


    },
    error: function (err) {
        console.log("mqdjfmqdlfjqmdlf");
        //$('#resultForm').html(print_r(err));

        // If ajax errors happens
    }
});