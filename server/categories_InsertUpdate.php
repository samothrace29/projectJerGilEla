<?php 
//var_dump($_POST);
include "../function.php";

//var_dump($_POST);
$returnCode = array();

if ( isset( $_POST ['categories_type']) ) {
    if ( $_POST ['categories_type'] === "update" ) {

        $catNameOLD =  $_POST ['categorie_name'] ;
        $catNameNEW =  $_POST ['categorie_UpdateValue'] ;
        $catNameID  = $_POST ['id'] ;


        
        $query = "UPDATE categories 
        SET category='$catNameNEW' 
        WHERE category='$catNameOLD' 
        AND category_id = $catNameID";
        // echo ($query);
        // var_dump(queryDatabase($query)) ;
        $rcSQL = queryDatabase($query,true);
        // var_dump(empty($rcSQL));
        if ( $rcSQL ){ 
            $returnCode[] = array('rc' => '0', 'message' => 'updated successfully') ;   
            //print_r ($returnCode);
            //$returnCode[] = array("rc" => "0", "message" => "updated successfully") ;   
        } else {
            $returnCode[] = array('rc' => -1, "message" => "update failed !!!") ;    
            
        }
    }
    else {
        if ( ( $_POST ['categories_type']  === "create") ) {

            //$catNameOLD =  $_POST ['categorie_name'] ;
            $catNameNEW =  $_POST ['categorie_UpdateValue'] ;
            //$catNameID  = $_POST ['id'] ;
    
    
            
            $query = "INSERT INTO categories 
             ( category ) VALUES ( '$catNameNEW' ) ";
;
           
            $rcSQL = queryDatabase($query,true);
            
            if ( $rcSQL ){ 
                $returnCode[] = array('rc' => '0', 'message' => 'inserted successfully') ;   
              
            } else {
                $returnCode[] = array('rc' => -1, "message" => "insert failed !!!") ;    
                
            }














            
            $returnCode[] = array("rc" => 0, "message" => "created successfully") ;   
            
        } else {
            $returnCode[] = array("rc" => -1, "message" => "categories_type : invalid") ;    
            
        }
    }
} else {
  $returnCode[] = array("rc" => -1, "message" => "categories_type not set") ;   
}


echo json_encode($returnCode); 