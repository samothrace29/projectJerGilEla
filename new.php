<?php
    session_start();
    if (isset($_COOKIE['staylogin'])) {
        $_SESSION['login'] = $_COOKIE['staylogin'];
    }
?>
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
    <link rel="stylesheet" href="style/categories.css">
    <title>Add a Movie</title>
</head>
<body>
<?php
    include 'function.php';
    include_once 'menu.php';
    require_once 'connect.php';
    $title = '';
    $synopsis = '';
    $poster = '';
    $release_year = '';
    $local_path = '';
    $category = '';

    if(isset($_GET['id'])){
        $query = "SELECT * FROM `movies` WHERE movie_id =".$_GET['id'];
        $result_query = mysqli_query($connect, $query);
        $res = mysqli_fetch_assoc($result_query);
        $title = $res['title'];
        $synopsis = $res['description'];
        $poster = $res['poster'];
        $release_year = $res['release_year'];
        $local_path = $res['local_path'];
        $category = $res['category_id'];
    }
?>
<form action="#" method="POST">
    
    Title: <input type="text" name="title" value="<?php echo $title ?>" required><br>
    Synopsis: <textarea name="synopsis" cols="30" rows="1" required><?php echo $synopsis ?></textarea><br>
    Poster: <input type="text" name="poster" value="<?php echo $poster ?>"required><br>
    Release Year: <input type="number" name="release_year"  value="<?php echo $release_year ?>"required><br>
    Local Path: <input type="text" name="local_path"  value="<?php echo $local_path ?>" required><br>
    <?php
        $query = 'SELECT * FROM categories ORDER BY title';
        $result_query = mysqli_query($connect, $query);
        echo 'Category: <select name="category" value="'.$category.'">';
        while($res = mysqli_fetch_assoc($result_query)){
            if($category==$res['category_id']){
                echo '<option selected value="'.$res['category_id'].'">'.$res['title'].'</option>';
            }else{
                echo '<option value="'.$res['category_id'].'">'.$res['title'].'</option>';
            }
        }
        echo '</select><br>';
    ?>
    <input type="submit" name="submit" value="<?php echo isset($_GET['id']) ? "Edit the movie":"Add a movie"?>">
</form>    
</body>
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
</html>
<?php
    if (isset($_POST['submit'])) {
        var_dump($_POST);
        $title = $_POST['title'];
        $synopsis = $_POST['synopsis'];
        $poster = $_POST['poster'];
        $release_year = $_POST['release_year'];
        $local_path = $_POST['local_path'];
        $category = $_POST['category'];
        if(isset($_GET['id'])){
            $query = "UPDATE movies SET title='$title',synopsis='$synopsis',poster='$poster',release_year=$release_year,local_path='$local_path',category_id=$category WHERE product_id =".$_GET['id'];
            $result_query = mysqli_query($connect, $query);
            if($result_query){
                echo '<br>';
                echo 'Successfully update the movie.';
            }else{
                echo '<br>';
                echo 'Something went wrong. Try again...';
            }
        }else{
            if(empty($title) || empty($synopsis) || empty($poster) || empty($release_year) || empty($local_path) || empty($category)){
                echo 'Missing same details. Try again...';
            }else{
                $query = "INSERT INTO movies(title, synopsis, poster, release_year, local_path, category_id) VALUES('$title', '$synopsis', '$poster', $release_year,'$local_path',$category)";
                $result_query = mysqli_query($connect, $query);
                if ($result_query){
                    echo '<br>';
                    echo 'Successfully registered new movie.';
                }else{
                    echo '<br>';
                    echo 'Something went wrong. Try again...';
                }
            }
        }
    }
    
    mysqli_close($connect);
    ?>