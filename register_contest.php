<?php

include 'config.php';

session_start();

error_reporting(0);

$sql = "SELECT * FROM exercicio";
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
  
<button class = "button-1" role="button"
onclick="location.href = 'home.php';"> HOME </button>

  <div class="container" id="cad_submissao" style="min-width: 400px; height: 800px">

    <form action="" method="POST" class="login-email" id="form_submission">

      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Contest</p>

      <div class="input-group">
        <button name="submit" class="btn">Criar Contest</button>
      </div>

      Tempo de Contest
      <div class="input-group">
        <input type="text" placeholder="Ex.:5.0 (5 horas)" name="Tempo_duracao" value="" required>
      </div>

      Dificuldade
      <div class="input-group">
        <input type="number" placeholder="Dificuldade, valores entre 1-5" name="Dificuldade" value="" min="1" max="5" required>
      </div>

      Tempo penalidade

      <div class="input-group">
        <input type="text" placeholder="Ex.:0.20 (20minutos)" name="Tempo_penalidade" value="" required>
      </div>

      <table id="problemas">
        <tr>
          <th>Codigo do Problema</th>
          <th>Nome do Problema</th>
          <th>Tema</th>
          <th>Dificuldade</th>
          <th>Tags</th>
          <th>Adicionar</th>
        </tr>
        <!-- PHP CODE TO FETCH DATA FROM ROWS -->
        <?php
        // LOOP TILL END OF DATA
        while ($rows = $result->fetch_assoc()) { ?>
          <tr>
            <!-- FETCHING DATA FROM EACH
		ROW OF EVERY COLUMN -->
            <td><?php echo $rows['Codigo_Exercicio']; ?></td>
            <td><?php echo $rows['Nome_Exercicio']; ?></td>
            <td><?php echo $rows['Tema']; ?></td>
            <td><?php echo $rows['Dificuldade']; ?></td>
            <td><?php echo $rows['Tags']; ?></td>
            <td><input type="checkbox" name="problem[]" value="<?php echo $rows['Codigo_Exercicio']; ?> "></td>
          </tr>
        <?php
        }
        ?>
      </table>
    </form>
  </div>
</body>

</html>