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

	<title>Submissão de Exercicio</title>
</head>
<body>
	<div class="container" id="cad_submissao" style="min-width: 400px; height: 800px;">
		<p class="login-text" style="font-size: 2rem; font-weight: 800;">Sistemas LPC</p>
        
        O que deseja Fazer?<br>

        <div class="input-group">
            <button name="btnie" class="btn"
            onclick="location.href = 'register_problem.php';">Registrar Exercicio</button>
        </div>

        <div class="input-group">
            <button name="btniu" class="btn"
            onclick="location.href = 'register.php';">Registrar Usuario</button>
        </div>

        <div class="input-group">
            <button name="btnic" class="btn"
            onclick="location.href = 'register_contest.php';">Registrar Contest</button>
        </div>

        <div class="input-group">
            <button name="btnis" class="btn"
            onclick="location.href = 'submissao.php';">Submeer Solucao</button>
        </div>

        <div class="input-group">
            <button name="btnieu" class="btn"
            onclick="location.href = 'excluir_usuario.php';">Excluir Usuario</button>
        </div>

        <div class="input-group">
            <button name="btnial" class="btn"
            onclick="location.href = 'alterar_usuario.php';">Alterar Usuario</button>
        </div>

	</div>
</body>
</html>

