<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['permission'] === 1) {
    if (isset($_POST['song_id'])) {
        // Connect to your database
        require 'dbh.php'; // Make sure to replace 'db_connection.php' with your actual database connection file

        // Sanitize the input to prevent SQL injection
        $song_id = mysqli_real_escape_string($conn, $_POST['song_id']);

        // Perform the delete operation
        $sql = "DELETE FROM songs WHERE id = $song_id";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../the100/the100.php");
        } else {
            echo "Error deleting song: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        echo "Song ID not provided.";
    }
}
?>