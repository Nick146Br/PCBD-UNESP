<?php

include 'config.php';

session_start();

error_reporting(0);

$sql = "SELECT * FROM exercicio";
$result = mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {

  $Codigo_Exercicio = $_POST['Codigo_Exercicio'];
  $Nome_Exercicio = $_POST['Nome_Exercicio'];
  $Tema = $_POST['Tema'];
  $Enunciado = $_POST['Enunciado'];
  $Dificuldade = $_POST['Dificuldade'];
  $Tags = $_POST['Tags'];

  $sql = "INSERT INTO contest VALUES (DEFAULT, '$Nome_Exercicio', '$Tema', '$Enunciado', '$Dificuldade', '$Tags')";
  // var_dump($sql);
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "<script>alert('yay! submissao enviada!')</script>";
    header("Location: home.php");
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
            <td><input type="checkbox" name="problem[]" value= "<?php echo $rows['Codigo_Exercicio']; ?> "></td>
          </tr>
        <?php
        }
        ?>
      </table>
    </form>
    <?php
    if (isset($_POST['submit'])) {
      // $host = "localhost"; //host name  
      // $username = "root"; //database username  
      // $word = ""; //database word  
      // $db_name = "sub_db"; //database name  
      // $tbl_name = "request_quote"; //table name  
      // $con = mysqli_connect("$host", "$username", "$word", "$db_name") or die("cannot connect"); //connection string  
      
      $checkbox1 = $_POST['problem'];
      $chk = "";
      foreach ($checkbox1 as $chk1) {
        $chk .= $chk1 . ",";
      }

      $in_ch = mysqli_query($con, "insert into request_quote(technology) values ('$chk')");
      if ($in_ch == 1) {
        echo '<script>alert("Inserted Successfully")</script>';
      } else {
        echo '<script>alert("Failed To Insert")</script>';
      }
    }
    ?>


  </div>
</body>

</html>