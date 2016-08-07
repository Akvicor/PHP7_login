<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Key check</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <b>Here write the code, that you got in email.</b>
    <form action="" method="post">
      <table>
        <tr>
          <td>
            Here:
          </td>
          <td>
            <input type="text" name="key">
          </td>
        </tr>
        <tr>
          <td>
            <input type='submit' value='Check!' name="btn1"/>
          </td>
        </tr>
      </table>
    </form>
    <?php
    session_start();
    error_reporting(0);
    $key = $_POST['key'];
    if (isset($_POST['key'])) {
      require 'connect.php';

      $check = dbConnect()->prepare("SELECT * FROM users");
      $check->execute();

      $row = $check->fetch();
      $mail = $row['mail'];
      $usr = $row['username'];
      if ($row['key'] == $key) {
        echo "Done!";
        $_SESSION['safety'] = $mail;
        $_SESSION['view'] = $usr;
        header("Location: change.php");
      }
      else {
        echo "Bad key, try again!";
      }
    }
    ?>
  </body>
</html>
