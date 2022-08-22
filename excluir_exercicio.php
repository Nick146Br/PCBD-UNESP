<?php 

include 'config.php';

error_reporting(0);

session_start();

// if (isset($_SESSION['nickname'])) {
//     header("Location: index.php");
// }
// header("Location: index.php");
if (isset($_POST['pesquisar'])) {

	$nickname = $_SESSION['nickname'];
    $codigo = $_POST['codigo_exercicio'];

    $sql = "SELECT * FROM exercicio WHERE Codigo_Exercicio = '$codigo'";
    //var_dump($sql);
    $result = mysqli_query($conn, $sql);
    //var_dump($result);
    if ($result->num_rows > 0){
        // header("Location: index.php");
        while ($data = $result->fetch_assoc()) {
            $codigo = $data['Codigo_Exercicio'];
            $nome = $data['Nome_Exercicio'];
            $tema = $data['Tema'];
            $dificuldade = $data['Dificuldade'];
            $enunciado = $data['Enunciado'];
            $tags = $data['Tags'];
        }
    }
    else{
        echo "<script>alert('PROBLEMA NAO ENCONTRADO')</script>";
    }
}

if (isset($_POST['excluir'])) {
    $codigo = $_POST['cod'];

    $sql = "DELETE FROM exercicio WHERE Codigo_Exercicio = '$codigo'";
    // var_dump($sql);
    $result = mysqli_query($conn, $sql);
    
    if ($result){
        echo "<script>alert('Exercício $codigo excluido!')</script>";
    }
    else{
        echo "<script>alert('Woops! Algo deu errao.')</script>";
    }

    //echo "<script>alert('$codigo')</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Excluir Exercício</title>

    <style>
        #campo-pesquisa input, button {
            border: 2px solid #e7e7e7;
            padding: 10px 15px;
            font-size: 1rem;
            border-radius: 30px;
            background: transparent;
            outline: none;
            transition: .3s;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
<div class="container" style = "overflow: auto;">
<p class="login-text" style="font-size: 2rem; font-weight: 800;">Remoção de exercícios</p>

    <form action="" method="POST" class="">
    Selecione o Exercicio
    <div class="input-group" id="campo-pesquisa">
        <input type="number" placeholder="Código do exercício" name="codigo_exercicio" value="" required>
        <button name="pesquisar" action="" method="POST" class="btn">Procurar exercício</button>
    </div>
    </form>

    <div class="login-email">
        <form action="" method="POST" class="">
            
            <div class="input-group" style="display: none;">
                <input type="text" name="cod" value="<?php echo $codigo; ?>" readonly>
            </div>    

            Exercício
            <div class="input-group">
                <input type="text" placeholder="Nome do Exercicio" name="Nome_Exercicio" value="<?php echo $nome; ?>" readonly>
            </div>

            Tema
            <div class="input-group">
                <input type="text" placeholder="Tema" name="Tema" value="<?php echo $tema; ?>" readonly>
            </div>
               
            Dificuldade
            <div class="input-group">
                <input type="number" placeholder="Dificuldade" name="Dificuldade" value="<?php echo $dificuldade; ?>"  min="1" max="5" readonly>
            </div>

            Tags
            <div class="input-group">
                <input type="text" placeholder="Tags" name="Tags" value="<?php echo $tags; ?>" readonly>
            </div>

            Enunciado
            <div class="input-group" style="height:180px;">
                <textarea rows="8" cols="100" name="Enunciado" form="form_submission" readonly><?php echo $enunciado; ?></textarea>
            </div>

            <div class="input-group"> <button name="excluir" class="btn" method="POST">Excluir Problema</button>  </div>
        </form>
    </div>

</div>
</body>