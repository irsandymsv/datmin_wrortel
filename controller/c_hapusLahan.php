<?php 
include_once '../model/allModel.php';
session_start();

$model_lahan = new m_lahan();
$id = $_GET["id"];

if ($model_lahan->hapusLahan($id)) {
	$_SESSION["sukses_hapus_lahan"] = "<script>alert('Lahan berhasil dihapus')</script>";
	header("location: ../view/v_admLahan.php");
}
else{
	echo "hapus gagal";
}



 ?>