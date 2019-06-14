<!DOCTYPE html>
<html lang="pt-pt">

  <head>
    <title>Login</title>
    <meta charset="utf-8">

    <!-- tipo de letra -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- css -->
    <style>
    html, body {
        background-image: linear-gradient(45deg, black, white);
        color: #8B0000;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
      }

      ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: white;
}

li {
  float: center;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
#area
{
  position: relative;
  left:37%;
  top:10%;
  width:120px;
  height:150px;
}
#area #formulario
{
  display:block;   
}
 
 
fieldset
{
  background-color:grey;
  font-size: 20px;
  width:300px;
  height:200px;
}
</style>
  </head>
  <body>
  <ul>
      <li><a href="1.inicio.php">Fottball Lovers</a></li>
    </ul>
    <div id='area'>
    <form id='formulario' action="3.login.php" method="POST">
    <fieldset>
    <legend>Login</legend>
      Username:
      <input type='text' name='username'> <br> <br>
      Password:
      <input type='password' name='password'> <br><br>

      <input type="submit" name="submit" value="Login"> <br><br>
      <a href="1.inicio.php"><input type="button"value="Voltar"></a><br><br>
</fieldset>
    </form>
    </div>
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