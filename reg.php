<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>
    <form action="" method="post">
      <table>
        <tr>
          <td>
            <b>Username:</b>
          </td>
          <td>
            <input type='text' name='username'/>
          </td>
        </tr>
        <tr>
          <td>
            <b>Password:</b>
          </td>
          <td>
            <input type='password' name='password'/>
          </td>
        </tr>
        <tr>
          <td>
            <input type='submit' value='Register' name="btn1"/>
          </td>
        </tr>
      </table>
      <?php
        session_start();
        if(isset($_POST['username'], $_POST['password'])){
            require 'connect.php';

            $usr = $_POST['username'];
            $pass = hash('sha256', $_POST['password']);

            //Check, if user exists:

            $check = dbConnect()->prepare("SELECT * FROM users");

            $check->bindParam(':username', $usr);
            $check->bindParam(':password', $pass);

            $check->execute();

            $row = $check->fetch();
            if ($row['username'] == $usr) {
              echo "uzytkownik istnieje";
            }
            else {
              //Register:
              $query = dbConnect()->prepare("INSERT INTO `users`(`username`, `password`) VALUES ('$usr', '$pass')");
              $query->execute();

              $_SESSION['username'] = $usr;
              header("Location: check.php");
            }
        }
      ?>
    </form>
  </body>
</html>
