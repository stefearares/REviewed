<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <title>REviewed</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./styling_100.css">
<link rel="icon" href="../misc/chat-left-heart.svg">
</head>

<body class="font-monospace">


  <nav class="navbar navbar-default navbar-expand-lg  sticky-top bg-light-subtle border-bottom">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">
        <img src="../misc/chat-left-heart.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        <strong>REviewed</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav navy me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link rounded" href="the100.php">The 100</a>
          </li>
          <li class="nav-item">
            <a class="nav-link rounded" href="../explore_page/explore.php">Explore</a>
          </li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['permission']===0)
            { echo'<li class="nav-item reviewers">';
                echo '<a class="nav-link rounded" href="../what_to_listen_to/whatto.php">What to listen to?</a>';
                echo  '</li>';}
            ?><?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['permission']===0)
            { echo'<li class="nav-item reviewers">';
                echo ' <a class="nav-link rounded" href="../pop_quiz/pop_quiz_page.php">Pop Quiz!</a>';
                echo  '</li>';}
            ?>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['permission']===1)
            { echo'<li class="nav-item reviewers">';
                echo '<a class="nav-link rounded" href="../review_page/review_song.php">Review a song</a>';
                echo  '</li>';}
            ?>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['permission']===1)
            {echo '<li class="nav-item reviewers">';
                echo '<a class="nav-link rounded" href="../requests_page/review_req.php">Review requests</a>';
                echo '</li>';}
            ?>
        </ul>
        <ul class="navbar-nav navy">
            <li>
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<a class="nav-link rounded" href="../profile_page/profile.php" aria-expanded="false">';
                    echo '<img src="../misc/linie.png" class="rounded-circle" height="25" alt="Guest" loading="lazy" />';
                    echo '<span style="margin-left: 5px;">' . $_SESSION['username'] . '</span>';
                    echo '</a>';
                } else {
                    echo '<a class="nav-link rounded" href="../login_page/login.php" aria-expanded="false">';
                    echo '<img src="../misc/linie.png" class="rounded-circle" height="25" alt="Guest" loading="lazy" />';
                    echo '<span style="margin-left: 5px;">Guest</span>';
                    echo '</a>';
                }
                ?>
            </li>
    </ul>
      </div>
    </div>
  </nav>


  <div class="container titlu text-center my-3">

    <h1>
      <kbd> The 100</kbd>
    </h1>
    <div class="separator"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z"/>
    </svg></div>
    <p class="lol">
        Welcome to "The 100," where music meets its ultimate showcase! Immerse yourself in a curated collection of the most extraordinary tunes that transcend boundaries, captivate hearts, and define musical excellence. From timeless classics to cutting-edge masterpieces, our meticulously crafted list of the top 100 songs unveils a sonic journey like no other.    </p>
    <div class="separator"></div>
  </div>

  <div class="container my-4">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php include '../php_scripts/display_songs.php'; ?>
    </div>
  </div>
  




  <div class="container-fluid md-fluid">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-0 px-2 border-top">
        <div class="col-md-4 d-flex align-items-center">
          <a href="../index.php" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
            <svg class="bi" width="30" height="24" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-heart" viewBox="0 0 16 16">
              <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12ZM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2Z"/>
              <path d="M8 3.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
            </svg>
          </a>
          <span class="mb-3 mb-md-0 text-muted"> &copy 2023 // <strong>REviewed</strong></span>
        </div>
    
        <ul class="col-md-4 justify-content-end list-unstyled d-flex">
          <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/"><svg class="bi" width="24" height="24" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
          </svg></a></li>
          <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/"><svg class="bi" width="24" height="24"xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
          </svg></a></li>
          <li class="ms-3"><a class="text-muted" href="https://twitter.com/"><svg class="bi" width="24" height="24" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
          </svg></a></li>
        </ul>
      </footer>
    </div>
  
</body>
</html>