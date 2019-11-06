<?php

require_once 'connect.php';
$connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
$db_found = mysqli_select_db($connect,'projectejg');

if($db_found){
    
    $title=$_POST['search'];
if(!empty($title)){
    
    $query= "SELECT * FROM movies where title like '%$title%'";


    var_dump($query);
    $result_query=mysqli_query($connect,$query);
    //echo mysqli_error($connect);
   //! $counter=0;
   //! $savetitle = "";
    while($userinfo = mysqli_fetch_assoc($result_query)){
       //! $counter++;
       //! if  ( $counter == 1 ) $savetitle = $userinfo['title'];
        $name=$userinfo['title'];
        $poster=$userinfo['poster'];
        
        
        echo $name.' ',
        "<img src='database/movie_posters/$poster' height='100px' width='50px'>".'<br>';
    }

   //! if  ( $counter == 1 ) 
}
}else{
    echo 'db not found';
}
 
