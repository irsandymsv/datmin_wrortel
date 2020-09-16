<?php 
include_once '../model/allModel.php';
include_once '../controller/c_getArtikel.php';
include_once '../controller/c_getLahan_bobot.php';
session_start();

$user = $_SESSION["user"];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Dashboard Admin</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/css_header.css" rel="stylesheet">
	<link href="css/css_footer.css" rel="stylesheet">
	<link href="css/css_admin.css" rel="stylesheet">
	<style type="text/css">
		body{
			padding: 0;
			margin: 0;
		}

		.isi{
			padding: 50px;
			background-color: white;
		}

		#pembuka{
			margin-bottom: 20px;
		}

		#sambutan{
			font-size: 18px;
		}

		#tgl_today{
			font-size: 18px;
		}
		
		.batasan{
			height: 1px;
			background-color: black;
			margin-bottom: 30px;
		}

		.col-md-6{
			text-align: center;
			padding: 5px;
		}

		.kotak_dalam{
			border: 2px solid navy;
			padding: 10px;
		}

		.jmlh{
			font-size: 40px;
			margin-top: 20px;
			margin-bottom: 20px;
		}

	</style>
</head>
<body>
	<?php include_once 'layout/logo.php'; ?>
	

	<div class="container-fluid">
		<div class="row">
			
			<?php include_once 'layout/admLayout.php'; ?>

			<div class="col-md-10">
				<div class="isi">

					<div class="row" id="pembuka">
						<div class="col-md-9" id="sambutan">
							<h4>Selamat Datang <?php echo $user->nama; ?></h4>
						</div>

						<div class="col-md-3" id="tgl_today">
							<?php 
							$today = date_create(date("d M Y"), timezone_open('Asia/Jakarta'));
							echo date_format($today, "d M Y ");
							 ?>
						</div>
					</div>

					<div class="batasan"></div>

					<div class="fitur">
						<div class="row">

							<div class="col-md-6">
								<div class="kotak_dalam">
									<h3>Lahan</h3>
									<p class="jmlh">
										<?php echo count($_SESSION["lahan_bobot"]); ?>
									</p>
									<div class="inline">
										<a href="v_admLahan.php" class="btn btn-primary">Lihat Semua</a> &emsp;
										<a href="v_admAddlahan.php" class="btn btn-success">Buat Baru</a>
									</div>	
								</div>
							</div>

							<div class="col-md-6">
								<div class="kotak_dalam">
									<h3>Artikel</h3>
									<p class="jmlh">
										<?php echo count($allArtikel); ?>
									</p>
									<div class="inline">
										<a href="v_admArtikel.php" class="btn btn-primary">Lihat Semua</a> &emsp;
										<a href="v_admBuatArtikel.php" class="btn btn-success">Buat Baru</a>
									</div>	
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>