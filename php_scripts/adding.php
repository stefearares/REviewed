<?php
session_start();
require 'dbh.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you are using POST to submit the review form

    // Get the values from the form
    $userId = trim($_SESSION['username']);
    $songId = trim($_POST['song_name']);
    $rating = trim($_POST['btnradio']);

    // Check if the user has already reviewed the same song
    $checkQuery = "SELECT * FROM reviews WHERE reviewer_name = '$userId' AND reviewed_song_title = '$songId'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        // User has already reviewed this song, update the existing review
        $updateQuery = "UPDATE reviews SET grade = $rating WHERE reviewer_name = '$userId' AND reviewed_song_title = '$songId'";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            // Calculate and update the average rating for the song after updating the review
            $avgRatingQuery = "SELECT AVG(grade) AS avg_rating FROM reviews WHERE reviewed_song_title = '$songId'";
            $avgRatingResult = mysqli_query($conn, $avgRatingQuery);

            if ($avgRatingResult && mysqli_num_rows($avgRatingResult) > 0) {
                $rowAvgRating = mysqli_fetch_assoc($avgRatingResult);
                $avgRating = $rowAvgRating['avg_rating'];

                // Update the songs table with the new average rating
                $updateRatingQuery = "UPDATE songs SET rating = $avgRating WHERE song_name = '$songId'";
                $updateRatingResult = mysqli_query($conn, $updateRatingQuery);

                if ($updateRatingResult) {
                    header("Location: ../the100/the100.php"); // Redirect or handle accordingly
                } else {
                    echo "Error updating average rating: " . mysqli_error($conn);
                }
            } else {
                echo "Error calculating average rating: " . mysqli_error($conn);
            }
        } else {
            echo "Error updating review: " . mysqli_error($conn);
        }
    } else {
        // User has not reviewed this song yet, insert a new review
        $insertQuery = "INSERT INTO reviews (reviewer_name, reviewed_song_title, grade) VALUES ('$userId', '$songId', $rating)";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            // Calculate and update the average rating for the song after inserting the new review
            $avgRatingQuery = "SELECT AVG(grade) AS avg_rating FROM reviews WHERE reviewed_song_title = '$songId'";
            $avgRatingResult = mysqli_query($conn, $avgRatingQuery);

            if ($avgRatingResult && mysqli_num_rows($avgRatingResult) > 0) {
                $rowAvgRating = mysqli_fetch_assoc($avgRatingResult);
                $avgRating = $rowAvgRating['avg_rating'];

                // Update the songs table with the new average rating
                $updateRatingQuery = "UPDATE songs SET rating = $avgRating WHERE song_name = '$songId'";
                $updateRatingResult = mysqli_query($conn, $updateRatingQuery);

                if ($updateRatingResult) {
                    header("Location: ../the100/the100.php");
                } else {
                    echo "Error updating average rating: " . mysqli_error($conn);
                }
            } else {
                echo "Error calculating average rating: " . mysqli_error($conn);
            }
        } else {
            echo "Error adding review: " . mysqli_error($conn);
        }
    }

    mysqli_free_result($checkResult);
}

mysqli_close($conn);
?>
