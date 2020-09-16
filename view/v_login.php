<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sistem Wortel - Login</title>

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/css_header.css" rel="stylesheet">
	<link href="css/css_footer.css" rel="stylesheet">
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
		}

		.back{
			padding: 20px;
			height: 518px;
			background-color: lightgrey;
		}

		.card{
			width: 40%;
			margin-top: 70px;
			padding: 20px;
			background-color: white;
			margin-right: auto;
			margin-left: auto;
			text-align: center;
		}

		.container-fluid{
			overflow: hidden;
		}

		#kolom{
			width: 60%;
			margin-right: auto;
			margin-left: auto;
		}

		#error{
			font-size: 16px;
			color: red;
		}

	</style>
</head>
<body>

	<div class="container-fluid">
	<?php include_once 'layout/header.php'; ?>
		<div class="row">

			<div class="back">
				<div class="card">
					<h3 style="text-align: center;">Login Admin</h3>
					<br>
					<form action="../controller/c_login.php" method="POST" id="kolom">
						<div class="form-group">
							<!-- <label style="text-align: left;">Username</label> -->
							<input class="form-control" type="text" name="username" placeholder="Username">
						</div>
						<br>

						<div class="form-group">
							<!-- <label style="text-align: left;">Password</label> -->
							<input class="form-control" type="password" name="password" placeholder="Password">
						</div>
					
						<?php 
							if (isset($_SESSION["data-kosong"])) {
								echo '<p id="error">'.$_SESSION["data-kosong"].'</p>';
							}
						?>
						<br>
						<div style="text-align: center;">
							<button class="btn btn-primary" type="submit">Log in</button>
						</div>
					</form>
				</div>
			</div>

		</div>

		<?php include_once 'layout/footer.php'; ?>	
		
	</div>

	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
unset($_SESSION["data-kosong"]);
 ?>