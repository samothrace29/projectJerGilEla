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
<link rel="stylesheet" href="style/movie_detail.css">

<title>Movie Detail</title>
</head>
<body>
    <?php include_once "menu.php"; ?>
    <?php include_once "formLogReg.html"; ?>
   
    



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


</body>
</html>

<?php 



$movieid=$_GET['moid'];

require_once 'connect.php';
$connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
$db_found = mysqli_select_db($connect,'projectejg');

if($db_found){

   
    $query="SELECT m.*,c.category FROM movies m join categories c on m.category_id = c.category_id WHERE movie_id=$movieid";
   
   
    
    $result_query=mysqli_query($connect,$query);
    
    
    
    $movie = mysqli_fetch_assoc($result_query);

    $title=$movie['title'];
    $release=$movie['release_year'];
    $synopsis=$movie['synopsis'];
    $category=$movie['category'];
    $poster=$movie['poster'];
    $movieid=$movie['movie_id'];
    $location=$movie['file_location'];

    echo "<main>";
    echo "<section class='pic'>",
    "<img src='database/movie_posters/$poster' height='400px' width='300px'>.<br>",
    "<p><strong>Release Date:</strong>  $release</p>";
    echo "</section>";
    echo "<section class='title'>",
    "<div class='titcat'>",
    "<p><strong>Movie title:</strong> $title </p>",
    "<p><strong>Category:</strong> $category </p>".'<br>',
    "</div>",
    "<p><strong>Description:</strong> $synopsis</p>".'<br>',
    "<p><strong>File path: $location</p>";
    echo "</section>";
    echo "</main>";



}




?>