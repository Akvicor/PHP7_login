<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Password restore</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <br>
    <br>
    <form action="" method="post">
      <table>
        <tr>
          <td>
            <b>Write your email here:</b>
          </td>
          <td>
            <input type="text" name="mail">
          </td>
        </tr>
        <tr>
          <td>
            <input type='submit' value='Restore!' name="btn1"/>
          </td>
        </tr>
      </table>
    </form>
    <?php
    if(isset($_POST['mail'])){
        require 'connect.php';

        $mail = $_POST['mail'];
        $subject="Password restore";
        $length = 20;
        $key = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        //Check if email exists or not and show a message.
        $check = dbConnect()->prepare("SELECT * FROM users");
        $check->execute();
        //Fetching mail
        $row = $check->fetch();
        if ($row['mail'] == $mail) {
          //If exisits adds key to its row
          $query =  dbConnect()->prepare("UPDATE users SET `key` = '$key' WHERE mail = '$mail'");
          if ($query->execute() == TRUE) {
            mail($mail, $subject, $key);
            header("Location: check.php");
          }
          else {
            echo "Something went wrong.";
          }
        }
        else {
          //If not gives a message.
          echo "That mail doesnt exisits";
        }

    }
    ?>
  </body>
</html>
