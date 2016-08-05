<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Logout</title>
  </head>
  <body>
    <?php
        session_start();
        $_SESSION = array();
        session_destroy();
        echo("Logout completed. Go back to: <a href='check.php'>Check page</a>");
    ?>
  </body>
</html>
