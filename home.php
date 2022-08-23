<?php 

    include 'config.php';

    error_reporting(0);

    session_start();

    if (!isset($_SESSION['nickname'])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Home</title>
</head>
<body>
    <!-- <div class="header">
    <h1>Header</h1>
    <!-- <p>My supercool header</p> -->
    <!-- </div> -->
    <button class = "button-1" role="button"
    onclick="location.href = 'home.php';"> HOME </button>


	<div class="container" id="cad_submissao" style="min-width: 400px; min-height: 430px; height: auto; overflow: auto;">
		<p class="login-text" style="font-size: 2rem; font-weight: 800;">Sistemas LPC</p>
        
        
    <div class="login-email">
        <div class="input-group">
        <button name="btnusario" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'home_usuario.php';">Usuario</button>
            <button name="btncontest" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'home_contest.php';">Contest</button>
            <button name="btnexercicios" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'home_exercicio.php';">Exercicios</button>
            <button name="btnest" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'estatistica.php';">Estatisticas</button>
            <a style="margin-top: 15px;"class="logout" href="index.php">Logout</a>
            
        </div>
    </div>

        
	</div>
</body>
</html>

