<?php
// Start the session
include_once 'database.php';
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user input
    $staffId = $_POST['username'];
    $password = $_POST['password'];

    // Validate input (you may want to add more validation)
    if (empty($username) || empty($password)) {
        echo "Both username and password are required.";
        exit;
    }


    // Fetch user data from the database
    $sql = "SELECT fld_staff_num, fld_staff_fname,fld_staff_lname, fld_staff_position, fld_staff_level, fld_staff_password FROM tbl_staffs_a186683_pt2 WHERE fld_staff_num = :s";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":s", $staffId, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $userId = $result['fld_staff_num'];
        $dbUsername = $result['fld_staff_fname'];
        $fullName = $result['fld_staff_fname'] . " " . $result['fld_staff_lname'];
        $level = $result['fld_staff_level'];
        $dbPasswordHash = $result['fld_staff_password'];

        if ($dbUsername && password_verify($password, $dbPasswordHash)) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $userId;
            $_SESSION['username'] = $dbUsername;
            $_SESSION['full_name'] = $fullName;
            $_SESSION['level'] = $level;

            // Redirect to a secure page
            header("Location: index.php");
            exit();
        }
        else{
            // Invalid username or password
            $errorMsg= "Invalid username or password.";
            $_SESSION['error_message'] = $errorMsg;
            header("Location: login_form.php");
        }
    } else {
        // Invalid username or password
        $errorMsg= "Invalid username or password.";
        $_SESSION['error_message'] = $errorMsg;
        header("Location: login_form.php");
    }

    // Close the database connection
    $conn = null;
}
?>