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
  height:430px;
}
</style>
</head>
<body>
<ul>
      <li><a href="4.home.php">Fottball Lovers</a></li>
    </ul>
    <div id='area'>
        <fieldset>
            <legend>Criar torneios</legend>
    <form id='formulario' name="criatorneio" action="6.torneio.php" method="POST">
        Nome do torneio:
        <input type='text' name='torneio'> <br> <br>
        Localização:
        <select name='torneiolocal'>
             <option></option>
             <option value='almada'>Almada</option>
             <option value='charneca'>Charneca da Caparica</option>
             <option value='costa'>Costa da Caparica</option>
             <option value='monte'>Monte da Caparica</option>
             <option value='sobreda'>Sobreda</option>
        </select> <br> <br>
        Tipo de torneio:
        <select name='tipotorneio'>
             <option></option>
             <option value='eliminar'>Eliminações</option>
             <option value='grupos_eliminar'>Grupos e Eliminações</option>
        </select> <br> <br>
        Número de equipas:
        <select name='nequipas'>
             <option></option>
             <option value='4'>4</option>
             <option value='8'>8</option>
             <option value='16'>16</option>
             <option value='32'>32</option>
        </select> <br> <br>
        Duração de cada jogo: <br> 
        <input type='radio' name='duracaojogo' value="15"> 15minutos <br>
        <input type='radio' name='duracaojogo' value="20"> 20minutos <br>
        <input type='radio' name='duracaojogo' value="30"> 30minutos <br> <br>
        Data de inicio:
        <input type='date' id='date' name='datatorneio' min="2019-07-01" max="2020-12-31">  <br> <br>

        <input type="submit" name="submit" value="Criar Torneio"> <br><br>
        <input type="reset" value="Limpar"><br><br>
</fieldset>
     </form>
    </div>
</body>
</html>

<?php
require("connect.php");

$torneio = @$_POST['torneio'];
$torneiolocal = @$_POST['torneiolocal'];
$tipotorneio = @$_POST['tipotorneio'];
$nequipas = @$_POST['nequipas'];
$duracaojogo = @$_POST['duracaojogo'];
$datatorneio = @$_POST['datatorneio'];

if(isset($_POST['submit'])) {
    if($torneio == "") {
        echo "<script> alert('Insira o Nome do Torneio') </script>";
    }
    else if($torneiolocal == "") {
        echo "<script> alert('Indique a Localização') </script>";
      }
    else if($tipotorneio == "") {
        echo "<script> alert('Indique o Tipo de Jogo') </script>";
      }
      else if($nequipas == "") {
        echo "<script> alert('Indique o Número de Equipas') </script>";
      }
      else if($datatorneio =="") {
        echo "<script> alert('Indique a Data em que começa o Torneio') </script>";
    }
    else if($duracaojogo =="") {
        if(isset($_POST['duracaojogo'])) {
            return true;
        } else {
            echo "<script> alert('Selecione a duração') </script>";
        }
    }
    else if($query = mysql_query("INSERT INTO torneios VALUES('', ".@$_SESSION["id_user"].", '".$torneio."', '".$torneiolocal."', '".$tipotorneio."', '".$nequipas."', '".$datatorneio."', '".$duracaojogo."');")) {
        echo "<script> alert('Torneio criado com sucesso') </script>";
    }
    else {
        echo "<script> alert('Torneio não criado'); window.location.href='4.home.php'; </script>";
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