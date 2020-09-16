<?php 
include_once '../model/allModel.php';
session_start();

if (empty($_GET["id"])) {
	header("location: ../view/v_admArtikel.php");
}

$art = new m_artikel();
$id = $_GET["id"];
$artikel = $art->getArtikel($id);

if (!empty($artikel->gambar)) {
	unlink($artikel->gambar); //mengahpus gambar
}

if ($art->hapusArtikel($id)) {
	$_SESSION["sukses_hapus_artikel"] = "<script>alert('Artikel berhasil dihapus')</script>";
	header("location: ../view/v_admArtikel.php");
}
else{
	echo "hapus gagal";
}

?>