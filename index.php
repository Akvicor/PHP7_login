<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP7 PDO login script</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <center>
      <h1>Log in</h1>
      <br>
      <br>
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
              <input type='submit' value='Log in!' name="btn1"/>
            </td>
          </tr>
        </table>
      </form>
      <?php
        session_start();
        if(isset($_POST['username'], $_POST['password'])){
            require 'connect.php';

            $pass = hash('sha256', $_POST['password']);
            $usr = $_POST['username'];

            $query = dbConnect()->prepare("SELECT username, password FROM users WHERE username=:username AND password=:password");
            $query->bindParam(':username', $usr);
            $query->bindParam(':password', $pass);
            $query->execute();

            $row = $query->fetch();

            if($row['password'] == $pass){
              $_SESSION['username'] = $row['username'];
              header("Location: check.php");
            }
            else {
              echo "Wrong login or password";
            }
        }
      ?>
    </center>
  </body>
</html>
