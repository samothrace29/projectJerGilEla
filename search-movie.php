<?php

require_once 'connect.php';
$connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
$db_found = mysqli_select_db($connect,'projectejg');

if($db_found){
    
    $title=$_POST['search'];
if(!empty($title)){
    
    $query= "SELECT * FROM movies where title like '%$title%'";


    
    $result_query=mysqli_query($connect,$query);
    //echo mysqli_error($connect);
  
    while($userinfo = mysqli_fetch_assoc($result_query)){
    
      // if  ( $counter == 1 ) $savetitle = $userinfo['title'];
        $name=$userinfo['title'];
        $poster=$userinfo['poster'];
        $movieid=$userinfo['movie_id'];
        
        echo "<a href='movie_detail.php?moid=$movieid'>$name</a>",
        "<img src='database/movie_posters/$poster' height='200px' width='150px'>".'<br>',
        "<div class='hidden'>$movieid </div><br>";
    }


}
}else{
    echo 'db not found';
}
 
