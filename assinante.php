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
    echo'alert("Nós Agradecemos Pela Assinatura !!");';
    echo'document.location.href = "home.php";';
    echo'</script>';
}
function  createConfirmationmbox1(){
    echo'<script>';
	echo'var userPreference;';
    echo'alert("Você já é assinante!!");';
    echo'document.location.href = "home.php";';
    echo'</script>';
}
  
  

if (isset($_POST['submit'])) {

	$nickname = $_SESSION['nickname'];
    $tempo_assinatura = $_POST['tempo_assinatura'];

    $sql1 = "SELECT fk_Usuario_Nickname from assinante where fk_Usuario_Nickname = '$nickname'";
    $result = mysqli_query($conn, $sql1);
    // var_dump($result);

    if($result->num_rows > 0){
        createConfirmationmbox1();
    }
    else{
        $sql = "INSERT INTO `assinante`(`tempo_Assinatura`, `fk_Usuario_Nickname`) VALUES ('$tempo_assinatura', '$nickname')";

        $result = mysqli_query($conn, $sql);

        createConfirmationmbox();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Assinatura</title>
</head>

<body>
    <button class = "button-1" role="button"
    onclick="location.href = 'home.php';"> HOME </button>
    <div class="container" style = "overflow: auto; width: 500px, display: flex; min-height: 200px;">
    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Deseja Se Tornar um Assinante? </p>
    <form action="" method="POST" class="login-email">
    <div class="input-group">
        <select name="tempo_assinatura" id="time" required class="select">
            <option value="30">Um Mês</option>
            <option value="60">Dois Meses</option>
            <option value="90">Três Meses</option>
            <option value="120">Quatro Meses</option>
        </select>
    </div>
    <div class="input-group">
        <button name="submit" class="btn">Obter Assinatura</button>
    </div>
    </form>
    <!-- <p class="login-register-text">Não quer excluir o usuário <a href="home.php">Clique aqui</a>.</p> -->

</div>
</body>