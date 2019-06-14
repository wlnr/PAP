<!DOCTYPE html>
<html lang="pt-pt">

  <head>
    <meta charset="utf-8">
    <title>Registo</title>

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
  width:350px;
  height:400px;
}
legend
{
  font-weight:bold;
  font-family: "Segoe UI","Arial","Times New Roman";
}
    </style>
  </head>
  <body>
    <ul>
      <li><a href="1.inicio.php">Fottball Lovers</a></li>
    </ul>
        <div id='area'>
        <form id='formulario' name="registo" action="2.regista.php"  method="POST">
          <fieldset>
            <legend>Regista-te</legend>
            Username:
             <input type='text' name='username'> <br> <br>
            Posição:
             <select name='posicao'>
                 <option></option>
                 <option value='GR'>Guarda-Redes</option>
                 <option value='Defesa'>Defesa</option>
                 <option value='Medio'>Médio</option>
                 <option value='Avancado'>Avançado</option>
             </select> <br> <br>
            E-mail:
             <input type='text' name='email'> <br><br>
            Password:
             <input type='password' name='password'> <br><br>
            Confirme a Password:
             <input type='password' name='repassword'> <br><br>

             <input type="submit" name="submit" value="Regista-te"> <br><br>
             <input type="reset" value="Limpar"><br><br>
            </fieldset>
        </form>
        </div>
  </body>
</html>

<?php
require("connect.php");

$username = @$_POST['username'];
$posicao = @$_POST['posicao'];
$email = @$_POST['email'];
$password = @$_POST['password'];
$repassword = @$_POST['repassword'];

if(isset($_POST['submit'])) {
  if($username == "") {
    echo "<script> alert('Preencha o username') </script>";
  }
  else if(strlen($username) < 2 && strlen($username) > 25) {
    echo "<script> alert('Username tem de ter entre 3 e 25 caratéres') </script>";
  }
  else if($posicao == "") {
      echo "<script> alert('Selecione uma posição') </script>";
    }
  else if($email == "") {
    echo "<script> alert('Preencha o e-mail') </script>";
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script> alert('Formato e-mail inválido') </script>";
  }
  else if($password == "" && strlen($password) < 8) {
    echo "<script> alert('Preencha a password minímo 8 caratéres') </script>";
  }
  else if($repassword != $password) {
    echo "<script> alert('Repita a password') </script>";
  }
  else if($repassword == $password) {
      if($query =   mysql_query ("INSERT INTO utilizadores
      VALUES ('', '".$username."', '".$posicao."', '".$email."', '".$password."');"))
      {
      echo "<script> alert('Registo Concluído'); window.location.href='3.login.php'; </script>";
    } else {
      echo "<script> alert('Erro ao Registar-se') </script>";
    }
  }
  else {
    return true;
  }
}
?>