<?php

include 'config.php';
session_start();

error_reporting(0);

$nickname = $_SESSION['nickname'];
$tempo_assinatura = $_POST['tempo_assinatura'];

$sql = "SELECT Nickname, Instituicao_Ensino, Pontos from usuario ORDER BY pontos desc";
$result = mysqli_query($conn, $sql);
// var_dump($result);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" type="text/css" href="style.css" />

  <title>Criar Contest</title>


</head>

<body>
  
<button class = "button-1" role="button"
onclick="location.href = 'home.php';"> HOME </button>

  <div class="container" id="cad_submissao" style="min-width: 400px; height: 800px">

    <form action="" method="POST" class="login-email" id="form_submission">
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Leaderboard</p>

      <table id="problemas">
        <tr>
          <th>Nickname</th>
          <th>Faculdade</th>
          <th>Pontuacao</th>
        </tr>
        <!-- PHP CODE TO FETCH DATA FROM ROWS -->
        <?php
        // LOOP TILL END OF DATA
        while ($rows = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $rows['Nickname']; ?></td>
            <td><?php echo $rows['Instituicao_Ensino']; ?></td>
            <td><?php echo $rows['Pontos']; ?></td>
          </tr>
        <?php
        }
        ?>
      </table>
    </form>
  </div>
</body>

</html>