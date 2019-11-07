// set the defaut value to create for updateCreate
$("#categories_UpdateCreate").val("create");

// send request to load option from servers
reloadSelectOption();


// if you click on the button, send the update to the server , then upgrade the list if successfully
$("#submit_categories").click(function (e) {
    e.preventDefault();
    dataToUpdate = $('#categorie_input_updateCreate').val(); // new value
    dataOriginal = $("#categorie_list").find('option:selected').text(); // old value
    dataType = $('#categories_UpdateCreate').val(); // update or insert
    dataId = $("#categorie_list").find('option:selected').val(); // id, double check with old value
    console.log("send : " + dataOriginal + " type : " + dataType);

    if (dataOriginal != dataToUpdate) {

        $.ajax({
            url: 'http://localhost:3000/server/categories_InsertUpdate.php',
            type: 'post',
            data: { categories_type: dataType, id: dataId, categorie_name: dataOriginal, categorie_UpdateValue: dataToUpdate },
            success: function (result) {
                console.log(result);
                returnCode = JSON.parse(result);
                console.log(returnCode);
                //var_dump(returnCode);
                if (returnCode[0]['rc'] == "0") {
                    console.log("qmdfkjfm");
                    reloadSelectOption();
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
    }
});

// Send a request on the server to get the list asynchrone
// categorie_list

function reloadSelectOption() {

    $.ajax({
        url: 'http://localhost:3000/server/categories_getList.php',
        type: 'post',
        data: { request_list: true },
        success: function (result) {
            console.log("success !!!");
            //console.log(result);
            r2 = JSON.parse(result);
            console.log(result);
            console.log(r2);

            optionReference = $(".categorie_option").first();
            $('#categorie_list').html("");
            optionReference.appendTo($('#categorie_list'));

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

            // reset the default value
            $("#categorie_input_updateCreate").val("");
            $("#submit_categories").val("Add Category");
            $("#categories_UpdateCreate").val("create");

        },
        error: function (err) {
            console.log("failed  !!!");
            $('#categorie_list').html(print_r(err));

            // If ajax errors happens
        }
    });
}

// If you change the list value, you change too the button and the input with the old previous update
$('#categorie_list').change(function (e) {
    $selectVal = $(this).val();

    // which children is selected
    // $indexChildrenSelected = $(this).selectedIndex;

    // get the text from the children selected
    $selectText = $(this).find('option:selected').text();

    if ($selectVal) {
        $('#categorie_input_updateCreate').val($selectText);
        $("#categories_UpdateCreate").val("update");
        $("#submit_categories").val("Update Category : " + $selectText);
    } else {
        $("#categorie_input_updateCreate").val("");
        $("#submit_categories").val("Add Category");
        $("#categories_UpdateCreate").val("create");
    }


});
