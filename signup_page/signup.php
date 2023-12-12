<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>REviewed</title>
  <link rel="stylesheet" href="./signup_page.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../misc/chat-left-heart.svg">

</head>
<body>
<div class="wrap">
  <form class="login-form"action="./register.php" onsubmit="return validateForm()" method="post"  name="myForm">
    <div class="form-header">
      <h3>REviewed</h3>
      <p>Create an account!</p>
    </div>
    <div class="form-group">
      <input type="text" class="form-input" placeholder="Username" required onkeyup="valUser()" id="username" name="username">
      <span id="username-error"> </span>
    </div>
    <div class="form-group">
        <input type="text" class="form-input" placeholder="Email" required onkeyup="valEmail()" id="email" name="email">
        <span id="email-error"> </span>
      </div>
    <div class="form-group">
      <input type="password" class="form-input" id="input" placeholder="Password" required onkeyup="valPassword()" name="password">
      <span id="password-error"></span>
    </div>
    <div class="form-group">
      <input type="password" class="form-input" placeholder="Confirm Password" required id="passconfrim"  name="pwd-repeat">
      <span id="confirm"></span>
    </div>
    <label class="container">
      <input type="checkbox" checked id="hide_show" onclick="myFunction()">
      <img class="img-checked"  src="../misc/eye_closed.png" width="20px">
      <img class="img-unchecked"    src="../misc/eye_open.png"   width="20px">
      Show Password
    </label>
    <div class="form-group">
      <button class="form-button" type="submit" name="signup-submit">Sign Up</button>
    </div>
    <div class="form-footer">
      Already have an account? <a href="../login_page/login.php"><strong>Login!</strong></a>
        <?php
        if (isset($_SESSION['errorMessage'])){
            header("Location: ../index.php");
        }
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "passwordcheck") {
                echo '<p class="error">The passwords do not match!</p>';
            }
            if ($_GET['error'] == "usertaken") {
                echo '<p class="error">Username is already taken!</p>';
            }


        } ?>
    </div>
  </form>
</div>
</body>
<script>
  function myFunction() {
    var x = document.getElementById("input");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  function valUser()
  {
    var erorruser=document.getElementById("username-error");
    var username=document.getElementById("username").value;
    var usernamecolor=document.getElementById("username");
    var i,check;
    check=0
    for(i=0;i<username.length;i++) {
      if ((username[i] >= 'A' && username[i] <= 'Z') || (username[i] >= 'a' && username[i] <= 'z') ||  (username[i] >= '0' && username[i] <= '9'))
        check = 0;
      else
      {
        check=1;
        break;
      }
    }
    if(check===1) {
      erorruser.innerHTML = "Username can only contain letters and numbers.";
      usernamecolor.style.borderColor="red";
    }
      else {
        usernamecolor.style.borderColor="initial";
        erorruser.innerHTML = '';

      }
    }
    function valPassword(){
      var show=document.getElementById("password-error")
      var pass=document.getElementById("input").value;
      var passbox=document.getElementById("input");
      check=0
      for(i=0;i<pass.length;i++) {
        if ((pass[i] >= 'A' && pass[i] <= 'Z') || (pass[i] >= 'a' && pass[i] <= 'z') ||  (pass[i] >= '0' && pass[i] <= '9'))
          check = 0;
        else
        {
          check=1;
          break;
        }
      }
      if(check===1) {
        show.innerHTML = "Password can only contain letters and numbers.";
        passbox.style.borderColor="red";
      }
      else {
        passbox.style.borderColor="initial";
        show.innerHTML = '';

      }
  }
  function validateForm(){
      var username=document.getElementById("username").value;
      var pass=document.getElementById("input").value;

      var i,check;
      for(i=0;i<pass.length;i++) {
          if ((pass[i] >= 'A' && pass[i] <= 'Z') || (pass[i] >= 'a' && pass[i] <= 'z') ||  (pass[i] >= '0' && pass[i] <= '9'))
              check = 0;
          else
          {   check=1;
              return false;
          }
      }
      for(i=0;i<username.length;i++) {
          if ((username[i] >= 'A' && username[i] <= 'Z') || (username[i] >= 'a' && username[i] <= 'z') ||  (username[i] >= '0' && username[i] <= '9'))
              check = 0;
          else
          {   check=1;
              return false;
          }
      }
      if(check===1) {
          return false;
      }
      else{
          return true;
      }
  }

</script>
</html>