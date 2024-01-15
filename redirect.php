<?php
session_start();
if (!isset($_SESSION['full_name'])) {
    $_SESSION['error_message'] = "You need to login first";
    header("Location: login_form.php");
    exit();
}
?>