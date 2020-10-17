<?php 

require 'connection.php';

if(isset($_POST["daftar"])) {
	$username = htmlspecialchars($_POST["user"]);
	$password = md5(htmlspecialchars($_POST["pass"]));
	$pass_repeat = md5(htmlspecialchars($_POST["pass_repeat"]));
	$user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");
	$check_user = mysqli_num_rows($user);
	if($check_user > 1) {
		echo "<script>alert('Username telah ada sebelumnya!');document.location='register.php';</script>";
			exit;
	} else {
		if(strlen($username) > 18) {
			echo "<script>alert('Username maximal 18 character');document.location='register.php';</script>";
			exit;
		} else if($password !== $pass_repeat) {
			echo "<script>alert('Password yang anda masukkan tidak sama');document.location='register.php';</script>";
			exit;
		} else {
			$query = mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password') ");
			echo "<script>alert('Akun berhasil dibuat!');document.location='login.php';</script>";

		}
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>    
	<div class="box">
		<form method="post">
			<h2>Register</h2>
			<div class="form-group">
				<input type="text" name="user" placeholder="Username" autocomplete="off" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="password" name="pass" placeholder="Password" autocomplete="off" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="password" name="pass_repeat" placeholder="Ulangi Password" autocomplete="off" class="form-control" required>
			</div>
			<div class="form-group">
				<button type="submit" name="daftar">Daftar</button>
			</div>
			<p><a href="login.php">Sudah Mempunyai Akun?</a></p>
		</form>
	</div>
</body>
</html>