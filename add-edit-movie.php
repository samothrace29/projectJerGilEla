<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/add-edit-movies.css">
    <title>Add/Edit Movies</title>
</head>

<body>

    <main>
        <div id="addMovie">
            <h2>Add a new movie to the database</h2>

	        <form action="#" method="POST">

            <label>Movie Title:</label>
            <br>
            <input type="text" name="title" placeholder="title">
            <br>
            <label>Movie Release Year:</label>
            <br>
            <input type="number" name="year" placeholder="year" maxlength = "04">
            <br>
            <label>Synopsis:</label>
            <br>
            <textarea name="synopsis" id="" cols="30" rows="10">Write your blurb here...</textarea>
            <br>
            <label>Category:</label>
            <br>
            <select name = "category">
                <option value ="" selected disabled hidden>Choose category here</option>
                <option value = "drama" name = "drama">Drama</option>
                <option value = "thriller" name = "">Thriller</option>
                <option value = "comedy" name = "">Comedy</option>
                <option value = "scifi" name = "">Science Fiction</option>
                <option value = "fantasy" name = "">Fantasy</option>
                <option value = "action" name = "">Action</option>
            </select>
            <br>
            <input type="submit" name="submit" value="Submit New Movie">
        </div>
        
    </form>

    <label>Upload Movie Poster:</label>
    <form enctype="multipart/form-data" action="" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="500000000">
        <br>
        <label>Select a file:</label>
        <br>
        <input type="file" name="my_file">
        <br>
        <input type="submit" name="send-file" value="send the file">
    </form>

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

<?php

if (!empty($_POST)) {
	// Basics validations
	if (empty($_POST['title'])) {
		$errors[] = 'Title is mandatory';
	}
	if (empty($_POST['year'])) {
		$errors[] = 'Year of release is mandatory';
	}
	if (count($errors) === 0) {
		// If no errors, insert into DB
        require_once 'database.php';
        
		// Open a connection to the DBMS
		$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
        $query = "INSERT INTO movies(title, release_year, synopsis) VALUES('" . $_POST['title'] . "', '" . $_POST['year'] . "')";
		// Send an SQL request to our DB
		$result_query = mysqli_query($connect, $query);
		if ($result_query) {
			echo 'Movie successfully addded !';
		} else {
			echo 'Error inserting into the DB';
		}
	} else {
		echo implode('<br>', $errors);
	}
}

require_once 'connect.php';
$connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
$db_found = mysqli_select_db($connect,'projectejg');

if (isset($_POST['send-file'])) {
    
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
                'gif' => 'image/gif',
            )
        );
        if ($extFoundInArray === false) {
            echo 'That is not a picture';
        } else {
            $shaFile = sha1_file($_FILES['my_file']['tmp_name']);
            $nbFiles = 0;
            $fileName = '';
            do {
                $fileName = $shaFile . $nbFiles . '.' . $extFoundInArray;
                $fullPath = 'uploads' . $fileName;
                $nbFiles++;
            } while (file_exists($fullPath));
            $moved = move_uploaded_file($_FILES['my_file']['tmp_name'], $fullPath);
            if (!$moved) {
                echo 'Error error';
            } else
                echo "File successfully saved <br>";
            $user = $_SESSION['user'];
            require_once 'database.php';
            //connect to the database
            $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
            $query = "
        UPDATE users SET picture = '" . $fileName . "' WHERE nickname='$user'
        ";
            $db_found = mysqli_select_db($connect, 'moviedb');
            $result_query = mysqli_query($connect, $query);
            if ($result_query)
                echo '<img src="uploads' . $fileName . '">';
            else
                echo 'DID NOT WORK';
        }
    }
}

?>
