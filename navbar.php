<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">American Football</a>
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="index.php" id="home">Home</a></li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <link rel="stylesheet" href="style.css">
          <a href="#" class="dropdown-toggle" id="dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="products.php">Products</a></li>
            <li><a href="customers.php">Customers</a></li>
            <li><a href="staffs.php">Staffs</a></li>
            <li><a href="orders.php">Orders</a></li>
          </ul>
        </li>
      </ul>
      <?php if (isset($_SESSION['username'])): ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">
              <?php echo $_SESSION['full_name']; ?>
              <img src="profile.png" alt="Profile Picture" class="profile-pic" style="max-width: 25px; max-height: 25px; border-radius: 50%; margin-right: 5px;">
            </a>
            <ul class="dropdown-menu">
              <!-- <li><a href="#">Profile</a></li> -->
              <li><a href="logout.php">Log Out</a></li>
            </ul>
          </li>
        </ul>
      <?php else: ?>
        <ul class="nav navbar-nav navbar-right">
        <link rel="stylesheet" href="style.css">
        <li><a href="login_form.php" id="login_navbar">Login</a></li>
      </ul>
      <?php endif; ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>