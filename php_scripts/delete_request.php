<?php
session_start();
require 'dbh.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['confirm_yes'])) {
        $username = $_POST['username'];

        // Update the accounts table to set permission to 1
        $updateSql = "UPDATE accounts SET permission = 1 WHERE username = '$username'";
        if ($conn->query($updateSql) === TRUE) {
            // Deletion from the requests table
            $deleteSql = "DELETE FROM requests WHERE username = '$username'";
            if ($conn->query($deleteSql) === TRUE) {
                header("Location: ../requests_page/review_req.php");
            } else {
                // Error in deleting from requests table
                echo "Error deleting request: " . $conn->error;
            }
        } else {
            // Error in updating accounts table
            echo "Error updating permission: " . $conn->error;
        }
    } elseif (isset($_POST['deny_button'])) {
        $username = $_POST['username'];

        // Perform the deletion
        $deleteSql = "DELETE FROM requests WHERE username = '$username'";
        if ($conn->query($deleteSql) === TRUE) {
            // Deletion successful
            header("Location: ../requests_page/review_req.php");
        } else {
            // Error in deletion
            echo "Error denying request: " . $conn->error;
        }
    } else {
        // Handle other cases or provide a default behavior
        echo "Invalid request.";
    }
}
