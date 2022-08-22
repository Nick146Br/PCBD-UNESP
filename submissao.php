<?php 

include 'config.php';

error_reporting(0);

session_start();

if (!isset($_SESSION['nickname'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $date = date_create();
    $timestamp = date_timestamp_get($date);
    $datahora = date('Y-m-d H:i:s', $timestamp);

    $codigoe = $_POST['fk_Exercicio_Codigo'];
	$nickname = $_POST['fk_Usuario_Nickname'];
    $linguagem = $_POST['linguagem'];
    $codigo = $_POST['codigo'];

    $situacao = 'Accepted';
    $te = 0.5;

    $sql = "SELECT * FROM usuario WHERE nickname='$nickname'";
    $result = mysqli_query($conn, $sql);
    // var_dump ($result);

    if($result->num_rows > 0) {
        $sql = "SELECT * FROM exercicio WHERE codigo_exercicio='$codigoe'";
        $result = mysqli_query($conn, $sql);

        if($result->num_rows > 0) {
            $sql = "INSERT INTO SUBMETERESOLUCAO VALUES ('$codigoe', '$nickname', '$datahora', '$linguagem', '$situacao', '$te', '$codigo')";
            
            $result = mysqli_query($conn, $sql);
            // if ($result->num_rows ) {
                echo "<script>alert('yay! submissao enviada!')</script>";
                $codigo = "";
                $nickname = "";
                $linguagem = "";
                $codigo = "";

            // } else {
                // echo "<script>alert('Woops! Algo deu errado')</script>";
            // }
        } else {
            echo "<script>alert('Problema não encontrado!')</script>";
        }

    } else {
        echo "<script>alert('Usuario não encontrado!')</script>";
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

	<title>Submissão de Exercicio</title>
</head>
<body>
<button class = "button-1" role="button"
    onclick="location.href = 'home.php';"> HOME </button>
	<div class="container" id="cad_submissao" style="min-width: 400px; height: 800px;">
		<form action="" method="POST" class="login-email" id="form_submission">

            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Submeter Resolução</p>
			
            <div class="input-group">
				<button name="submit" class="btn">Enviar resposta</button>
			</div>
            
            Exercício
            <div class="input-group">
				<input type="number" placeholder="Numero do exercicio" name="fk_Exercicio_Codigo" value="" required>
			</div>

            Nome
            <div class="input-group">
				<input type="text" placeholder="Nickname do Usuário" name="fk_Usuario_Nickname" value="" required>
			</div>

            Linguagem
			<div class="input-group">
                
				<select name="linguagem" id="linguagem" required>
                    <option value="c">C</option>
                    <option value="c++">C++</option>
                    <option value="java">Java</option>
                    <option value="python">Python</option>
                </select>
			</div>

		</form>
        
        <div class="input-group">
        <textarea rows="10" cols="100" name="codigo" form="form_submission" required></textarea>
        </div>

	</div>
</body>
</html>

