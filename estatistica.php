<?php

include 'config.php';
session_start();

error_reporting(0);
$nickname = $_SESSION['nickname'];


if (isset($_POST['find'])) {
    $table_select = $_POST['table_select'];
    $sql = "SELECT table_name FROM information_schema.tables WHERE table_type='BASE TABLE' AND table_name LIKE '$table_select'";
    // var_dump($sql);
    // $sql = "SELECT * FROM $table_select";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows == 0) {
        echo "<script>alert('Nada encontrado')</script>";   
    }else{
        $sql = "SELECT * FROM $table_select";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows == 0) {
            echo "<script>alert('Nada encontrado')</script>";   
        }else{
        
        }
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

    <title>Profile</title>


</head>

<body>

    <button class="button-1" role="button" onclick="location.href = 'home.php';"> HOME </button>

    <div class="container" id="cad_submissao" style="min-width: 400px; height: 800px; overflow: auto;">

        <form action="" method="POST" class="login-email" id="form_submission">

            Search:
            <div class="input-group">
                <input type="text" placeholder="Tabela desejada" name="table_select" value="">
            </div>

            <div class="input-group">
                <button name="find">Buscar</button>
            </div>
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Info <?php echo $table_select?></p>
            <table id="problemas">
                <?php while ($data = $result->fetch_assoc()) {
                    foreach ($data as $key => $var) {
                        echo  $key . ' = ' . $var . '<br />';
                    }
                    echo '<hr />';
                } ?>

            </table>

        </form>
    </div>
</body>

</html>