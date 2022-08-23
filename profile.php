<?php

include 'config.php';
session_start();

error_reporting(0);
$nickname = $_SESSION['nickname'];
$sql = "SELECT * FROM usuario where Nickname = '$nickname'";
$result = mysqli_query($conn, $sql);

$sql = "SELECT distinct fk_Usuario_Nickname_ FROM E_Amigo where fk_Usuario_Nickname  = '$nickname'";
$result2 = mysqli_query($conn, $sql);

$sql = "SELECT distinct fk_Usuario_Nickname FROM E_Amigo where fk_Usuario_Nickname_  = '$nickname'";
$result3 = mysqli_query($conn, $sql);


$sql = "SELECT * FROM SubmeteResolucao  where fk_Usuario_Nickname  = '$nickname'";
$result4 = mysqli_query($conn, $sql);

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
                    <th>Nickname</th>
                    <th>E-mail</th>
                    <th>Idade</th>
                    <th>Nacionalidade</th>
                    <th>Instituicao de Ensino</th>
                    <th>Tamanho_Camiseta</th>
                    <th>CEP</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Cidade</th>

                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php
                // LOOP TILL END OF DATA
                while ($rows = $result->fetch_assoc()) { ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH
		ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['Nickname']; ?></td>
                        <td><?php echo $rows['Email']; ?></td>
                        <td><?php echo $rows['Idade']; ?></td>
                        <td><?php echo $rows['Nacionalidade']; ?></td>
                        <td><?php echo $rows['Instituicao_Ensino']; ?></td>
                        <td><?php echo $rows['Tamanho_Camiseta']; ?></td>
                        <td><?php echo $rows['CEP']; ?></td>
                        <td><?php echo $rows['Rua']; ?></td>
                        <td><?php echo $rows['Bairro']; ?></td>
                        <td><?php echo $rows['Cidade']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>

            <p class="login-text" style="font-size: 2rem; font-weight: 800;">You Follow</p>

            <table id="problemas">
                <tr>
                    <th>Nickname</th>
                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php
                // LOOP TILL END OF DATA
                while ($rows = $result2->fetch_assoc()) { ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH
		ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['fk_Usuario_Nickname_']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>


            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Follow You</p>

            <table id="problemas">
                <tr>
                    <th>Nickname</th>
                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php
                // LOOP TILL END OF DATA
                while ($rows = $result3->fetch_assoc()) { ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH
		ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['fk_Usuario_Nickname']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>

            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Historico de Submissao</p>

            <table id="problemas">
                <tr>
                    <th>Codigo_Exercicio</th>
                    <th>DataHora </th>
                    <th>Linguagem </th>
                    <th>Situacao</th>
                    <th>TempoExecucao </th>

                </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                <?php
                // LOOP TILL END OF DATA
                while ($rows = $result4->fetch_assoc()) { ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH
  ROW OF EVERY COLUMN -->
                        <td><?php echo $rows['fk_Exercicio_Codigo']; ?></td>
                        <td><?php echo $rows['DataHora']; ?></td>
                        <td><?php echo $rows['Linguagem']; ?></td>
                        <td><?php echo $rows['Situacao']; ?></td>
                        <td><?php echo $rows['TempoExecucao']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>


        </form>
    </div>
</body>

</html>