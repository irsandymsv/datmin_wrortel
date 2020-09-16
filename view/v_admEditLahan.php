<?php 
include_once '../model/allModel.php';
include_once '../controller/c_getLahan.php';
include_once '../controller/c_getPembobotan.php';
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Edit Lahan</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/css_header.css" rel="stylesheet">
	<link href="css/css_footer.css" rel="stylesheet">
	<link href="css/css_admin.css" rel="stylesheet">
	<style type="text/css">
		.isi{
			padding: 50px;
			background-color: white;
		}

		#table_input{
			width: 80%;
			margin-right: auto;
			margin-left: auto;
		}

		#table_input option{
			font-size: 16px;
		}

		.kirim{
			margin-top: 30px;
			text-align: center;
		}

		#error{
			font-size: 16px;
			color: red;
			text-align: center;
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
					<h2>Edit Lahan</h2>
					<br><br>
					<form method="POST" action="../controller/c_EditLahan.php?id=<?php echo $lahan->id ?>">
						<table class="table table-hover" id="table_input">
							<tr>
								<td><label>Nama Lahan</label></td>
								<td>
									<input class="form-control" type="text" name="namaLahan" value="<?php echo $lahan->nama ?>">
								</td>
							</tr>

							<tr>
								<td><label>PH</label></td>
								<td>
									<select class="form-control" name="ph">
										<?php 
										foreach ($ph as $key) {
											if ($key->sub_kriteria == $lahan->ph) { ?>
												<option value="<?php echo $key->sub_kriteria; ?>" selected><?php echo $key->sub_kriteria; ?></option>
											<?php 
											} else { ?>
												<option value="<?php echo $key->sub_kriteria; ?>"><?php echo $key->sub_kriteria; ?></option>
											<?php }
										} ?>
									</select>
								</td>
							</tr>

							<tr>
								<td><label>Suhu (&deg;C)</label></td>
								<td>
									<select class="form-control" name="suhu">
										<?php 
										foreach ($suhu as $key) {
											if ($key->sub_kriteria == $lahan->suhu) { ?>
												<option value="<?php echo $key->sub_kriteria; ?>" selected><?php echo $key->sub_kriteria; ?></option>
											<?php 
											} else { ?>
												<option value="<?php echo $key->sub_kriteria; ?>"><?php echo $key->sub_kriteria; ?></option>
											<?php }
										} ?>
									</select>
								</td>
							</tr>

							<tr>
								<td><label>Ketinggian (mdpl)</label></td>
								<td>
									<select class="form-control" name="tinggi">
										<?php 
										foreach ($ketinggian as $key) {
											if ($key->sub_kriteria == $lahan->ketinggian) { ?>
												<option value="<?php echo $key->sub_kriteria; ?>" selected><?php echo $key->sub_kriteria; ?></option>
											<?php 
											} else { ?>
												<option value="<?php echo $key->sub_kriteria; ?>"><?php echo $key->sub_kriteria; ?></option>
											<?php }
										} ?>
									</select>
								</td>
							</tr>

							<tr>
								<td><label>Sumber Air</label></td>
								<td>
									<select class="form-control" name="air">
										<?php 
										foreach ($air as $key) {
											if ($key->sub_kriteria == $lahan->sumber_air) { ?>
												<option value="<?php echo $key->sub_kriteria; ?>" selected><?php echo $key->sub_kriteria; ?></option>
											<?php 
											} else { ?>
												<option value="<?php echo $key->sub_kriteria; ?>"><?php echo $key->sub_kriteria; ?></option>
											<?php }
										} ?>
									</select>
								</td>
							</tr>

							<tr>
								<td><label>Kondisi Tanah</label></td>
								<td>
									<select class="form-control" name="tanah">
										<?php 
										foreach ($tanah as $key) {
											if ($key->sub_kriteria == $lahan->kondisi_tanah) { ?>
												<option value="<?php echo $key->sub_kriteria; ?>" selected><?php echo $key->sub_kriteria; ?></option>
											<?php 
											} else { ?>
												<option value="<?php echo $key->sub_kriteria; ?>"><?php echo $key->sub_kriteria; ?></option>
											<?php }
										} ?>
									</select>			
								</td>
							</tr>

							<tr>
								<td><label>Kelas</label></td>
								<td>
									<select class="form-control" name="kelas">
										<option value="" <?php echo ($lahan->kelas == "") ? "selected" : "" ; ?> >pilih</option>

										<option value="Cocok" <?php echo ($lahan->kelas == "Cocok") ? "selected" : "" ; ?> >Cocok</option>

										<option value="Tidak Cocok" <?php echo ($lahan->kelas == "Tidak Cocok") ? "selected" : "" ; ?> >Tidak Cocok</option>
									</select>
								</td>
							</tr>

						</table>

						<?php 
							if (isset($_SESSION["lahan-kosong"])) {
								echo '<p id="error">*'.$_SESSION["lahan-kosong"].'*</p>';
							}
						?>

						<div class="kirim">
							<input type="submit" value="Simpan" class="btn btn-success">
							<a href="v_admLahan.php" class="btn btn-danger">Kembali</a>
						</div>
					</form>

				</div>
			</div>

		</div>
	</div>

	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
unset($_SESSION["lahan-kosong"]); 
?>