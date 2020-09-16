<?php 
include_once '../model/allModel.php';
session_start();

$model_lahan = new m_lahan();
$id = $_GET["id"];

if (empty($_POST["namaLahan"]) || empty($_POST["ph"]) || empty($_POST["suhu"]) || empty($_POST["tinggi"]) || empty($_POST["air"]) || empty($_POST["tanah"]) || empty($_POST["kelas"])) {
	
	$_SESSION["lahan-kosong"] = "Harap isi semua data lahan";
	
	header("location: ../view/v_admEditLahan.php?id_lahan=$id");
}
else{
	$lahan = array("id" => $id,
					"nama" => $_POST["namaLahan"],
					"ph" => $_POST["ph"],
					"suhu" => $_POST["suhu"],
					"tinggi" => $_POST["tinggi"],
					"air" => $_POST["air"],
					"tanah" => $_POST["tanah"],
					"kelas" => $_POST["kelas"]
				);
	$hasil = $model_lahan->editLahan($lahan);

	if ($hasil) {
		header("location: ../view/v_admLahan.php");
	}
	else{
		echo "gagal input lahan";
	}
}


 ?>