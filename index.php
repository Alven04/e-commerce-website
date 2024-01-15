<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>American Football Equipment and Supplies</title>
	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      html {
        width:100%;
        height:100%;
        background:url(logo.png) center center no-repeat;
        min-height:100%;
      }
    </style>
</head>
<body>
	<?php include_once 'navbar.php'; ?>
  <?php
  if (isset($_SESSION['auth_error'])):
    ?>
    <div class="alert alert-danger" role="alert">
      <?php
      echo $_SESSION['auth_error'];
      unset($_SESSION['auth_error']); // Clear the error message
      ?>
    </div>
  <?php endif; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>