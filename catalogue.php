<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/loginregister.css">
    <link rel="stylesheet" href="style/catalogue.css">
    <title>Show Catalogue</title>
</head>

<body>
    <?php include_once "menu.php"; ?>
    <?php include_once "formLogReg.html"; ?>
    <?php include_once "function.php"; 
    
    $category_filter = "*";
    if ( isset( $_GET ['categ']) ) {       
        $category_filter = isset( $_GET ['categ']);
    } else {

    }
        
    ?>

<main>
        <!-- <h1>Catalogue</h1> -->

        
        <!-- Creating a div to split  with flex space-around -->
        
        <div class="catalogue_sortElement">
            <FORM class="formSelectCategories">
                <SELECT id="categorie_list" name="categorie_list" size="1">
                    <OPTION value="" class="categorie_option">
                </SELECT>

            </FORM>

        </div>
            

            <article class="catalogue_showAllMovies">
                <section class="catalogue_OneMovie">
                    <div class="catalogue_div_image">
                        <img src="database/movie_posters/ai.jpg" alt="nothing" srcset="">
                    </div>
                    <div class="catalogue_div_description">
                        <h3>number + title</h3>
                        <p>lorem</p>
                    </div>
                         <div class="catalogue_div_Button">
                            <a href="" class="catalogue_a1">Detail</a>
                            <a href="" class="catalogue_a2">Modify</a>             
                    </div>
                </section>
            
            </article>
        
        <div class="catalogue_pagination">
            <a href=""><span>1</span></a>
        </div>

        <!-- select all categories from database -->
        <!-- create the list with one blank -->
        <!-- if blank add the new categories -->
        <!-- if not blank update the categories -->

        <!-- on submit change only the name of the categori if update, => an input text area  -->
        
        
        
        
        
    </main>
    

    
    
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js">
    </script>

    <script src="./script/loginregister.js"></script>
    <script src="./script/modal.js"></script>
    <script src="./script/catalogue.js"></script>
    
    <script>
   
   setTimeout(function(){
       $all = $("#categorie_list");
       options=$(".categorie_option");

       //console.log($all);
       /*
       console.log("before");
       
       console.log($all);
       console.log("before");
      
         console.log($options);
         console.log("after");
*/
    options.each( element => {
        //console.log("before");
        //console.log(element);
        if (options[element].text == "<?php echo $_GET['categ'] ; ?>") {

            console.log(options[element].value);
            $("#categorie_list").val(options[element].value);
            $("#categorie_list").trigger("change");
        }
        //console.log("after");
    })
    



}, 2000);

    </script>
</body>

</html>