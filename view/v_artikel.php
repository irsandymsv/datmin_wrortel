<?php 
include_once '../model/allModel.php';
include_once '../controller/c_getArtikel.php';
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Artikel</title>
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
			width: 80%;
			min-height: 490px;
			padding: 30px;
			margin-right: auto;
			margin-left: auto;
			background-color: white;
			overflow: hidden;
			text-align: center;
		}

		.card{
			width: 80%;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			/*padding: 15px;*/
			background-color: #f1f1f1;
			border-left: 5px solid #ff5c33;
			margin-bottom: 20px;
			overflow: hidden;
		}

		.depan{
			float: left;
			width: 80%;
			color: black;
			padding: 5px;
			padding-left: 10px;
			padding-top: 10px;
		}

		.belakang{
			float: left;
			width: 20%;
			padding: 5px;
			text-align: center;
			background-color: grey;
			color: white;
		}

		.bungkus{
			background-color: white;
			padding: 5px;
			margin-bottom: 20px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			color: black;
			padding: 10px;
			overflow: hidden;
		}

		.bungkus:hover{
			box-shadow: none;
			box-shadow: 0 6px 10px 0 rgba(0, 51, 102, 0.5);
			color: rgb(0, 51, 102);
		}

		.gambarArtikel{
			width: 90%
			height: 300px;
			margin-bottom: 10px;
		}

		.gambar{
			width: 100%;
		}

		.garis{
			width: 90%;
			height: 1px;
			margin: auto;
			background-color: grey;
		}

		.judulArtikel{
			margin-top: 10px;
			font-size: 18px;
		}

		.keterangan{
			float: right;
			font-size: 12px;

		}


	</style>
</head>
<body>

	<div class="container-fluid">

		<?php include_once 'layout/header.php'; ?>

		<div class="row">
			<div class="back">
				
				<div class="konten">
					<div class="kepala">
						<H2><b>Artikel Wortel</b></H2>
					</div>
					<br>
					<div class="artikel">
						<?php 
						foreach ($allArtikel as $artikel) {
							$tgl_dibuat = date_create($artikel->created_at, timezone_open('Asia/Jakarta'));
						?>
							<a href="v_detailArtikel.php?id=<?php echo $artikel->id ?>">
								<div class="col-sm-4">
									<div class="bungkus">
										<div class="gambarArtikel">
											<img src="<?php echo $artikel->gambar?>" class="gambar">
										</div>

										<div class="garis"></div>

										<div class="judulArtikel">
											<p><?php echo "$artikel->judul"; ?></p>
										</div>

										<div class="keterangan">
											<span class="glyphicon glyphicon-calendar"></span>	
												<?php $tgl_dibuat = date_create($artikel->created_at, timezone_open('Asia/Jakarta'));
												echo date_format($tgl_dibuat, "d M Y")
												 ?>
											
										</div>
									</div>
								</div>
							</a>
							
						<?php } ?>

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