?php session_start(); ?>
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

    <main>
    <?php

    include 'function.php';
    include_once 'menu.php';

    ?>

<div id="editMovie">
            <h2>Edit a movie in the database</h2>

	        <form enctype="multipart/form-data" action="#" method="POST">

            <label>Movie Title:</label>
            <br>
            <input type="text" name="title">
            <br><br>
            <label>Movie Release Year:</label>
            <br>
            <input type="number" name="release_year" maxlength = "4">
            <br><br>
            <label>Synopsis:</label>
            <br>
            <textarea name="synopsis" cols="30" rows="10" placeholder="Write your blurb here..."></textarea>
            <br><br>
            <label>Category:</label>
            <br>
            <select name="category_list">
            <option>

            <?php 
            $categories = queryDatabase("SELECT * FROM categories"); 
            //var_dump($categories); 
            for ($i=0 ; $i<count($categories); $i++) { ?>
            <option><?php echo $categories[$i]['category']; ?>
            <?php } ?>

            </select>
            <br><br>
            
            <h3>Upload Movie Poster:</h3>
            
            <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
            <br>
            <label>Select a file:</label>
            <br><br>
            <input name="category" type="file" name="my_file">
            <br><br>
            <input type="submit" name="submit" value="Submit New Movie">
        
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
    
    
    </html>