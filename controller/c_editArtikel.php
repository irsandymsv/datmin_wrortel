<?php 
include_once '../model/allModel.php';
session_start();

$artikel = new m_artikel();
if (empty($_GET["id"])) {
	echo "id tak ada";
}
elseif (empty($_POST["judul"]) || empty($_POST["isi"])) {
	$id = $_GET['id'];
	$_SESSION["input-kosong"] = "Harap isi semua data artikel";
	header("location: ../view/v_admEditArtikel.php?id=$id#error");
}
else{
	$thisArtikel = $artikel->getArtikel($_GET["id"]);
	$picture = $thisArtikel->gambar;

	if ($_POST["ubahGambar"] == "diubah") {
		//Mengganti Gambar Lama Artikel
		if (!empty($picture)) {
			unlink($picture); //mengahapus gambar
		}

		$dir = "../storage/";
		$fileType = strtolower(pathinfo(basename($_FILES["picture"]["name"]), PATHINFO_EXTENSION));
		$picture = $dir . "artikel-" . $_GET["id"] . "." . $fileType; //set nama file gambar dg id artikel sebagai akhiran
		$upload = move_uploaded_file($_FILES["picture"]["tmp_name"], $picture); //menyimpan gambar baru
	}
	
	$data = array("id" => $_GET["id"],
					"judul" => strip_tags($_POST["judul"]),
					"isi" => $_POST["isi"],
					"gambar" => $picture
				);

	if ($artikel->editArtikel($data)) {
		$_SESSION["artikel_edit_sukses"] = "<script>alert('Artikel berhasil diubah')</script>";
		header("location: ../view/v_admEditArtikel.php?id=".$_GET["id"]);
	}
	else{
		echo "edit gagal";
	}

	
}

?>