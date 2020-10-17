<?php 

require 'connection.php';

session_start();

if(!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

$data = mysqli_query($conn, "SELECT * FROM users ORDER BY id ASC");
$jumlah_user = mysqli_num_rows($data);

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>List User</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="fixed-top">
		<div class="container">
			<div class="row">
				<div class="col-10">
					<h5><?= $_SESSION["username"]; ?></h5>
				</div>
				<div class="col-2">
					<a href="logout.php">Logout</a>
				</div>
			</div>
		</div>
	</div>
	<div class="data">
		<div class="container">
			<p>Jumlah User: <?= $jumlah_user; ?></p>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<th>No</th>
						<th>Username</th>
						<th>Password</th>
					</thead>
					<tbody>
					<?php 
						$no = 1;
						while($row = mysqli_fetch_array($data)) {
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $row["username"]; ?></td>
							<td><?= $row["password"]; ?></td>
						</tr>
					<?php

						}

					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>