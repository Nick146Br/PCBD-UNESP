<?php

include 'config.php';

session_start();

error_reporting(0);
$nickname = $_SESSION['nickname'];


if (isset($_POST['find'])) {
    $nickname = $_SESSION['nickname'];
    $usuario = $_POST['usuario'];
    $sql = "SELECT nickname, nacionalidade, instituicao_ensino FROM Usuario WHERE nickname like '$usuario%' and nickname <> '$nickname' ";
    
    $result = mysqli_query($conn, $sql);

    if($result->num_rows ==0){
        echo "<script>alert('Nenhum usuario encontrado')</script>";
    }
}

if (isset($_POST['add'])) {
    $nickname = $_SESSION['nickname'];
    $user = $_POST['user'];
    $sql = "SELECT fk_Usuario_Nickname FROM E_Amigo WHERE fk_Usuario_Nickname = '$nickname' and fk_Usuario_Nickname_ = '$user'";
    $result = mysqli_query($conn, $sql);
    
    if($result->num_rows == 0){
        $sql = "INSERT INTO E_Amigo VALUES ('$nickname','$user')";
        $result = mysqli_query($conn, $sql);
        echo "<script> alert('You Follow $user')</script>";
    }else{
        $sql = "DELETE from E_Amigo WHERE fk_Usuario_Nickname = '$nickname' and fk_Usuario_Nickname_ = '$user'";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('You Unfollow $user')</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" type="text/css" href="style.css" />

    <title>Adicionar Amigo</title>


</head>

<body>
    <button class="button-1" role="button" onclick="location.href = 'home.php';"> HOME </button>
    <div class="container" id="cad_submissao" style="min-width: 400px; height: 800px">

        <form action="" method="POST" class="login-email" id="form_submission">

            
            Search:
            <div class="input-group">
                <input type="text" placeholder="Nome do usuario" name="usuario" value="">
            </div>

            <div class="input-group">
                <button name="find">Buscar</button>
            </div>


            <table id="problemas">
                <!-- <tr>
                    <th>Codigo do Contest</th>
                    <th>Tempo de duracao</th>
                    <th>Dificuldade</th>
                    <th>by</th>
                    <th>Register</th>
                </tr> -->
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php
                // LOOP TILL END OF DATA
                while ($rows = $result->fetch_assoc()) { ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH
		ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['nickname']; ?></td>
                        <!-- <td><?php echo $rows['Instituicao_ensino']; ?></td>
                        <td><?php echo $rows['Nacionalidade']; ?></td> -->
                        <td><input type="radio" name="user" value="<?php echo $rows['nickname']; ?>"></td>
                    </tr>
                <?php
                }
                ?>
            </table>

            <div class="input-group">
                <button name="add">Star</button>
            </div>
            
        </form>

    </div>
</body>

</html>