<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>
<link rel="stylesheet" type="text/css" href="../view//style.css">
<style>
  .error_message {
    border: 1px solid black;
    width: 20vw;
    height: 10vh;
    text-align: center;
    position: absolute;
    background-color: black;
    color: white;
    padding: 5vw;
  }

  .error_message-container {
    position: absolute;
    transform: translate(35vw, 15vh);
    display: flex;
    z-index: 1;
  }
</style>

<body>

  <?php
  include('./nav-bar.php');
  ?>
  <?php
  $Url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  if (strpos($Url, "user=noUser") !== false) {
    echo "<div class='error_message-container'>
        <div class='error_message'>
            <b>Sorry! We can't seem to find that login credentia in our system</b><br><br>
            <button><a style='color: black;' href='../view/login.php?'>Try Again</a></button>
        </div>
    </div>";
  }

  ?>

  <!-- logo here -->
  <div class="logo-container">
    <img class="logo" src="../image//black logo.png" />
  </div>
  <!-- End of logo here -->

  <div class="login-text-container">
    <p class="login-text">Login to your Account</p>
    <p class="manage-text">Manage Your Farm in One System</p>
  </div>

  <!-- input login -->
  <div class="input-container">
    <form action="../view/user_login.php" method="POST">
      <input class="input-box" type="text" name="username" placeholder="Username" /><br />
      <input class="input-box" type="password" name="password" placeholder="Password" /><br />
  </div>
  <!--Button-->
  <div class="button-container">
    <div class="button-position">
      <button type="submit">Login</button>
      </form>
      <a href="../view/create_ucer.php"><button>Register</button></a>
    </div>
  </div>

  <!-- End of Input login -->
</body>

</html>