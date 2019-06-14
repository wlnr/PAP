<?php
session_start();
require('connect.php');
if(@$_SESSION["username"]) {
?>

<html lang="pt-pt">
<head>
    <title>Criar Jogos</title>
    <meta charset="utf-8">

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
  width:450px;
  height:400px;
}
</style>
</head>
<body>
<ul>
      <li><a href="4.home.php">Fottball Lovers</a></li>
    </ul>
   <div id='area'>
    <form id='formulario' name="criar" action="5.criar.php" method="POST">
        <fieldset>
        <legend>Criar jogos</legend>
        Nome Jogo:
        <input type='text' name='jogo'>  <br> <br>
        Tipo de Jogo:
        <select name='tipojogo'>
             <option></option>
             <option value='futebol'>Futebol</option>
             <option value='futsal'>Futsal</option>
        </select> <br> <br>
        Localização:
        <select name='localizacao'>
             <option></option>
             <option value='almada'>Almada</option>
             <option value='charneca'>Charneca da Caparica</option>
             <option value='costa'>Costa da Caparica</option>
             <option value='monte'>Monte da Caparica</option>
             <option value='sobreda'>Sobreda</option>
        </select> <br> <br>
        Data do Jogo:
        <input type='date' id='date' name='datajogo' min="2019-07-01" max="2020-12-31">  <br> <br>
        Hora de Ínicio:
        <input type='time' id='time' name="hora" min="17:00" max='23:00'> <br> <br>
        Duração do Jogo: <br> 
        <input type='radio' name='duracaojogo' value="45"> 45minutos 
        <input type='radio' name='duracaojogo' value="90"> 90minutos 
        <input type='radio' name='duracaojogo' value="120"> 120minutos <br> <br>

        <input type="submit" name="submit" value="Criar Jogo"> <br><br>
        <input type="reset" value="Limpar"><br><br>
        </fieldset>
    </form>
</div>
</body>
</html>

<?php
require("connect.php");

$jogo = @$_POST['jogo'];
$tipojogo = @$_POST['tipojogo'];
$localizacao = @$_POST['localizacao'];
$datajogo = @$_POST['datajogo'];
$horajogo = @$_POST['hora'];
$duracaojogo = @$_POST['duracaojogo'];

if(isset($_POST['submit'])) {
    if($jogo == "") {
        echo "<script> alert('Insira o Nome do Jogo') </script>";
    }
    else if($tipojogo == "") {
        echo "<script> alert('Indique o Tipo de Jogo') </script>";
      }
    else if($localizacao == "") {
        echo "<script> alert('Indique a Localização') </script>";
      }
    else if($datajogo =="") {
        echo "<script> alert('Indique a Data em que vai realizar-se o jogo') </script>";
    }
    else if($horajogo =="") {
        echo "<script> alert('Indique a Hora em que o jogo começa') </script>";
    }
    else if($duracaojogo =="") {
       if(isset($_POST['duracaojogo'])) {
           return true;
       } else {
           echo " <script> alert('Selecione a duração') </script>";
       }
    }
    else if($query = mysql_query("INSERT INTO jogos VALUES('', ".@$_SESSION["id_user"].", '".$jogo."', '".$tipojogo."', '".$localizacao."', '".$datajogo."', '".$horajogo."', ".$duracaojogo.");")) {
           echo "<script> alert('Jogo Criado'); window.location.href='4.home.php'; </script>";
        }
    return true;
}
?>

<?php

if(@$_GET['action'] == "Logout") {
    session_destroy();
    header("location:1.inicio.php");
}

} else {
    session_destroy();
    echo "tem de estar logado";
}
?>