<?php
session_start();
require('connect.php');

if(@$_SESSION["username"]) {
    echo "Bem-vindo " .$_SESSION["username"];
?>

<html lang="pt-pt">
<head>

  <title>Fottball Lovers</title>
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

.center {
    display: inline-block;
    margin: auto;
    width: 100%;
    padding: 5px;
    text-align: center;
}

li {
    float: left;
    border-right: 1px solid #bbb; 
}

li:last-child {
    border-right: none;
}

li a{
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #4CAF50;
}

</style>
</head>
<body> 
    <div class="center">
        <ul>
            <li><a href="5.criar.php">Criar Jogos</a></li>
            <li><a href="6.torneio.php">Criar Torneios</a></li>
            <li><a href="7.pesquisa.php">Procurar Jogos</a></li>
            <li><a href="8.meusjogos.php">Meus Jogos</a></li>
            <li style="float:right"><a href="3.login.php?action=Logout">Logout</a></li>
            <li style="float:right"><a href="9.minhaconta.php">Minha Conta</a></li>
        </ul>
    </div>
</html>
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