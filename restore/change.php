<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Password change</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
    session_start();
    if (!isset($_SESSION['safety'])) {
      die("You can't acces without completed previous parts!");
    }
    else {
      $usr = $_SESSION['view'];
      $mail = $_SESSION['safety'];
      echo "Welcome ".$usr.". Your password will now be changed. Fill in the gaps below and press the button.";
    }
    ?>
    <form action="" method="post">
      <table>
        <tr>
          <td>
            <b>Write your new password:</b>
          </td>
          <td>
            <input type="password" name="pass1">
          </td>
        </tr>
        <tr>
          <td>
            <b>Reapeat it:</b>
          </td>
          <td>
            <input type="password" name="pass2">
          </td>
        </tr>
        <tr>
          <td>
            <input type='submit' value='Change!' name="btn1"/>
          </td>
        </tr>
      </table>
    </form>
    <?php
      require 'connect.php';
      if (isset($_POST['pass1']) && isset($_POST['pass2'])) {

        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $hashed = hash('sha256', $pass1);
        if ($pass1 == $pass2) {
          $sql = dbConnect()->prepare("UPDATE users SET password='$hashed' WHERE mail='$mail'");
          $sql->execute();
          echo "Done! Go to: <a href='/PHP7_login/index.php'>Login page</a> and login with your new password!";
        }
        else {
          echo "Password gaps arent the same. Try again.";
        }
      }
    ?>
  </body>
</html>
