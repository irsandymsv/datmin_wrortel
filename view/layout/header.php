<!-- <div class="kepala">
	<div class="judul">
		<h3>Sistem Pendukung Keputusan Pemilihan Lahan untuk Penanaman Wortel</h3>
	</div>
	<br>
	<div class="navbar">
		<a href="../index.php">Home</a>
		<a href="#">Artikel</a>
		<a href="../v_login.php">Login</a>
		</ul>
	</div>
</div> -->

<div class="row" id="r0">
	<div class="judul">
		<h2>DataMining Lahan Wortel</h2>
	</div>

	<div class="navbar">
		<div class="menu">
			<a href="../index.php">Home</a>
			<a href="v_artikel.php">Artikel</a>
			<?php if (!empty($_SESSION["user"])) {
					echo '<a href="v_admPage.php">Dashboard</a>';
				}
				else{
					echo '<a href="v_login.php">Login</a>';
				}
			?>
		</div>
	</div>
</div>