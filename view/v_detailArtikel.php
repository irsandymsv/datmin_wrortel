<?php 
include_once '../model/allModel.php';
include_once '../controller/c_getArtikel.php';
session_start();

$tgl_dibuat = date_create($artikel->created_at, timezone_open('Asia/Jakarta'));
$tgl_diubah = date_create($artikel->updated_at, timezone_open('Asia/Jakarta'));
// var_dump($artikel);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $artikel->judul; ?></title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/css_header.css" rel="stylesheet">
	<link href="css/css_footer.css" rel="stylesheet">
	<style type="text/css">
		.back{
			padding: 20px;
			padding-top: 0;
			min-height: 518px;
			background-color: rgb(230,230,230);
		}

		.konten{
			width: 75%;
			min-height: 490px;
			padding: 30px;
			margin-right: auto;
			margin-left: auto;
			background-color: white;
			overflow: hidden;
		}

		.batas{
			background-color: black;
			height: 2px;
		}

		.isiArtikel{
			padding: 10px;
			font-size: 14px;
			margin-top: 10px;
		}

		.gambarArtikel{
			float: right;
			width: 40%;
			height: 250px;
			padding-left: 10px;
      		margin-bottom: 20px;
		}

		.gambar{
			width: 100%;
		}

	</style>
</head>
<body>

	<div class="container-fluid">

		<?php include_once 'layout/header.php'; ?>

		<div class="row">
			<div class="back">
				
				<div class="konten">
					<h2><?php echo $artikel->judul ?></h2>
					<p>
						<span class="glyphicon glyphicon-user"></span> <?php echo $artikel->penulis; ?> &emsp;
						<span class="glyphicon glyphicon-calendar"></span> <?php echo date_format($tgl_dibuat, "d M Y H:i"); ?>
					</p>

					<div class="batas"></div>

					<div class="isiArtikel">
						<div class="gambarArtikel">
							<img src="<?php echo $artikel->gambar ?>" class="gambar">
						</div>
						<?php echo $artikel->isi; ?>
						<br>
						<p>
							<i>
								<?php if ($artikel->updated_at != $artikel->created_at) {
									echo "Terakhir update ". date_format($tgl_diubah, "d M Y H:i");
								} ?>
							</i>
						</p>
					</div>
					
				</div>

			</div>
		</div>

		<?php include_once 'layout/footer.php'; ?>	

	</div>

	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>