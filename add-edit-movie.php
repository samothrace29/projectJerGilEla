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
            <input type="number" name="year" placeholder="year" maxlength = "4">
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

require_once 'connect.php';
$connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
$db_found = mysqli_select_db($connect,'projectejg');



?>
