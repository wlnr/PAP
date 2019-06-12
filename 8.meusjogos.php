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
        <p>JOGOS</p>
    <table border = 1>
        <?Php
            while($rows_jogos = mysql_fetch_array($resultado)) {
                echo"<tr>";
                echo "<td>".$rows_jogos['id_jogo']."</td>";
                echo "<td>".$rows_jogos['id_user']."</td>";
                echo "<td>".$rows_jogos['nome_jogo']."</td>";
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

<a href="4.home.php"><input type="button"value="Voltar"></a>

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