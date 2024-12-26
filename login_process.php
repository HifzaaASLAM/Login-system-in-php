<?php 
session_start();

include('dbcon.php');

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($connection, $_POST['uname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    if (empty($username) || empty($email)) {
        die("Username or email is missing.");
    }

    $query = "SELECT * FROM `users` WHERE `username` = '$username' AND `user_email_id` = '$email'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_num_rows($result);
        if ($row == 1) {
            $_SESSION['uname'] = $username;
            header('Location: home.php');
            exit;
        } else {
            header('Location: index.php?message=your username or id is inavlid');
            echo "Invalid username or email.";
        }
    }
}
?>
