<?php 
include_once '../model/allModel.php';
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buat Artiekl</title>

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/css_header.css" rel="stylesheet">
	<link href="css/css_admin.css" rel="stylesheet">
	<script src="ckeditor/ckeditor.js"></script>
	<style type="text/css">
		.wrapper{
			background-color: white;
			padding: 10px;
		}

		#kolom{
			padding: 30px;
		}

		.btn-upload{
	      /*text-align: center;*/
	    }

		input[type="file"]{
	      position: absolute;
	      width: 1px;
	      height: 1px;
	      padding: 0;
	      margin: -1px;
	      overflow: hidden;
	      clip: rect(0,0,0,0);
	      border: 0;
	    }

	    .uploadIcon{
	      margin-top: 20px;
	      border: 1px solid #ccc;
	      border-radius: 5px;
	      display: inline-block;
	      padding: 6px 12px;
	      cursor: pointer; 
	      background-color: white;
	    }

	    .uploadIcon:hover{
	      background-color: rgb(250,250,250);
	    }

	    .image{
	      /*margin: auto;*/
	      width: 40%;
	      min-height: 150px;
	      border: 2px dashed navy;
	    }

	    #preview{
	    	height: 100%;
	    }

	    #kata{
	      text-align: center; 
	      color: lightgrey; 
	      line-height: 150px;
	    }

	    #tombol{
	    	text-align: center;
	    }

	    #tombol button, #tombol a{
	    	font-size: 16px;
	    	margin-right: 10px;
	    }

	    #error{
	    	text-align: center;
	    	font-size: 17px;
	    	color: red;
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

				<div class="wrapper">
					<br>
					<h2 style="text-align: center;">Buat Artikel baru</h2>
					<!-- <br> -->

					<form action="../controller/c_buatArtikel.php" method="POST" enctype="multipart/form-data" id="kolom">

						<div class="form-group" style="width: 40%;">
			            	<label>Judul Artikel</label>
			            	<input class="form-control" type="text" name="judul" autofocus="autofocus">
			            </div>

						<div class="image">
							<p id="kata"><span class="glyphicon glyphicon-camera"></span> Pilih gambar untuk artikel</p>
	              			<img src="#" id="preview" style="width: 100%;">
						</div>

						<div class="btn-upload">
			              <label for="imgInp" class="uploadIcon"><span class="glyphicon glyphicon-cloud-upload"></span> Pilih Gambar</label>
			              <input type="file" name="picture" accept="image/*" id="imgInp">
			              <!-- <button type="button" class="btn btn-danger" id="del_gambar">Hapus</button> -->
			            </div>
			            <br> 

			            <div class="form-group" >
			            	<label>Isi Artikel</label>
			            	<textarea id="isinya" name="isi" class="form-control" rows="10" cols="5"></textarea>
			            </div>

			            <?php 
			            if (isset($_SESSION["input-kosong"])) {
			            	echo '<p id="error">'.$_SESSION["input-kosong"].'</p>';
			            }
			            ?>

			            <br>
			            <div class="form-inline" id="tombol">
			            	<button class="btn btn-primary" type="submit">Simpan</button>
			            	<a href="v_admArtikel.php" class="btn btn-default">Kembali</a>
			            </div>

					</form>	
				</div>
				
			</div>
		</div>
	</div>

	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		 CKEDITOR.replace( 'isinya', {
		 	height: '400px',
		 });

		function readURL(input) {

	      if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function(e) {
	          $('#preview').show();
	          $('#preview').attr('src', e.target.result);
	          $('#kata').hide();
	        }

	        reader.readAsDataURL(input.files[0]);
	      }
	    }

	    $("#preview").hide();
	    // $("#del_gambar").hide();

	    $("#imgInp").change(function() {
	      readURL(this);
	      // $("#del_gambar").show();
	    });

	    // $("#del_gambar").click(function() {
	    // 	$("#imgInp").val("");
	    // 	$('#preview').hide();
	    // 	$("#kata").show();
	    // 	$(this).hide();
	    // });
	</script>
</body>
</html>
<?php 
unset($_SESSION["input-kosong"]);
 ?>