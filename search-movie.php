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
    while($userinfo = mysqli_fetch_assoc($result_query)){
        echo $userinfo['title'].'<br>';
    }
}
}else{
    echo 'db not found';
}
 
