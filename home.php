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
        
    <div class="login-email">
        <div class="input-group">
            <button name="btnie" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'register_problem.php';">Registrar Exercicio</button>
            <button name="btnee" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'excluir_exercicio.php';">Excluir Exercicio</button>
            <button name="btniu" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'register.php';">Registrar Usuario</button>
            <button name="btnic" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'register_contest.php';">Registrar Contest</button>
            <button name="btnis" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'submissao.php';">Submeter Solucao</button>
            <button name="btnieu" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'excluir_usuario.php';">Excluir Usuario</button>
            <button name="btnial" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'alterar_usuario.php';">Alterar Usuario</button>
            <button name="btniretoco" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'register_to_contest.php';">Registrar em um Contest</button>
            <button name="btnamigo" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'adicionar_amigo.php';">Adicionar Amigos</button>
            <a class="logout" href="index.php">Logout</a>
            
        </div>
    </div>

        
	</div>
</body>
</html>

