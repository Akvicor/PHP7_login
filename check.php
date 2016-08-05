<?php
  session_start();
  if (isset($_SESSION['username'])) {
    $usr = $_SESSION['username'];
    echo "Welcome ".ucwords($usr).". It works! Now you can <a href='logout.php'>logout to check that it REALLY works</a>";
  }
  else {
    echo "To see it you have to <a href='index.php'>Login</a> or <a href='reg.php'>Register</a>";
  }
?>
