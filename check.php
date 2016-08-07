<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Check page</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
      error_reporting(0);
      session_start();
      if (isset($_SESSION['username'])) {
        $usr = $_SESSION['username'];
        echo "Welcome ".ucwords($usr).". It works! Now you can <a href='logout.php'>logout to check that it REALLY works</a>";
      }
      else {
        echo "To see it you have to <a href='index.php'>Login</a> or <a href='reg.php'>Register</a>";
      }
      require 'connect.php';
      $query =  dbConnect()->prepare("UPDATE users SET `key` = '' WHERE username = '$usr'");
      $query->execute();
    ?>
  </body>
</html>
