<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$currentLevel = $_SESSION['level'];
// Get the absolute pathname of the current script
$currentScript = $_SERVER['SCRIPT_FILENAME'];

// Extract the filename without the path
$scriptFilename = basename($currentScript);

// Use a switch statement to handle different cases
switch ($scriptFilename) {
    case 'staffs.php':
        // This block will be executed if auth_level.php is included in specific_file.php
        if ($currentLevel == "Admin") {
            $_SESSION['access'] = 'A';
        } elseif ($currentLevel == "Super") {
            $_SESSION['access'] = 'S';
        } else {
            $_SESSION['auth_error'] = "You don't have permission to access Staff page!";
            echo "Error: " . $_SESSION['auth_error'];
            header("Location: index.php");
            exit();
        }
        break;

    case 'products.php':
    case 'productstest.php':
    // same as customers.php
    case 'customers.php':
        if ($currentLevel == "Normal") {
            $_SESSION['access'] = 'N';
        } else {
            $_SESSION['access'] = 'A';
        }
        break;
    case 'orders.php':
        if ($currentLevel == "Normal") {
            $_SESSION['access'] = 'N';
        } else {
            $_SESSION['access'] = 'A';
        }
        break;

    default:
        break;
}

?>