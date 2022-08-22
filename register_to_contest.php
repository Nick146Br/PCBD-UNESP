<?php

include 'config.php';

session_start();

error_reporting(0);

$sql = "SELECT * FROM constest";
$result = mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {
  $nickname = $_SESSION['nickname'];
  $Tempo_duracao = $_POST['Tempo_duracao'];
  $Tempo_penalidade = $_POST['Tempo_penalidade'];
  $Editorial = "aqui";
  $Dificuldade = $_POST['Dificuldade'];


  $sql = "INSERT INTO contest VALUES (DEFAULT, '$Tempo_duracao', '$Dificuldade', '$Tempo_penalidade', '$Editorial', '$nickname')";

  $result = mysqli_query($conn, $sql);

  $id = $conn->insert_id;

  if ($result) {
    var_dump($id);
    $checkbox1 = $_POST['problem'];
    $chk = "";
    $flag = True;
    foreach ($checkbox1 as $chk1) {
      $sql = "INSERT INTO possui VALUES ('$chk1', '$id')";
      $result = mysqli_query($conn, $sql);

      if ($result != 1) {
        echo '<script>alert("Failed To Insert")</script>';
        foreach ($checkbox1 as $chk1) {
          $sql = "DELETE from possui WHERE fk_Exercicio_Codigo = '$chk1' and fk_Contest_Codigo = '$id'";
          $result = mysqli_query($conn, $sql);
        }

        $sql = "DELETE from contest WHERE Codigo_Contest = '$id'";
        $result = mysqli_query($conn, $sql);
        $flag = false;

        break;
      }
    }

    if ($flag == false) {
      echo "<script>alert('Woops! Algo deu errado')</script>";
    } else {
      echo "<script>alert('yay! submissao enviada!')</script>";
      // header("Location: home.php");
    }
  } else {
    echo "<script>alert('Woops! Algo deu errado')</script>";
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

  <title>Submissão de Exercicio</title>


</head>

<body>
  <div class="container" id="cad_submissao" style="min-width: 400px; height: 800px">

    <form action="" method="POST" class="login-email" id="form_submission">

      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Contest</p>

      <div class="input-group">
        <button name="Registrar" class="btn">Criar Contest</button>
      </div>

      
      <table id="problemas">
        <tr>
          <th>Codigo do Contest</th>
          <th>Tempo de duracao</th>
          <th>Dificuldade</th>
          <th>by</th>
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
            <td><?php echo $rows['Dificuldade ']; ?></td>
            <td><?php echo $rows['fk_Assinante_fk_Usuario_Nickname']; ?></td>
            <td><input type="checkbox" name="contest[]" value="<?php echo $rows['Codigo_Exercicio']; ?> "></td>
          </tr>
        <?php
        }
        ?>
      </table>
    </form>
  </div>
</body>

</html>