<?php 
	session_start();
	include_once 'model/allModel.php';
	include_once 'controller/c_getSaranArtikel.php';
	include_once 'controller/c_getLahan_bobot.php';

	$bobot = new m_pembobotan();
	$ph = $bobot->getPh();
	$suhu = $bobot->getSuhu();
	$ketinggian = $bobot->getKetinggian();
	$air = $bobot->getAir();
	$tanah  = $bobot->getTanah();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sistem Pendukung Keputusan Pemilihan Lahan untuk Wortel</title>

	<link href="view/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="view/css/css_header.css" rel="stylesheet">
	<link href="view/css/css_footer.css" rel="stylesheet">
	<style>
		body{
			/*padding: 0;*/
			/*margin: 0;*/
			background-color: rgb(240,240,240); 
		}
		

		.container-fluid{
			/*padding: 20px;*/
			background-color: white;
			overflow: hidden;
		}

		.row{
			padding: 0px;
			/*overflow: hidden;*/
		}

		#r0{
			background-image: url('storage/wortel_crop.jpg');
			height: 100%;
			background-size: cover;
			background-position: bottom;
			background-repeat: no-repeat;
			border-bottom: 5px solid lightgrey;
		}

		#r1{
			height: 518px;
		}

		#inputLeft{
			/*background-color: #ffff33;*/
			background-color: #2C7873;
			color: white;
			height: 100%;
		}

		#hasilRight{
			/*background-color: #9933ff;*/
			background-color: #A2C523;
			height: 100%;
		}

		.input{
			padding: 5px;
			
		}

		.list{
			padding: 5px;
		}

		#tbl-input{
			width: 100%;
			margin-right: auto;
			margin-left: auto;
			font-size: 18px;
		}

		#tbl-input td:nth-child(1){
			padding: 0px;
			width: 30%;
		}

		#tbl-input tr td{
			padding: 10px;
		}

		#tbl-input option{
			font-size: 16px;
		}

		.klasifikasi{
			padding: 10px;
			background-color: white;
		}

		#resultAkhir{
			text-align: center;
			font-size: 24px;
		}

	</style>
</head>
<body>

	<div class="container-fluid">

		<!-- <div class="row" id="kepala">
			
			<br>
		</div> -->

		<div class="row" id="r0">
			<div class="judul">
				<h2>DataMining Lahan Wortel</h2>
			</div>

			<div class="navbar">
				<div class="menu">
					<a href="index.php">Home</a>
					<a href="view/v_artikel.php">Artikel</a>
					<?php if (!empty($_SESSION["user"])) {
							echo '<a href="view/v_admPage.php">Dashboard</a>';
						}
						else{
							echo '<a href="view/v_login.php">Login</a>';
						}
					?>
				</div>
			</div>
		</div>

		<div class="row" id="r1">
			<div class="col-md-6" id="inputLeft">
				<div class="input">
					<br><br>
					<p style="font-size: 28px; text-align: center;">Masukkan Data Lahan</p>
					<br>
					<table id="tbl-input">
						<tr>
							<td><label>PH</label></td>
							<td>
								<select class="form-control" name="ph">
									<option value="">pilih</option>
									<?php 
									foreach ($ph as $key) { ?>
										<option value="<?php echo $key->sub_kriteria; ?>"><?php echo $key->sub_kriteria; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>

						<tr>
							<td><label>Suhu (&deg;C)</label></td>
							<td>
								<select class="form-control" name="suhu">
									<option value="">pilih</option>
									<?php 
									foreach ($suhu as $key) { ?>
										<option value="<?php echo $key->sub_kriteria; ?>"><?php echo $key->sub_kriteria; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>

						<tr>
							<td><label>Ketinggian (mdpl)</label></td>
							<td>
								<select class="form-control" name="tinggi">
									<option value="">pilih</option>
									<?php 
									foreach ($ketinggian as $key) { ?>
										<option value="<?php echo $key->sub_kriteria; ?>"><?php echo $key->sub_kriteria; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>

						<tr>
							<td><label>Sumber Air</label></td>
							<td>
								<select class="form-control" name="air">
									<option value="">pilih</option>
									<?php 
									foreach ($air as $key) { ?>
										<option value="<?php echo $key->sub_kriteria; ?>"><?php echo $key->sub_kriteria; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>

						<tr>
							<td><label>Kondisi Tanah</label></td>
							<td>
								<select class="form-control" name="tanah">
									<option value="">pilih</option>
									<?php 
									foreach ($tanah as $key) { ?>
										<option value="<?php echo $key->sub_kriteria; ?>"><?php echo $key->sub_kriteria; ?></option>
									<?php } ?>
								</select>			
							</td>
						</tr>

					</table>
					<br><br>
					<div style="text-align: center;">
						<button class="btn btn-warning" id="btn-result">Tampilkan Hasil</button>
					</div>
				</div>	
			</div>

			<div class="col-md-6 right" id="hasilRight">
				<div class="list">
					<br><br>
					<p style="font-size: 28px; color: white; text-align: center;">Hasil Klasifikasi</p>
					<br>

					<div class="klasifikasi">
						<p id="resultAkhir">
							.....
						</p>
					</div>
					<br>
					<div style="text-align: center;">
						<button class="btn btn-danger" disabled="disabled" id="coba_lagi">Coba lahan lain</button>
					</div>	
				</div>
			</div>
		</div>

		<?php include_once 'view/layout/footer.php'; ?>

	</div>
	
	<script src="view/bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="view/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">

		var lahan="";

		jQuery(document).ready(function($) {
			$('#btn-result').on('click', function(event) {

				var ph = $('select[name="ph"]').val();
				var suhu = $('select[name="suhu"]').val();
				var air = $('select[name="air"]').val();
				var tinggi = $('select[name="tinggi"]').val();
				var tanah = $('select[name="tanah"]').val();

				if (ph == "" || suhu == "" || tinggi == "" || air == "" || tanah == "") {
					alert("Harap isi semua data lahan");
				}
				else{
					lahan = [ph, suhu, tinggi, air, tanah];

					$.ajax({
						url: 'controller/c_hitunglah.php',
						type: 'POST',
						// dataType: 'JSON',
						data: {'cekLahan': lahan},
					})
					.done(function(hasil) {
						console.log("success");
						var kalimat = "Dari hasil perhitungan, lahan tersebut <strong>" +hasil+ "</strong> untuk ditanami wortel";
						$('#resultAkhir').html(kalimat);
						$("button[id='coba_lagi']").removeAttr('disabled');
					})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
						console.log("complete");
					});

				}

				
			});	
		});
		

		$('#coba_lagi').click(function(event) {
			$(this).attr('disabled', 'disabled'); //disable tombol coba lahan lain
			$('#resultAkhir').html("....."); // menghilangkan teks hasil
			$('select').each(function(index, el) {
				$(this).val($(this).find("option[selected]").val() ); //mengosongkan dropdown list
			});
		});
		
		

	</script>
</body>
</html>