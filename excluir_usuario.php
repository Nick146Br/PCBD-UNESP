<?php 

include 'config.php';

error_reporting(0);

session_start();
  

// if (isset($_SESSION['nickname'])) {
//     header("Location: index.php");
// }
// header("Location: index.php");

function  createConfirmationmbox(){
    echo'<script>';
	echo'var userPreference;';
    echo'alert("Usuario Excluido!!");';
    echo'document.location.href = "index.php";';
    echo'</script>';
}
  

if (isset($_POST['sim'])) {

	$nickname = $_SESSION['nickname'];

    $sql = "DELETE FROM usuario WHERE Nickname = '$nickname'";

    
    $result = mysqli_query($conn, $sql);
    if($result){
        createConfirmationmbox();
    }
    else header("Location: home.php");
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

	<title>Excluir Usuario</title>
</head>

<body>
<button class = "button-1" role="button"
    onclick="location.href = 'home.php';"> HOME </button>
<div class="container" style = "overflow: auto; width: 500px, display: flex">
<p class="login-text" style="font-size: 2rem; font-weight: 800;">Deseja Excluir o Usuário? </p>
    <form action="" method="POST" class="login-email">
    <div class="input-group" id="excluir">
        <button name="sim" action="" method="POST" class="btn" style = "margin-top: 10px;">Sim</button>
        <button name="nao" action="" method="POST" class="btn" style = "margin-top: 10px;">Nao</button>
    </div>
    </form>
    <!-- <p class="login-register-text">Não quer excluir o usuário <a href="home.php">Clique aqui</a>.</p> -->

</div>
</body>