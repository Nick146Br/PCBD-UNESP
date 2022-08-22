<?php 

include 'config.php';

session_start();

error_reporting(0);

$sql = "SELECT * FROM exercicio";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" type="text/css" href="style.css" />

    <title>Login Form - Pure Coding</title>

    <style>
      #problemas {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1.2rem;
        color: black;
        border-collapse: collapse;
        width: 100%;
      }

      #problemas td,
      #problemas th {
        border: 2px solid #e7e7e7;
        border-radius: 3px;
        padding: 8px;
      }

      #problemas tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      #problemas tr:hover {
        background-color: #a29bfe;
        color: white;
      }

      #problemas th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #a29bfe;
        color: white;
      }
    </style>
  </head>
  <body>
    <div
      class="container"
      id="cad_submissao"
      style="min-width: 400px; height: 800px"
    >
      <form action="" method="POST" class="login-email" id="form_submission">
        <table id="problemas">
          <tr>
            <th>Codigo do Problema</th>
            <th>Nome do Problema</th>
            <th>Tema</th>
            <th>Dificuldade</th>
            <th>Tags</th>
          </tr>
          <!-- PHP CODE TO FETCH DATA FROM ROWS -->
          <?php
	// LOOP TILL END OF DATA
	while($rows=$result->fetch_assoc()) { ?>
          <tr>
            <!-- FETCHING DATA FROM EACH
		ROW OF EVERY COLUMN -->
            <td><?php echo $rows['Codigo_Exercicio'];?></td>
            <td><?php echo $rows['Nome_Exercicio'];?></td>
            <td><?php echo $rows['Tema'];?></td>
            <td><?php echo $rows['Dificuldade'];?></td>
            <td><?php echo $rows['Tags'];?></td>
          </tr>
          <?php
	}
?>
        </table>
      </form>
    </div>
  </body>
</html>