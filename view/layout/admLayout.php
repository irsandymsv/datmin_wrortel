<?php 
$user = $_SESSION["user"];
?>
<div class="col-md-2">
	<div class="user">
		<h3 style="text-align: center;"><?php echo $user->nama ?></h3>
	</div>
	<div class="sidebar">
		<a href="v_admPage.php">Dashboard</a>
		<div style="height: 1px; background-color: grey;"></div>

		<a href="v_admLahan.php">Lahan</a>
		<div style="height: 1px; background-color: grey;"></div>

		<a href="v_admArtikel.php">Artikel</a>
		<div style="height: 1px; background-color: grey;"></div>
		
		<a href="../controller/c_logout.php">logout</a>
		<div style="height: 1px; background-color: grey;"></div>
	</div>
</div>