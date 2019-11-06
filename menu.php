<?php 
  
?>
<nav class="navbar navbar-expand-lg navbar-dark indigo">
  
<div class="collapse navbar-collapse" id="navbarText">
<ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link active" href="index.php">Home</a>
    </li>
    <?php if ( !isset ( $_SESSION ['firstName'] ) ) { ?>

      <li class="nav-item">
        <a class="nav-link active" href="#!" id="idLoginModal">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#!" id="idRegisterModal">Register</a>
      </li>
      <?php } ?>
    <li class="nav-item">
      <a class="nav-link" href="myAccount.php">Check</a>
    </li>
    <?php 
    //session_start();

    if ( !isset( $_SESSION['firstName'] )  && isset($_COOKIE['firstName']) ) {
      $_SESSION['firstName'] = $_COOKIE['firstName'];
  }
    if ( !isset( $_SESSION['lastName'] )  && isset($_COOKIE['lastName']) ) {
      $_SESSION['lastName'] = $_COOKIE['lastName'];
  }
    if ( !isset( $_SESSION['email'] )  && isset($_COOKIE['email']) ) {
      $_SESSION['email'] = $_COOKIE['email'];
  }
    if ( isset ($_SESSION['firstName'] )) { ?>

      <!-- <li class="nav-item">
        <a class="nav-link" href="edit_myAccount.php">Update account</a>
      </li> -->

      
      <?php
}



?>
    
    <li class="nav-item">
      <a class="nav-link" href="products.php">products</a>
    </li>
  </ul>
  <?php if ( isset ( $_SESSION['firstName'] ) ) { ?> 
    <div class="navbar-nav ml-auto nav-flex-icons">
      
      <span class="navbar-text white-text">
        <?php echo $_SESSION['firstName']; ?>
      </span>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
    </div>
  <?php } ?>
  </div>
</nav>