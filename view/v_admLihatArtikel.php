<?php 
include_once '../model/m_artikel.php';
include_once '../controller/c_getArtikel.php';

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Artikel - <?php echo $artikel->judul; ?></title>

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/css_header.css" rel="stylesheet">
	<link href="css/css_admin.css" rel="stylesheet">
	<style type="text/css">
		.wrapper{
			padding: 35px;
			background-color: white;
			overflow: hidden; 
			color: black;
		}

		.judul{
			float: left;
			margin-left: 0px;
		}

		#edit-hapus{
			float: right;
		}

		.isi{
			/*float: left;*/
			
		}
	</style>
</head>
<body>
	<?php include_once 'layout/logo.php'; ?>
	
	<div class="container-fluid">
		<div class="row">
			
			<?php include_once 'layout/admLayout.php'; ?>

			<div class="col-md-10">
				
				<div class="wrapper">
					
					<div class="atasan">
						<div class="judul">
							<h3><?php echo $artikel->judul; ?></h3>
							<p style="font-size:15px; color: black;">
								<?php 
									$tgl_dibuat = date_create($artikel->created_at, timezone_open('Asia/Jakarta'));
									echo date_format($tgl_dibuat, "d M Y H:i");
								?>
							</p>	
						</div>

						<div class="form-inline" id="edit-hapus">
							<a href="v_admEditArtikel.php?id=<?php echo $artikel->id ?>" class="btn btn-warning" type="button">Edit</a>
							<button class="btn btn-danger" type="button" name="delArtikel" id="<?php echo $artikel->id ?>" data-toggle="modal" data-target="#myModal">Hapus</button>
						</div>						
					</div>

					<div id="myModal" class="modal fade" role="dialog">
		              <div class="modal-dialog">
		                <div class="modal-content">
		                  <div class="modal-header">
		                    <button type="button" class="close" data-dismiss="modal">&times;</button>
		                    <h4 class="modal-title">Konfirmasi</h4>
		                  </div>

		                  <div class="modal-body">
		                    <p>Apakah anda yakin ingin menghapus Artikel ini?</p>
		                  </div>

		                  <div class="modal-footer">
		                    <button type="button" class="btn btn-default" data-dismiss="modal" style="padding: 5px 15px;">Tidak</button>
		                    <a href="#" class="btn btn-danger" id="hapusArtikel" style="padding: 5px 20px;">Ya</a>
		                  </div>
		                </div>
		              </div>
		          	</div>

		          	<br>
					<div class="isi">
						<p><?php echo $artikel->isi; ?></p>

						<br>
						<?php
							if ($artikel->updated_at != "" && $artikel->updated_at != $artikel->created_at) {
								$tgl_diubah = date_create($artikel->updated_at, timezone_open('Asia/Jakarta'));
								echo "Terakhir diubah: ".date_format($tgl_diubah, "d M Y H:i");
							}
						?>
					</div>

				</div>

			</div>

		</div>
	</div>

	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('button[name="delArtikel"]').click(function(event) {
	    	var id = $(this).attr('id');
	    	$('#hapusArtikel').attr('href', '../controller/c_hapusArtikel.php?id='+id);
	    });
	</script>
</body>
</html>