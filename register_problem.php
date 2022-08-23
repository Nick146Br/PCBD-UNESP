<?php 

include 'config.php';

error_reporting(0);

session_start();

if (!isset($_SESSION['nickname'])) {
    header("Location: index.php");
}

function  createConfirmationmbox(){
    echo'<script>';
	echo'var userPreference;';
    echo'alert("Seu exercicio foi registrado!!");';
    echo'document.location.href = "home_exercicio.php";';
    echo'</script>';
}

if (isset($_POST['submit'])) {
	
    $Codigo_Exercicio = $_POST['Codigo_Exercicio'];
	$Nome_Exercicio = $_POST['Nome_Exercicio'];
    $Tema = $_POST['Tema'];
    $Enunciado = $_POST['Enunciado'];
    $Dificuldade = $_POST['Dificuldade'];
    $Tags = $_POST['Tags'];

    $sql = "INSERT INTO Exercicio VALUES (DEFAULT, '$Nome_Exercicio', '$Tema', '$Enunciado', '$Dificuldade', '$Tags')";
	// var_dump($sql);
    $result = mysqli_query($conn, $sql);

    if ($result) {
        createConfirmationmbox();
    } else {
        echo "<script>alert('Woops! Algo deu errado')</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css%22%3E" >

    <link rel="stylesheet" type="text/css" href="style.css"> 

    <title>Criar Exercicio</title>
</head>
<body>

    <button class = "button-1" role="button"
    onclick="location.href = 'home.php';"> HOME </button>

    <div class="container" id="cad_submissao" style="min-width: 400px; height: 800px;">
        <form action="" method="POST" class="login-email" id="form_submission">

            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Novo Problema</p>

            <div class="input-group">
                <button name="submit" class="btn">Enviar novo problema</button>
            </div>

            Exercício
            <div class="input-group">
                <input type="text" placeholder="Nome do Exercicio" name="Nome_Exercicio" value="" required>
            </div>

            Tema
            <div class="input-group">
                <input type="text" placeholder="Tema do Exercicio, Ex.: Ad-hoc" name="Tema" value="" required>
            </div>
               
            Dificuldade
            <div class="input-group">
                <input type="number" placeholder="Dificuldade, valores entre 1-5" name="Dificuldade" value=""  min="1" max="5" required>
            </div>

            Tags
            <div class="input-group">
                <input type="text" placeholder="Tags separadas por virgula, ex.: data-structure, DSU, binary-search.." name="Tags" value="" min="1" max="5" required>
            </div>


            Enunciado
            <div class="input-group">
                <textarea rows="8" cols="100" name="Enunciado" form="form_submission" required></textarea>
            </div>  
            
        </form>

    </div>
</body>
</html>