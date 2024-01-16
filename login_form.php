<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_SESSION['user_id'])){
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>American Football Equipment and Supplies : Login</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
     
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="style.css">
        <style type="text/css">
            body {
                background-color: slateblue;
            }
        </style>
    </head>
    <body>
    <?php include_once 'navbar.php' ?>
    <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="page-header">
          <h2 id="login" style="text-align: center;">Login Form</h2>
        </div>
        </div>
    </div>
        <div class="login">
            <?php
            if (isset($_SESSION['error_message'])):
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                        echo $_SESSION['error_message'];
                        unset($_SESSION['error_message']); // Clear the error message
                    ?>
                    </div>
            <?php endif; ?>
            <form action="login.php" method="post">
                <label for="username">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </label>
                <input type="text" name="username" placeholder="Username" id="username" required>
                <label for="password">
                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                </label>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <input type="submit" value="Login">
            </form>
        </div>
    <!-- Add this at the end of your HTML body -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>