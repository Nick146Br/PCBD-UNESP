<?php 

include 'config.php';

error_reporting(0);

session_start();


if (isset($_POST['alterar'])) {
    $codigo = $_POST['codigo_exercicio'];
    $sql = "SELECT * from exercicio where Codigo_Exercicio = '$codigo'";
    $result = mysqli_query($conn, $sql);
    // var_dump($result);

    if($result->num_rows > 0){
        $nome_exercicio = $_POST['Nome_Exercicio'];
        $tema = $_POST['Tema'];
        $enunciado = $_POST['Enunciado'];
        $dificuldade = $_POST['Dificuldade'];
        $tags = $_POST['Tags'];
        $sql = "UPDATE exercicio SET Nome_Exercicio='$nome_exercicio',Tema='$tema',Enunciado='$enunciado',Dificuldade='$dificuldade',Tags='$tags' WHERE Codigo_Exercicio = $codigo";
        // var_dump($sql);

        $result = mysqli_query($conn, $sql);
        
        if ($result){
            echo "<script>alert('EXERCICIO $codigo ALTERADO!')</script>";
        }
        else{
            echo "<script>alert('Woops! Algo deu errado.')</script>";
        }
    }
    else{
        echo "<script>alert('O EXERCICIO $codigo NAO EXISTE.')</script>";
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

	<title>Alterar Exercícios</title>

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

<button class = "button-1" role="button"
onclick="location.href = 'home.php';"> HOME </button>

<div class="container" style = "overflow: auto;">
<p class="login-text" style="font-size: 2rem; font-weight: 800;">Alteração de exercícios</p>

    <form action="" method="POST" class="">
    Selecione o Exercicio
    
    </form>

    <div class="login-email">

        <form action="" method="POST" class="">
            
            
            <div class="input-group" id="campo-pesquisa">
                <input type="number" placeholder="Código do exercício" name="codigo_exercicio" value="" required>
                <!-- <button name="pesquisar" action="" method="POST" class="btn">Procurar exercício</button> -->
            </div>    

            Exercício
            <div class="input-group">
                <input type="text" placeholder="Nome do Exercicio" name="Nome_Exercicio" value="<?php echo $nome; ?>">
            </div>

            Tema
            <div class="input-group">
                <input type="text" placeholder="Tema" name="Tema" value="<?php echo $tema; ?>">
            </div>
               
            Dificuldade
            <div class="input-group">
                <input type="number" placeholder="Dificuldade" name="Dificuldade" value="<?php echo $dificuldade; ?>"  min="1" max="5">
            </div>

            Tags
            <div class="input-group">
                <input type="text" placeholder="Tags" name="Tags" value="<?php echo $tags; ?>">
            </div>

            Enunciado
            <div class="input-group" style="height:180px;">
                <textarea rows="8" cols="100" name="Enunciado" form="form_submission"><?php echo $enunciado; ?></textarea>
            </div>

            <div class="input-group"> <button name="alterar" class="btn" method="POST">Alterar Problema</button>  </div>
        </form>
    </div>

</div>
</body>