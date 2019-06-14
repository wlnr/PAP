<?php

session_start();
require('connect.php');
if(@$_SESSION["username"]) {

$res = ("SELECT * FROM jogos where id_user=".@$_SESSION["id_user"]);
$resultado = mysql_query($res);
$nr=mysql_num_rows($resultado);

if($nr == 0 ) {
    echo "<script> alert('Não tem jogos programados') </script>";
}
else {
    ?>
    <html>
        <head>
        <title>Meus jogos</title>
        <meta charset="utf-8">
        <style>
             html, body {
        background-image: linear-gradient(45deg, black, white);
        color: white;
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
        </style>
        </head>
        <h1>JOGOS</h1>
    <table border = 1>
    <tr><td>ID DO JOGO</td><td>ID DO UTILIZADOR</td><td>NOME</td>
        <td>TIPO DE JOGO</td><td>LOCALIDADE</td><td>DATA DO JOGO</td>
                <td>HORA DO JOGO</td><td>DURAÇÃO</td></tr>
        <?Php
            while($rows_jogos = mysql_fetch_array($resultado)) {
                echo"<tr>";
                echo "<td>".$rows_jogos['id_jogo']."</td>";
                echo "<td>".$rows_jogos['id_user']."</td>";
                echo "<td>".$rows_jogos['nome']."</td>";
                echo "<td>".$rows_jogos['tipo_jogo']."</td>";
                echo "<td>".$rows_jogos['localizacao']."</td>";
                echo "<td>".$rows_jogos['data_jogo']."</td>";
                echo "<td>".$rows_jogos['hora_jogo']."</td>";
                echo "<td>".$rows_jogos['duracao_jogo']."</td>";
                echo"</tr>";
            }
            ?>
    </table>
    </html>
    <?php
}
?>

<?php

$ser = ("SELECT * FROM torneios where id_user=".@$_SESSION["id_user"]);
$final = mysql_query($ser);
$rn=mysql_num_rows($final);

if($rn == 0 ) {
    echo "<script> alert('Não tem torneios criados') </script>";
}
else {
    ?>
    <html>
        <h1>TORNEIOS</h1>
    <table border = 1>
    <tr><td>ID DO TORNEIO</td><td>ID DO UTILIZADOR</td><td>NOME</td><td>LOCALIDADE</td><td>TIPO DE TORNEIO</td>
                <td>NÚMERO DE EQUIPAS</td><td>DATA DO TORNEIO</td><td>DURAÇÃO DE CADA JOGO</td></tr>
        <?Php
            while($jogos_rows = mysql_fetch_array($final)) {
                echo"<tr>";
                echo "<td>".$jogos_rows['id_torneio']."</td>";
                echo "<td>".$jogos_rows['id_user']."</td>";
                echo "<td>".$jogos_rows['nome']."</td>";
                echo "<td>".$jogos_rows['localizacao']."</td>";
                echo "<td>".$jogos_rows['tipo_torneio']."</td>";
                echo "<td>".$jogos_rows['n_equipas']."</td>";
                echo "<td>".$jogos_rows['data_torneio']."</td>";
                echo "<td>".$jogos_rows['duracao_jogo']."</td>";
                echo"</tr>";
            }
            ?>
    </table>
    </html>
    <?php
}

?>

<br> <br> <br><a href="4.home.php"><input type="button"value="Voltar"></a>

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