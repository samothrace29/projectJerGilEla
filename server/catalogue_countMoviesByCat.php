<?php 

include "../function.php";


if (isset ($_POST['category'])) {
    $cat = $_POST['category'];

    // I must add validate $cat
    if (strlen($cat) > 0) {
        $query  ="";

        if ( $cat === "*" ) {
            $query = queryDatabase("SELECT category, count(*) FROM movies INNER JOIN categories ON categories.category_id = movies.category_id group by categories.category_id");
        }
        else {
            $query = queryDatabase("SELECT category, count(*) FROM movies INNER JOIN categories ON categories.category_id = movies.category_id where category = '" . $_POST['category'] . "'");
        }

        $orderBy="";
        $validOrder=false;

        if (isset($_POST['orderBy'])) {
        
            if ($_POST['orderBy']) {
                $orderBy = $_POST['orderBy'] ;
                if ($orderBy === "title") {
                    $validOrder=true;
                }
            
            }
        } 
        if ($validOrder) {
            $query += " ORDER BY " + $orderBy;
        }

        echo $query;
        if ($query) {
            //print_r( $query );
            echo json_encode($query);
        } else {
            echo "wrong! 1";
        }
        
    }
     else {
        echo "no category";
    }
} else {
    var_dump ($_POST);
    echo "wrong 3";
}
