<?php
session_start();
// logout here
// unset session variables
session_unset();
// destroy the session
session_destroy();
// redirect user to login page
header("Location: login_form.php");
?>
