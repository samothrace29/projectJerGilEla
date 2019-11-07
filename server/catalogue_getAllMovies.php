<?php 

include "../function.php";

if (isset ($_POST['category'])) {
    
    if (strlen($_POST['category']) > 0) {

        $query = queryDatabase("SELECT * FROM movies INNER JOIN categories ON categories.category_id = movies.category_id where category = '" . $_POST['category'] . "'");
        echo $query;
        if ($query) {
            //print_r( $query );
            echo json_encode($query);
        } else {
            echo "wrong! 1";
        }
        
    }
     else {
        echo "wrong! 2";
    }
} else {
    var_dump ($_POST);
    echo "wrong 3";
}
