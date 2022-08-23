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
    <!-- <div class="header">
    <h1>Header</h1>
    <!-- <p>My supercool header</p> -->
    <!-- </div> -->
    <button class = "button-1" role="button"
    onclick="location.href = 'home.php';"> HOME </button>


	<div class="container" id="cad_submissao" style="min-width: 450px; min-height: 600px; height: auto; overflow: auto;">
		<p class="login-text" style="font-size: 2rem; font-weight: 800;">Sistemas LPC</p>
        
        O que deseja Fazer?<br>
        
    <div class="login-email">
        <div class="input-group">
            <button name="btniretoco" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'register_to_contest.php';">Registrar em um Contest</button>
            
            <button name="btnic" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'register_contest.php';">Criar Contest</button>

            <button name="btnic" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'alterar_contest.php';">Alterar Contest</button>
        
            <button name="btnexccontest" class="btn" style="margin-top: 10px;"
            onclick="location.href = 'delete_contest.php';">Excluir Contest</button>
            <a class="voltar" href="home.php">Voltar</a>
            
        </div>
    </div>

        
	</div>
</body>
</html>

