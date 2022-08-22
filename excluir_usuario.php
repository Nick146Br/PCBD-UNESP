<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['nickname'])) {
    header("Location: index.php");
}
// header("Location: index.php");
if (isset($_POST['sim'])) {
	$nickname = $_SESSION['nickname'];

    $sql = "DELETE FROM usuario WHERE Nickname = '$nickname'";
    // var_dump($sql);
    $result = mysqli_query($conn, $sql);
    
    if ($result){
        header("Location: index.php");
        echo "<script>alert('Voce excluiu sua conta!!')</script>";
    }
    else{
        echo "<script>alert('Woops! Algo deu errao.')</script>";
    }
}
if (isset($_POST['nao'])) {
    header("Location: home.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form - Pure Coding</title>
</head>

<body>
<div class="container" style = "overflow: auto; width: 500px">
<p class="login-text" style="font-size: 2rem; font-weight: 800;">Deseja Excluir o Usuário? </p>
    <form action="" method="POST" class="login-email">
    <div class="input-group" id="excluir">
        <button name="sim" action="" method="POST" class="btn">Sim</button>
        <button name="nao" action="" method="POST" class="btn">Nao</button>
    </div>
    </form>
    <!-- <p class="login-register-text">Não quer excluir o usuário <a href="home.php">Clique aqui</a>.</p> -->

</div>
</body>