<html>
<head>
    <title>Procurar</title>
    <meta charset="utf-8">

    <style>
    html, body {
        background-image: linear-gradient(45deg, black, white);
        color: white;
        font-family: 'Nunito', sans-;
        font-weight: 200;serif
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
  height:100px;
}
</style>
</head>
<body>
<ul>
      <li><a href="4.home.php">Fottball Lovers</a></li>
    </ul>
    <div id='area'>
        <fieldset>
            <legend>Procura</legend>
    <form id='formulario' name='procura' action="7.pesquisa.php" method='POST'>
        Jogos <input type='radio' name='procura' value="primeiro">  

        Torneios <input type='radio' name='procura' value="segundo"> <br> <br>
        
        <input type="submit" name="submit" value="Procurar"> <br><br>
</fieldset>
    </form>
    </div>
</body>
</html>

<?php
session_start();
require('connect.php');
if(@$_SESSION["username"]) {

$radioVal = $_POST['procura'];

if(isset($_POST['submit'])) {
    if($radioVal =="") { 
    echo "<script> alert('Indique o que deseja') </script>";

}

if($radioVal == "primeiro") {

    $res = ("SELECT nome, tipo_jogo, localizacao, data_jogo, hora_jogo, duracao_jogo FROM jogos");
    $resultado = mysql_query($res);
    $nr=mysql_num_rows($resultado);

    if($nr == 0 ) {
        echo "<script> alert('Não há jogos programados') </script>";
    } 

    else { 
    ?>
        <html>
            <h1>JOGOS</h1>
            <table border=1>
                <tr><td>NOME</td> <td>TIPO DE JOGO</td><td>LOCALIDADE</td><td>DATA DO JOGO</td>
                <td>HORA DO JOGO</td><td>DURAÇÃO</td></tr>
                <?php
                    while($rows_jogos = mysql_fetch_array($resultado)) {
                        echo"<tr>";
                        echo "<td>".$rows_jogos['nome']."</td>";
                        echo "<td>".$rows_jogos['tipo_jogo']."</td>";
                        echo "<td>".$rows_jogos['localizacao']."</td>";
                        echo "<td>".$rows_jogos['data_jogo']."</td>";
                        echo "<td>".$rows_jogos['hora_jogo']."</td>";
                        echo "<td>".$rows_jogos['duracao_jogo']."</td>";
                    }
                ?>
            </table>
        </html>
    <?php
    }

}

else if ($radioVal == "segundo") {

    $fim = ("SELECT nome, localizacao, tipo_torneio, n_equipas, data_torneio, duracao_jogo FROM torneios");
    $final = mysql_query($fim);
    $rn=mysql_num_rows($final);

    if($rn ==0) {

        echo "<script> alert('Não há torneioscprogamados') </script>";
    }

    else {
        ?>
            <html>
                <h1>TORNEIOS</h1>
                <table border=1>
                <tr><td>NOME</td><td>LOCALIDADE</td><td>TIPO DE TORNEIO</td>
                <td>NÚMERO DE EQUIPAS</td><td>DATA DO TORNEIO</td><td>DURAÇÃO DE CADA JOGO</td></tr>
                    <?php
                        while($rows_torneios = mysql_fetch_array($final)) {
                            echo "<tr>";
                            echo "<td>".$rows_torneios['nome']."</td>";
                            echo "<td>".$rows_torneios['localizacao']."</td>";
                            echo "<td>".$rows_torneios['tipo_torneio']."</td>";
                            echo "<td>".$rows_torneios['n_equipas']."</td>";
                            echo "<td>".$rows_torneios['data_torneio']."</td>";
                            echo "<td>".$rows_torneios['duracao_jogo']."</td>";
                        }
                    ?>
                </table>
            </html>
        <?php
    }
}
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