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
    <title>Add Movies</title>
    </head>
<?php
include 'function.php';
include_once 'menu.php';
define('SITE_ROOT', realpath(dirname(__FILE__)));
var_dump($_POST);

if (isset($_POST['submit'])) {

    //echo "hello";
    
    if (!empty($_POST)) {
        $errors = array();
        $error = 0;
        // Basics validations
        if (empty($_POST['title'])) {
        $errors[] = 'Title is mandatory';
        $error++;
	}
	if (empty($_POST['release_year'])) {
        $errors[] = 'Year of release is mandatory';
        $error++;
    }
    if (empty($_POST['synopsis'])) {
        $errors[] = 'Synopsis is mandatory';
        $error++;
    }
    if (empty($_POST['category_list'])) {
        $errors[] = 'Category is mandatory';
        $error++;
    }
    
    //echo "hello";
	if (count($errors) === 0) {
        
        $query = "INSERT INTO movies(title, release_year, synopsis, category_id) 
        VALUES('" . $_POST['title'] . "', 
        '" . $_POST['release_year'] . "', 
        '" . $_POST['synopsis'] . "' , 
        (select category_id FROM categories WHERE category = '" . $_POST['category_list'] . "'))";
        // Send an SQL request to our DB
        $categories = queryDatabase("SELECT * FROM categories c INNER JOIN movies m ON m.category_id = c.category_id");

        //echo "lhlkhklhjlk";
        if($categories){
            
       
            $result_query = queryDatabase($query, true); 
            //var_dump($categories); 
            
		if ($result_query) {
			echo 'Movie successfully addded!';
		} else {
			echo 'Error inserting into the database';
        }
    }else{
        $errors[] = 'Error select on categories';
    }
	} else {
		echo implode('<br>', $errors);
    }
    
}
}

require_once 'connect.php';
$connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
$db_found = mysqli_select_db($connect,'projectejg');

if (isset($_POST['submit'])) {
    
    if ($_FILES['my_file']['error'] != UPLOAD_ERR_OK) {
        echo 'Upload Error';
    } else {
        echo '<pre>';
        var_dump($_FILES);
        echo '</pre>';
        
        $extFoundInArray = array_search(
            $_FILES['my_file']['type'],
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif'
            )
        );
        $fullPath = '';

        if ($extFoundInArray === false) {
            echo 'That is not a picture';
        } else {
            $shaFile = sha1_file($_FILES['my_file']['tmp_name']);
            $nbFiles = 0;
            $fileName = '';
            do {
                $fileName = $shaFile . $nbFiles . '.' . $extFoundInArray;
                $fullPath = SITE_ROOT. '/database/movie_posters/' . $fileName;
                $nbFiles++;
            } while (file_exists($fullPath));
            $moved = move_uploaded_file($_FILES['my_file']['tmp_name'], $fullPath);
            if (!$moved) {
                echo 'Error error';
            } else
                echo "File successfully saved <br>";
            

            require_once 'connect.php';
            //connect to the database
            $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
            $query = "UPDATE movies SET poster = '" . $fileName . "'"  . " WHERE title='" . $_POST['title'] . "'";
            $db_found = mysqli_select_db($connect, 'projectejg');
            $result_query = mysqli_query($connect, $query);
            if ($result_query)
                echo '<img src="' . './database/movie_posters/' . $fileName . '">';
            else
                echo 'DID NOT WORK';
        }
    }
}

?>
<body>

    <main>
        <div id="addMovie">

            <h2>Add a new movie to the database</h2>

	        <form action="#" enctype="multipart/form-data" method="POST">
            <label>Movie Title:</label>
            <br>
            <input type="text" name="title">
            <br><br>
            <label>Movie Release Year:</label>
            <br>
            <input type="number" name="release_year" maxlength="4">
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
                <?php } 
                ?>
            </select>
            <br><br>
            
            <h3>Upload New Movie Poster:</h3>
            
            <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
            <br>
            <label>Select a file:</label>
            <br><br>
            <input type="file" name="my_file">
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

