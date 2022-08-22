<?php 
// ini_set ('display_errors', 1);

include 'config.php';

error_reporting(0);

session_start();

// if (isset($_SESSION['nickname'])) {
//     header("Location: index.php");
// }

if (isset($_POST['submit'])) {
	$nickname = $_POST['nickname'];
	$email = $_POST['email'];
	$idade = $_POST['idade'];
	$nacionalidade = $_POST['nacionalidade'];
	$instituicao = $_POST['instituicao'];
	$tamanho_camiseta = $_POST['tamanho_camiseta'];
	$cep = $_POST['cep'];
	$rua = $_POST['rua'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$senha = md5($_POST['senha']);
	$csenha = md5($_POST['csenha']);

	if ($senha == $csenha) {

		$sql = "SELECT * FROM usuario WHERE Nickname='$nickname'";
		$result = mysqli_query($conn, $sql);
		
		// var_dump($result);
		if ($result->num_rows == 0) {
			// echo "<script>alert('Wow! User Registration Incompleted.')</script>";

			$cep = preg_replace("/[^0-9]/", "", $cep);
			$sql = "INSERT INTO `usuario`(`Nickname`, `Email`, `Idade`, `Nacionalidade`, `Instituicao_Ensino`, `Tamanho_Camiseta`, `CEP`, `Rua`, `Bairro`, `Cidade`, `senha`) VALUES ('$nickname', '$email', '$idade' ,'$nacionalidade', '$instituicao', '$tamanho_camiseta', '$cep', '$rua', '$bairro', '$cidade', '$senha')";
			// var_dump($sql);
			$result = mysqli_query($conn, $sql);
			// var_dump($result);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				// header("Location: index.php");
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! NickName already exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form - Pure Coding</title>
</head>
<body>
<button class = "button-1" role="button"
    onclick="location.href = 'home.php';"> HOME </button>
	<div class="container" style = "overflow: auto; height: 600px; width: 500px">
		<form action="" method="POST" class="login-email">
			
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Nickname" name="nickname" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="senha" value="<?php echo $_POST['senha']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="csenha" value="<?php echo $_POST['csenha']; ?>" required>
			</div>
			<div class="input-group">
				<input type="number" placeholder="Idade" name="idade" value="" required>
			</div>
			<div class="input-group">
				<select name="nacionalidade" id="Nacionalidade" required>
                    <option value="BRA">Brasil</option>
                    <option value="EUA">EUA</option>
                    <option value="CHN">China</option>
                    <option value="JPN">Japão</option>
                    <option value="SWE">Suécia</option>
                </select>
			</div>
			<div class="input-group">
				<input type="text" placeholder="CEP" name="cep"  required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Cidade" name="cidade"  required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Bairro" name="bairro" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Rua" name="rua" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Instituição de Ensino" name="instituicao" required>
			</div>
			<div class="input-group">
				<select name="tamanho_camiseta" id="camiseta" required>
                    <option value="P">Pequena</option>
                    <option value="M">Média</option>
                    <option value="G">Grande</option>
                    <option value="GG">Extra Grande</option>
                </select>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
			</div>
		</form>
	</div>
</body>
</html>