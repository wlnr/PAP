<!DOCTYPE html>
<html lang="pt-pt">

  <head>
    <title>Login</title>
    <meta charset="utf-8">
  </head>
  <body>
    <form action="3.login.php" method="POST">
      Username:
      <input type='text' name='username'> <br> <br>
      Password:
      <input type='password' name='password'> <br><br>

      <input type="submit" name="submit" value="Login"> <br><br>
      <a href="1.inicio.php"><input type="button"value="Voltar"></a><br><br>

    </form>
  </body>
</html>

<?php
session_start();
require("connect.php");

$username = @$_POST['username'];
$password = @$_POST['password'];

if(isset($_POST['submit'])) {
  if($username == "") {
    echo "<script> alert('Preencha o username') </script>";
  }
  else if($password == "") {
    echo "<script> alert('Preencha a password') </script>";
  }
  else if($username && $password) {
    $check = mysql_query("SELECT * FROM utilizadores WHERE username='$username' AND password='$password'");
    while($row= mysql_fetch_array($check)) {
      @$_SESSION["id_user"] = $row["id_user"];
  }
    $rows = mysql_num_rows($check);

    if(mysql_num_rows($check) != 0) {
      @$_SESSION["username"] = $username;
      header("location:4.home.php");
    }
    else {
      echo "<script> alert('Dados inválidos') </script>";
    }
  }
  return true;
}