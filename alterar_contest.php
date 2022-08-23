<?php

include 'config.php';

error_reporting(0);

session_start();

$nickname = $_SESSION['nickname'];
  $tempo_assinatura = $_POST['tempo_assinatura'];

  $sql1 = "SELECT fk_Usuario_Nickname from assinante where fk_Usuario_Nickname = '$nickname'";
  $result = mysqli_query($conn, $sql1);
  // var_dump($result);

  if($result->num_rows == 0){
    echo'<script>';
    echo'var userPreference;';
    echo'alert("Precisa ser assinante para alterar um contest !!");';
    echo'document.location.href = "home_contest.php";';
    echo'</script>';
  }
// if (isset($_SESSION['nickname'])) {
//     header("Location: index.php");
// }
// header("Location: index.php");
if (isset($_POST['pesquisar'])) {

    $nickname = $_SESSION['nickname'];
    $codigo = $_POST['Codigo_Contest'];
    // var_dump($codigo);

    $sql = "SELECT * FROM contest WHERE Codigo_Contest = '$codigo' and fk_Assinante_fk_Usuario_Nickname = '$nickname'";
    
    $result = mysqli_query($conn, $sql);
    //var_dump($result);
    if ($result->num_rows > 0) {
        // header("Location: index.php");
        while ($data = $result->fetch_assoc()) {
            $codigo = $data['Codigo_Contest'];
            $Tempo_duracao = $data['Tempo_duracao'];
            $Dificuldade = $data['Dificuldade'];
            $Tempo_penalidade = $data['Tempo_penalidade'];
            $Editorial  = $data['Editorial '];
        }
    } else {
        echo "<script>alert('CONTEST NAO ENCONTRADO')</script>";
    }
}

if (isset($_POST['alterar'])) {
    $codigo = $_POST['cod'];
    $Tempo_duracao = $_POST['Tempo_duracao'];
    $Dificuldade = $_POST['Dificuldade'];
    $Tempo_penalidade = $_POST['Tempo_penalidade'];
    $Editorial  = $_POST['Editorial '];

    $sql = "UPDATE contest SET Tempo_duracao='$Tempo_duracao',Dificuldade='$Dificuldade',Tempo_penalidade='$Tempo_penalidade',Editorial='$Editorial' WHERE Codigo_Contest = $codigo";
    // var_dump($sql);
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Contest $codigo Alterado!')</script>";
    } else {
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

    <title>Alterar Contest</title>

    <style>
        #campo-pesquisa input,
        button {
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

    <button class="button-1" role="button" onclick="location.href = 'home.php';"> HOME </button>

    <div class="container" style="overflow: auto;">
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Alterar contest</p>

        <form action="" method="POST" class="">
            Selecione o Contest
            <div class="input-group" id="campo-pesquisa">
                <input type="number" placeholder="Código do Contest" name="Codigo_Contest" value="" required>
                <button name="pesquisar" action="" method="POST" class="btn">Procurar Contest</button>
            </div>
        </form>

        <div class="login-email">
            <form action="" method="POST" class="">

                <div class="input-group" style="display: none;">
                    <input type="text" name="cod" value="<?php echo $codigo; ?>">
                </div>

                Tempo de Contest
                <div class="input-group">
                    <input type="text" name="Tempo_duracao" value="<?php echo $Tempo_duracao; ?>" >
                </div>

                Dificuldade
                <div class="input-group">
                    <input type="number" placeholder="Dificuldade" name="Dificuldade" value="<?php echo $Dificuldade; ?>" min="1" max="5" >
                </div>

                Tempo de Penalidade
                <div class="input-group">
                    <input type="text" name="Tempo_penalidade" value="<?php echo $Tempo_penalidade; ?>" >
                </div>

                Editorial
                <div class="input-group" style="height:180px;">
                    <textarea rows="8" cols="100" name="Editorial" form="form_submission" readonly><?php echo $Editorial; ?></textarea>
                </div>

                <div class="input-group"> <button name="alterar" class="btn" method="POST">Alterar Contest</button> </div>
            </form>
        </div>

    </div>
</body>