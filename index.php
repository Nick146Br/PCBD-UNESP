<?php 

// Gatilho Exemplo
// CREATE TRIGGER after_members_insert
// AFTER INSERT
// ON members FOR EACH ROW
// BEGIN
//     IF NEW.birthDate IS NULL THEN
//         INSERT INTO reminders(memberId, message)
//         VALUES(new.id,CONCAT('Hi ', NEW.name, ', please update your date of birth.'));
//     END IF;
// END$$


include 'config.php';

session_start();

error_reporting(0);

// if (isset($_SESSION['nickname'])) {
//     header("Location: home.php");
// }

if (isset($_POST['submit'])) {
	$nickname = $_POST['nickname'];
	$senha = md5($_POST['senha']);

	$sql = "SELECT * FROM usuario WHERE nickname='$nickname' AND senha='$senha'";
	// var_dump($sql);
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		echo "<script>alert('Wiiii! Nickname e Senha estao corretos.')</script>";
		// $row = mysqli_fetch_assoc($result);
		$_SESSION['nickname'] = $nickname;
		header("Location: home.php");
	} else {
		echo "<script>alert('Woops! Nickname e/ou Senha estao incorretos.')</script>";
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

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="username" placeholder="NickName" name="nickname" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Senha" name="senha" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>