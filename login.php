<?php 

require 'connection.php';

session_start();

if(isset($_POST["masuk"])) {
	$username = addslashes($_POST["user"]);
	$password = md5(addslashes($_POST["pass"]));
	$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' and password = '$password' "); 
	if(mysqli_num_rows($query) === 1) {
		header("Location: index.php");
		$_SESSION["login"] = true;
		$_SESSION["username"] = $username;
		exit;
	} else {
		$error = true;
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Masuk</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>    
	<div class="box">
		<form method="post">
			<h2>Login</h2>
			<?php if(isset($error)) : ?>
				<p class="alert alert-danger">Username / password salah!</p>
			<?php endif; ?>
			<div class="form-group">
				<input type="text" name="user" placeholder="Username" autocomplete="off" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="password" name="pass" placeholder="Password" autocomplete="off" class="form-control" required>
			</div>
			<div class="form-group">
				<button type="submit" name="masuk">Masuk</button>
			</div>
			<p><a href="register.php">Tidak Mempunyai Akun?</a></p>
		</form>
	</div>
</body>
</html>