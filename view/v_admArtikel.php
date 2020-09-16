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

	<title>Artikel Admin</title>
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
			padding: 20px;
			/*background-color: white;*/
		}

		.cari{
			float: left;
			width: 20%;
		}

		.baru{
			float: right;
		}

		.baru a{
			font-size: 16px;
		}

		.daftar{
			margin-top: 70px;
		}

		.daftar table{
			background-color: white;
		}

	</style>
</head>
<body>
	<?php include_once 'layout/logo.php'; ?>
	
	<!-- <div class="atas">
		<div class="logo">
			<a href="../../index.php" ><h4>Sistem Wortel</h4></a>
		</div>
	</div> -->

	<div class="container-fluid">
		<div class="row">
			
			<?php include_once 'layout/admLayout.php'; ?>

			<div class="col-md-10">
				<div class="isi">
					<h2>Daftar Artikel</h2>

					<br>
					<div class="cari-baru">
						<div class="cari">
							<input class="form-control" type="text" id="myInput" placeholder="Cari">
						</div>	

						<div class="baru">
							<a class="btn btn-success" href="v_admBuatArtikel.php" type="button"><span class="glyphicon glyphicon-plus"></span> Buat Baru</a>
						</div>
					</div>
					
					<div class="daftar">
						<table class="table table-striped">
							<tr>
								<th>No</th>
								<th>Judul</th>
								<th>Tanggal Dibuat</th>
								<th>Terakhir Diubah</th>
								<th>Aksi</th>
							</tr>
							<tbody id="body-tab">
								<?php $no = 0;
								foreach ($allArtikel as $key) { 
									$no++;
									$tgl_dibuat = date_create($key->created_at, timezone_open('Asia/Jakarta'));
									$tgl_diubah = date_create($key->updated_at, timezone_open('Asia/Jakarta'));
								?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><a href="v_admEditArtikel.php?id=<?php echo $key->id ?>"><?php echo $key->judul ?></a></td>
										<td><?php echo date_format($tgl_dibuat, "d M Y H:i") ?></td>
										<td>
											<?php if ($key->created_at == $key->updated_at || $key->updated_at == "") {
												echo "-";
											}else{
												echo date_format($tgl_diubah, "d M Y H:i");
											}
											?>
											
										</td>
										<td>
											<!-- <a href="v_admEditArtikel.php?id=<?php echo $key->id ?>" class="btn btn-warning">Edit</a> -->
											<button class="btn btn-danger" type="button" name="delArtikel" id="<?php echo $key->id ?>" data-toggle="modal" data-target="#myModal">Hapus</button>
											
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>	
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
			        
				</div>
			</div>
		</div>
	</div>

	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	      $("#myInput").on("keyup", function() {
	        var value = $(this).val().toLowerCase();
	        $("#body-tab tr").filter(function() {
	          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	        });
	      });
	    });

	    $('button[name="delArtikel"]').click(function(event) {
	    	var id = $(this).attr('id');
	    	$('#hapusArtikel').attr('href', '../controller/c_hapusArtikel.php?id='+id);
	    });
	</script>
</body>
</html>

<?php 
if (isset($_SESSION["sukses_hapus_artikel"])) {
	echo $_SESSION["sukses_hapus_artikel"];
}
unset($_SESSION["sukses_hapus_artikel"]);
 ?>