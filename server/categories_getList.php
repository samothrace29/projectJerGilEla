<?php 

include "../function.php";

if (isset($_POST['request_list'])) {
    
    $query = queryDatabase("select * from categories");
    if ($query) {
        //print_r( $query );
        echo json_encode($query);
    }
}