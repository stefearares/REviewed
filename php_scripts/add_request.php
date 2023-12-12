<?php
session_start();
require './dbh.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in and has the required permission
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['permission'] === 0) {
        // Get the username and permission from the session
        $username = $_SESSION['username']; // Make sure you have 'username' in your session data
        $permission = $_SESSION['permission'];
        $reason= $_POST['request_reason'];
        // Check if the username already exists in the 'requests' table
        $checkDuplicate = "SELECT * FROM requests WHERE username = '$username'";
        $result = $conn->query($checkDuplicate);

        if ($result->num_rows > 0) {
            // Duplicate username found, handle accordingly (e.g., show an error message)
            header("Location: ../profile_page/profile.php?request=denied");
        } else {
            // Insert data into the 'requests' table
            $sql = "INSERT INTO requests (username, permission,description) VALUES ('$username', '$permission','$reason')";
            header("Location: ../profile_page/profile.php");

            if ($conn->query($sql) === TRUE) {
                echo "Request submitted successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Redirect after submitting the form
        exit;
    }
}
?>
