<?php
require '../php_scripts/dbh.php';

// SQL query to retrieve the first 100 songs based on the rating column
$sql = "SELECT * FROM songs ORDER BY rating DESC LIMIT 100";
$result = mysqli_query($conn, $sql);

// Check if there are results
if ($result && mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        // Display song information
        echo '<div class="col">
                <div class="card shadow-sm">
                    <img src="' . $row["song_cover"] . '" class="card-img-top img-fluid rounded" style="width: 500px; height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h4 class="card-title text-center"><kbd>' . $row["song_name"] . '</kbd></h4>
                        <h6 class="card-subtitle text-center text-muted"><i>By ' . $row["author"] . '</i></h6>
                        <p class="card-text py-1">' . $row["summary"] . '</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="../song_page/song_page.php?id=' . $row["id"] . '">
                                <button type="button" class="btn btn-outline-dark">View</button>
                            </a>
                            <small>' . $row["rating"] . '/5
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="40" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                            </small>
                        </div>
                    </div>
                </div>
            </div>';
    }
} else {
    echo "0 results";
}

// Close the result set
mysqli_free_result($result);

// Close the database connection
mysqli_close($conn);
?>
