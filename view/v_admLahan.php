<?php 
include_once '../model/m_artikel.php';
include_once '../controller/c_getLahan.php';
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Daftar Lahan Admin</title>
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

		.daftarLahan{
			margin-top: 50px;
		}

		#tbl-Lahan{
			background-color: white;
		}

		.paginate{
	        text-align: center;
	    }

	    .pagination li a{
	        cursor: pointer;
	    }

	    .hilang{
	        display: none;
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
					<h2>Daftar Lahan</h2>
					<br>

					<div class="cari-baru">
						<div class="cari">
							<input class="form-control" type="text" id="myInput" placeholder="Cari">
						</div>	

						<div class="baru">
							<a class="btn btn-primary" href="v_admAddLahan.php" type="button"><span class="glyphicon glyphicon-plus"></span> Buat Baru</a>
						</div>
					</div>

					<div class="daftarLahan table-responsive">
						<table class="table table-bordered" id="tbl-Lahan">
							<thead style="background-color: black; color: white;">
								<th>No</th>
								<th>nama</th>
								<th>PH</th>
								<th>Suhu</th>
								<th>Ketinggain</th>
								<th>Sumber Air</th>
								<th>Kondisi Tanah</th>
								<th>Kelas</th>
								<th>Aksi</th>
							</thead>
							<tbody id="body-tab">
								<?php 
								$no = 0;
								foreach ($semuaLahan as $key) { 
								$no++;
								?>
									<tr>
										<td><?php echo "$no"; ?></td>
										<td><?php echo "$key->nama"; ?></td>
										<td><?php echo "$key->ph"; ?></td>
										<td><?php echo "$key->suhu"; ?></td>
										<td><?php echo "$key->ketinggian"; ?></td>
										<td><?php echo "$key->sumber_air"; ?></td>
										<td><?php echo "$key->kondisi_tanah"; ?></td>
										<td><?php echo "$key->kelas"; ?></td>
										<td>
											<a href="v_admEditLahan.php?id_lahan=<?php echo $key->id ?>" class="btn btn-warning">Edit</a>
											<button class="btn btn-danger" type="button" name="hapusLahan" id="<?php echo $key->id ?>" data-toggle="modal" data-target="#myModal">Hapus</button>
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
		                    <p>Apakah anda yakin ingin menghapus lahan ini?</p>
		                  </div>

		                  <div class="modal-footer">
		                    <button type="button" class="btn btn-default" data-dismiss="modal" style="padding: 5px 15px;">Tidak</button>
		                    <a href="#" class="btn btn-danger" id="lahanDel" style="padding: 5px 20px;">Ya</a>
		                  </div>
		                </div>
		              </div>
		          	</div>

		          	<div class="paginate">
			            <nav aria-label="Page navigation">
			            	<ul class="pagination">

			            	</ul>
			            </nav>
			        </div>

				</div>
			</div>
		</div>
	</div>

	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
	      $("#myInput").on("keyup", function() {
	        var value = $(this).val().toLowerCase();
	        $("#body-tab tr").filter(function() {
	          // $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	          	if ($(this).text().toLowerCase().indexOf(value) > -1) {
	            	if (value=="") {
	                	$('li').removeAttr('class');
	                	$('li').css("pointer-events","auto");
	                	paginasi(total);
	              	}
	              	else{
	                	$(this).attr('class', 'tampil');
	              	}
	            }
	            else{
	            	$(this).attr('class', 'hilang');
	            	$('li').attr('class', 'disabled');
	            	$('li').css("pointer-events","none");
	            }
	        });
	      });
	    });

	    $('button[name="hapusLahan"]').click(function(event) {
	    	var id = $(this).attr('id');
	    	$('#lahanDel').attr('href', '../controller/c_hapusLahan.php?id='+id);
	    });
	</script>

	<script type="text/javascript">
		//Paginasi
		var total = <?php echo count($semuaLahan) ?>;
		paginasi(total);

		function paginasi(total) {
	      var limit = 10;
	      var jml_page = Math.ceil(total / limit);
	      console.log("jmlh_page= "+jml_page);

	      var gabung = "";
	      for (var i = 1; i <= jml_page; i++) {
	        gabung += '<li><a class="page" id="bt'+i+'">'+i+'</a></li>';
	      }
	      $('.pagination').html(gabung);

	      
	      $('#body-tab tr').attr('class','hilang');
	      for (var i = 1; i <= limit; i++) {
	        $('#body-tab tr:nth-child('+i+')').attr('class','tampil');
	      }

	      $('.pagination li:first-child').attr('class', 'active');

	      $('.page').click(function(event) {
	        var hal = $(this).text();
	        console.log("halaman= "+hal);

	        var offset = (hal-1)*limit;
	        console.log('offset= '+offset);

	        $('li.active').removeAttr('class');
	        $(this).closest( "li" ).attr('class', 'active');

	        $('#body-tab tr').attr('class','hilang');
	        // var newLimit = 0;
	        if ((total-offset) < limit) {
	          // newLimit = total-offset;
	          for (var i = offset+1; i <= total; i++) {
	            $('#body-tab tr:nth-child('+i+')').attr('class','tampil');
	          }
	        }
	        else{
	          for (var i = offset+1; i <= offset+limit; i++) {
	            $('#body-tab tr:nth-child('+i+')').attr('class','tampil');
	          } 
	        }

	      });  
	    }

	</script>

</body>
</html>

<?php 
if (isset($_SESSION["sukses_hapus_lahan"])) {
	echo $_SESSION["sukses_hapus_lahan"];
}
unset($_SESSION["sukses_hapus_lahan"]);

 ?>