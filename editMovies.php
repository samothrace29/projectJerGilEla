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
    <link rel="stylesheet" href="style/categories.css">
    <link rel="stylesheet" type="text/css" href="../style/add-edit-movies.css">
    <title>Edit Movies</title>
    </head>
    <?php

    include 'function.php';
    include_once 'menu.php';

if (isset($_SESSION['user'])) {
    if (isset($_POST['submit'])) {
        $new_title = $_POST['title'];
        $new_synopsis = $_POST['synopsis'];
        $new_release_year = $_POST['release_year'];
        $user = $_SESSION['user'];
        
        //connect to the database
        require_once 'connect.php';
        $connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
        $db_found = mysqli_select_db($connect,'projectejg');

        $query = "UPDATE movies SET title = '" . $new_title . "', synopsis = '" . $new_synopsis . "' , release_year = '" . $new_release_year . "'";
        
        echo $query;
    
        $result_query = mysqli_query($connect, $query);
        $userinfo = mysqli_fetch_assoc($result_query);
        if ($result_query)
            echo 'Movie updated in database';
        else
            echo 'Movie DID NOT update in database';
    };
 }

 
?>

<body>
    <main>

        <div id="editMovie">
            <h2>Edit a movie in the database</h2>

            <label>Choose the movie to edit</label>
            
            <select id="movies" name="movies">
            <option>
            <?php 
            $movies = queryDatabase("SELECT * FROM movies"); 
            //var_dump($categories); 
                for ($i=0 ; $i<count($movies); $i++) { ?>
                <option><?php echo $movies[$i]['title']; ?>
            <?php } ?>
                </option>
            </select>

	        <form enctype="multipart/form-data" action="#" method="POST">

            <label>New Movie Title:</label>
            <br>
            <input type="text" name="title" id="title">
            <br><br>
            <label>New Movie Release Year:</label>
            <br>
            <input type="number" name="release_year" maxlength = "4" id="release_year">
            <br><br>
            <label>New Synopsis:</label>
            <br>
            <textarea name="synopsis" cols="30" rows="10" placeholder="Write your blurb here..." id="synopsis"></textarea>
            <br><br>
            <label>New Category:</label>
            <br>

            <select name="category_list">
            <option>
            <?php 
            $categories = queryDatabase("SELECT * FROM categories"); 
            //var_dump($categories); 
            for ($i=0 ; $i<count($categories); $i++) { ?>
            <option><?php echo $categories[$i]['category']; ?>
            <?php } ?>
            </option>
            </select>

            <br><br>
            
            <h3>Upload New Movie Poster:</h3>
            
            <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
            <br>
            <label>Select a file:</label>
            <br><br>
            <input name="category" type="file" name="my_file">
            <br><br>
            <input type="submit" name="submit" value="Update Movie">
        
	        </form>
        </div>

    </main>
    </body>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
    
    <script src="./script/loginregister.js"></script>
    <script src="./script/modal.js"></script>
    
    <script>
    // If you change the list value, you change too the button and the input with the old previous update
    $('#movies').change(function (e) {
    $selectVal = $(this).val();

    // which children is selected
    // $indexChildrenSelected = $(this).selectedIndex;
    
    // get the text from the children selected
    $selectText = $(this).find('option:selected').text();
    $res = "SELECT release_year FROM movies m WHERE m.title = '$selectText'";
    $res = queryDatabase($selectYear);
    console.log($res);
    if($res){
    if ($selectVal) {
        $('#title').val($selectText);
        $("#release_year").val($res["release_year"]);
        $('#synopsis').val("");
    } else {
        $("#title").val("");
        $("#release_year").val("");
        $("#synopsis").val("");
    }
    }
    });
    
    </script>
    
    </html>