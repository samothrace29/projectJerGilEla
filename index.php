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
<link rel="stylesheet" href="style/index.css">
<title>Document</title>
</head>
<body>
    <?php include_once "menu.php"; ?>
    <?php include_once "formLogReg.html"; ?>
    
<h1> Welcome to the Project Page of Elaine, Gilles Victor André and Jérôme</h1>

<p>Go Speed Racer. Go Speed Racer. Go Speed Racer go! Well we're movin' on up to the east side. To a deluxe apartment in the sky. Wouldn't you like to get away? Sometimes you want to go where everybody knows your name. And they're always glad you came. Here he comes Here comes Speed Racer. He's a demon on wheels. Believe it or not I'm walking on air. I never thought I could feel so free! Boy the way Glen Miller played. Songs that made the hit parade. Guys like us we had it made. Those were the days! Here's the story of a man named Brady who was busy with three boys of his own.</p>

<p>Why do we always come here? I guess well never know. Its like a kind of torture to have to watch the show. Doin' it our way. There's nothing we wont try. Never heard the word impossible. This time there's no stopping us. Well the first thing you know ol' Jeds a millionaire. Kinfolk said Jed move away from there.</p>




<form action="#" method="POST">

<input type="search" name="search" value="" placeholder="Enter a movie you want to search">
<input type="submit" name="submit">
</form>

<div id="resultForm">...</div>

<?php 

require_once 'connect.php';
$connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
$db_found = mysqli_select_db($connect,'projectejg');

if($db_found){

    $query= "SELECT * FROM movies";

    $result_query=mysqli_query($connect,$query);
    var_dump($result_query);

    while ($movies = mysqli_fetch_assoc($result_query)){

            $title=$movies['title'];
            $release=$movies['release_year'];
            $synopsis=$movies['synopsis'];
            $category=$movies['category'];
            $poster=$movies['poster'];
            
            echo $category.'<br>';
            




    }
$query= "SELECT * FROM movies ORDER BY movie_id DESC LIMIT 4" ;

    $result_query=mysqli_query($connect,$query);
    var_dump($result_query);

    while ($movies = mysqli_fetch_assoc($result_query)){
        $title=$movies['title'];
        $release=$movies['release_year'];
        $synopsis=$movies['synopsis'];
        $category=$movies['category'];
        $poster=$movies['poster'];
 
        
    echo "<img src='database/movie_posters/$poster' height='250px' width='200px'>";
    echo "<p> Title: $title </p>"; 
            

}

}



?>    



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
    $(function(){
        $('input[type=search]').keyup(function(e){
          e.preventDefault();
          $.ajax({
              url: 'search-movie.php',
              type:'post',
              data: $('form').serialize(),
              success: function(result){    
                  $('#resultForm').html('<div class="green">' + result + '<div>');
              },
              error: function(err){
                  $('#resultForm').html('<div class="red">' + result + '<div>');
              }
          });
      
      
        });
        });

</script>

</body>
</html>