<?php 
function checkUser(&$user) {
        $user = strip_tags($user);
        if ( strlen($user) < 8 ) {
            $GLOBALS['error'] .= "'$user' must have at least 8 caracteres.<BR>";
            return false; 
        }
        
        return true;
    }
    function checkMail(&$mail) {
        $mail = strip_tags($mail);
        // removed some invalid caractere
        $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $GLOBALS['error'] .= "Email not valid<BR>";
            return false;
            
        }
        return true;
    }
    function checkPassword (&$pwd) {
        $pwd = strip_tags($pwd);

        if ( strlen($pwd) < 8 ) {
            $GLOBALS['error'] .= "Password must have at least 8 caracteres.<BR>";
            return false; 
        }
        
        
        return true;
    }
    
    function checkSessionCookies() {
        if ( !isset( $_SESSION['firstName'] )  && isset($_COOKIE['firstName']) ) {
            $_SESSION['firstName'] = strip_tags ( $_COOKIE["firstName"] );
        }
        if ( !isset( $_SESSION['lastName'] )  && isset($_COOKIE['lastName']) ) {
            $_SESSION['lastName'] = strip_tags ( $_COOKIE['lastName'] );
        }
        if ( !isset( $_SESSION['email'] )  && isset($_COOKIE['email']) ) {
            $_SESSION['email'] = strip_tags ( $_COOKIE["email"] );
        }
           
    }

    function checkUserPwd($userId, $userPwd){

    }

    function login() {
        $error = "";
    $connect ="";
    
    if ( !isset($_POST['submit_connection'])) {

        sleep( 10 );
        header("location: index.php");
 
      } else { 
        
        
        $bEmail=checkMail($_POST['email']);
        $bPassword=checkPassword($_POST['password']);

        if ( $bEmail && $bPassword ) {

            include_once "connect.php";

            $connect = mysqli_connect (DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);

            if (!$connect) {
                echo "Problem with server ... " ;
                die();
            } 


            $email = $_POST['email'];
            $pwd   = $_POST['password'];
            
            
            
            $query = "SELECT * FROM users WHERE mail = '$email'";
            
            $result = mysqli_query ($connect,$query) ;
            if (!$result) {
                echo "SQL Error ... " . mysqli_error($connect);
                die();
            }

            $foundEmail = false;
            $firstName = "";
            $lastName ="";

            while ( $row = mysqli_fetch_assoc($result) ) {
                $foundEmail = true;
                if ( ! password_verify ( $pwd  , $row['password'] ))  { ?>
<script language="javascript">
alert("Wrong Password !!!!");
</script>
<?php
                    //echo "<javascript>alert('wrong password !!!')</javascript>";
                    mysqli_close ($connect);
                    //die();  
                } else {
                   // echo "show information !!! ";
                   // var_dump ($row);
                    $firstName = $row['firstname'];
                    $lastName  = $row['lastname'];
                }
            }

            if (!$foundEmail) {
                echo "I didn't found this email $email !!!!";
                mysqli_close ($connect);
                
            } else {

              //  echo "Welcome " . $email;
                 //var_dump ( $_POST );
                if ( isset($_POST['reminderMe']) ) {
                    setcookie ('firstName', $firstName,  time() + 3600 );
                    setcookie ('lastName', $firstName,  time() + 3600 );
                    setcookie ('email', $firstName,  time() + 3600 );
                    }
                    $_SESSION['firstName']=$firstName;
                    $_SESSION['lastName']=$lastName;
                    $_SESSION['email']=$email;
                    
                    // var_dump ( $_POST );
                    mysqli_close ($connect);
                    
                }
            

        } else {
            echo "Some Error occured <BR>" . $error;
        }
        
    }
    }

    // added parameter InspUdDel, if you insert update delete rows, it's not necessary to fetch the result, just checking the result
    // by default, it's a select !!! to return in an array the result from your query
    function queryDatabase($queryToRun, $InsUpdDel = false ){
        $noerror = true;
        if ( !empty ($queryToRun) ) {
            
            include_once "connect.php";

            $connect = mysqli_connect (DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);

            if (!$connect) {
                if ( defined  ( 'DB_DEBUGGER' ) ) {
                    echo "Problem with server ... " ;
                }
                return false;
            } else {
                $result = mysqli_query ($connect,$queryToRun) ;
                $resultToReturn = array();

                if (!$result) {

                    if (defined  ( 'DB_DEBUGGER' )) {
                        echo "SQL Error ... " . mysqli_error($connect);
                    }
                    return false;
                //    $error = true;
            
                } else {   
                    if ( $InsUpdDel ) {
                        return true;
                    }
                    while ( $row = mysqli_fetch_assoc($result) ) {
                        $resultToReturn[]=$row;
                    }
                    
                    
                }
                
                mysqli_close ($connect);
                
                return $resultToReturn;
                
            }   
        } else {
            
            if ( defined  ( 'DB_DEBUGGER' ) ) {
                echo " \$queryToRun is empty " . mysqli_error($connect);
            }
            return false;
        }
    };

    function ftcGetCategoryList() {

        $query = "select * from categories";
        //$result = queryDatabase($query);
        return queryDatabase($query);
    }

?>