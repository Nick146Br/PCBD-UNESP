<?php

include 'config.php';
session_start();

error_reporting(0);
// $nickname = $_SESSION['nickname'];
$sql = "SELECT fk_Exercicio_Codigo, Nome_Exercicio, count(*) FROM SubmeteResolucao, Exercicio WHERE Codigo_Exercicio = fk_Exercicio_Codigo  GROUP BY fk_Exercicio_Codigo ORDER BY count(*) DESC";
$result = mysqli_query($conn, $sql);

if (isset($_POST['vis'])) {

    $exer = $_POST['exer'];
    $sql = "SELECT count(*) FROM SubmeteResolucao WHERE fk_Exercicio_Codigo = '$exer' and Situacao = 'Accepted'  GROUP BY fk_Exercicio_Codigo";
    // var_dump($sql);
    $result2 = mysqli_query($conn, $sql);

    $sql = "SELECT count(*) FROM SubmeteResolucao WHERE fk_Exercicio_Codigo = '$exer' GROUP BY fk_Exercicio_Codigo";
    $result3 = mysqli_query($conn, $sql);
    
    
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" type="text/css" href="style.css" />

    <title>Profile</title>


</head>

<body>

    <button class="button-1" role="button" onclick="location.href = 'home.php';"> HOME </button>

    <div class="container" id="cad_submissao" style="min-width: 400px; height: 800px">

        <form action="" method="POST" class="login-email" id="form_submission">

            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Info Profile</p>

            <table id="problemas">
                <tr>
                    <th>Codigo Exercicio</th>
                    <th>Nome</th>
                    <th>QTD_Submissao</th>
                    <th>AC/SUB</th>
                    

                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php
                // LOOP TILL END OF DATA
                while ($rows = $result->fetch_assoc()) { ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH
		ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['fk_Exercicio_Codigo']; ?></td>
                        <td><?php echo $rows['Nome_Exercicio']; ?></td>
                        <td><?php echo $rows['count(*)']; ?></td>
                        <td><input type="radio" name="exer" value="<?php echo $rows['fk_Exercicio_Codigo']; ?>"></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div class="input-group">
                <button name="vis">AC/SUB</button>
            </div>
            <?php
            $rows2 = $result2->fetch_assoc();  
            $rows3 = $result3->fetch_assoc();  
             echo $rows2['count(*)']. ' / '. $rows3['count(*)']; ?>
            

        </form>
    </div>
</body>

</html>