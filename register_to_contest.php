<?php

include 'config.php';

session_start();

error_reporting(0);
$nickname = $_SESSION['nickname'];
$sql = "SELECT Codigo_Contest FROM contest WHERE Codigo_Contest NOT IN (SELECT DISTINCT fk_Contest_Codigo from registra where fk_Usuario_Nickname ='$nickname')";
$result = mysqli_query($conn, $sql);

if (isset($_POST['Registrar'])) {
    $nickname = $_SESSION['nickname'];
    $checkbox1 = $_POST['contest'];
    $chk = "";
    $flag = True;
    // var_dump($checkbox1);
    foreach ($checkbox1 as $chk1) {
        $sql = "INSERT INTO registra VALUES ('$nickname','$chk1')";
        $result = mysqli_query($conn, $sql);
        
        if ($result != 1) {
            echo '<script>alert("Failed To Insert")</script>';
            foreach ($checkbox1 as $chk1) {
                $sql = "DELETE from registra WHERE fk_Contest_Codigo = '$chk1' and fk_Usuario_Nickname = '$nickname'";
                $result = mysqli_query($conn, $sql);
                
            }
            $flag = false;
            break;
        }
    }

    if ($flag == false) {
        echo "<script>alert('Woops! Algo deu errado')</script>";
    } else {
        echo "<script>alert('yay! submissao enviada!')</script>";
        header("Location: register_to_contest.php");
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

    <title>Contest</title>


</head>

<body>
    <div class="container" id="cad_submissao" style="min-width: 400px; height: 800px">

        <form action="" method="POST" class="login-email" id="form_submission">

            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Contests disponíveis</p>

            <div class="input-group">
                <button name="Registrar" class="btn">Registrar em Contest</button>
            </div>


            <table id="problemas">
                <tr>
                    <th>Codigo do Contest</th>
                    <th>Tempo de duracao</th>
                    <th>Dificuldade</th>
                    <th>by</th>
                    <th>Register</th>
                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php
                // LOOP TILL END OF DATA
                while ($rows = $result->fetch_assoc()) { ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH
		ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['Codigo_Contest']; ?></td>
                        <td><?php echo $rows['Tempo_duracao']; ?></td>
                        <td><?php echo $rows['Dificuldade']; ?></td>
                        <td ce><?php echo $rows['fk_Assinante_fk_Usuario_Nickname']; ?></td>
                        <td><input type="checkbox" name="contest[]" value="<?php echo $rows['Codigo_Contest']; ?> "></td>
                    </tr>
                <?php
                }
                ?>
            </table>
               
        </form>
        <div class = "login-email">
            <button name="" class="btn" style="margin-top: 10px;" onclick="location.href = 'unregister_to_contest.php';">Remover</button>
        </div> 
    </div>
</body>

</html>