<?php
session_start();
require('connect.php');
if(@$_SESSION["username"]) {
?>

<html>
<head>


</head>
<body>

<?php

$check = mysql_query("SELECT * FROM utilizadores WHERE username='".$_SESSION['username']."'");
$rows = mysql_num_rows($check);
while($row = mysql_fetch_assoc($check)) {
    $id  = $row['id_user'];
    $username = $row['username'];
    $posicao  = $row['posicao'];
    $email  = $row['email'];
    $password  = $row['password'];
    $prof_pic = $row['profile_pic'];
}

?>
<?php echo "<img src='prof_pic' width='70' height='70'" ; ?> <br /> <br />
id: <?php echo $id; ?> <br />
username: <?php echo $username; ?> <br /> 
posicao: <?php echo $posicao; ?> <br />
email: <?php echo $email; ?> <br />
password: <?php echo $password; ?> <br /> <br />

<a href='9.minhaconta.php?action=cp'>mudar dados</a> <br> <br>

<a href="4.home.php"><input type='button' value='Voltar'></a> <br> <br>

</body>
</html>

<?php
if(@$_GET['action'] == "cp") {
    echo"<center> <p> Alterações </p> </center>";
?>
<html>

    <form name=atualizar action='9.minhaconta.php?action=cp' method='POST'>
        Nova password:
        <input type='password' name='nova'> <br><br>
        Confirme a Password:
        <input type='password' name='novac'> <br><br>

        <input type="submit" name="atualizar" value="Atualizar">
    </form>

</html>

<?php 
    
    $nova = @$_POST['nova'];
    $novac = @$_POST['novac'];

    if(isset($_POST['atualizar'])) {
        if($nova == "" ) {
            echo "<script> alert('Preencha a password minímo 8 caratéres') </script>";
            return false;
        } 
        if(strlen($nova) < 8) {
            echo "<script> alert('Preencha a password minímo 8 caratéres') </script>";
            return false;
        }
        if($novac != $nova) {
            echo "<script> alert('Passwords não são iguais') </script>";
        } else {
            $query=mysql_query("UPDATE utilizadores SET password='".$nova."' WHERE username='".$_SESSION['username']."' ") ;
            echo "<script> alert('Dados atualizados'); window.location.href='9.minhaconta.php'; </script>";
            
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