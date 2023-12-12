<?php
require '../php_scripts/dbh.php';

// Check if the connection was successful
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the checkbox is set
    if (isset($_POST['invalidCheck2'])) {
        $username = mysqli_real_escape_string($conn, $_POST['Username']);
        $songName = mysqli_real_escape_string($conn, $_POST['SongName']);
        $author = mysqli_real_escape_string($conn, $_POST['Author']);
        $albumName = mysqli_real_escape_string($conn, $_POST['AlbumName']);
        $summary = mysqli_real_escape_string($conn, $_POST['Summary']);
        $detailedDescription = mysqli_real_escape_string($conn, $_POST['Description']);
        $releaseDate = mysqli_real_escape_string($conn, $_POST['data']);
        $songLink = mysqli_real_escape_string($conn, $_POST['SongLink']);

        if (isset($_FILES['photo'])) {
            $file_name = $_FILES['photo']['name'];
            $file_temp = $_FILES['photo']['tmp_name'];
            $file_type = $_FILES['photo']['type'];
            $upload_dir = "../uploads/"; // Adjust the directory as needed

            // Create the uploads directory if it doesn't exist
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // Move the uploaded file to the desired directory
            if (move_uploaded_file($file_temp, $upload_dir . $file_name)) {
                // Use prepared statements to prevent SQL injection
                $sql = "INSERT INTO songs (song_name, author, album, summary, description, `release`, song_cover, song_link, username) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = mysqli_prepare($conn, $sql);

                // Declare a new variable to hold the value of $upload_dir . $file_name
                $file_path = $upload_dir . $file_name;

                mysqli_stmt_bind_param($stmt, "sssssssss", $songName, $author, $albumName, $summary, $detailedDescription, $releaseDate, $file_path, $songLink, $username);

                if (mysqli_stmt_execute($stmt)) {
                    require './send_mail.php';
                    header("Location: ../index.php?success=true");
                }
                } else {
                    echo "Error adding record: " . mysqli_stmt_error($stmt);
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "Error uploading file.";
            }
        }
    }


// Close the database connection
mysqli_close($conn);
?>
