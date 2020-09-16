<?php 
include_once '../model/allModel.php';
session_start();

$user = new m_user();
if (empty($_POST["username"]) || empty($_POST["password"])) {
	$_SESSION["data-kosong"] = "Harap isi username dan password";
	header("location: ../view/v_login.php");
}
else{

	$data = array("username" => $_POST["username"],
					"password" => $_POST["password"]
			);

	$orang = $user->getUser($data);	
	// var_dump($admin);
	// exit();
	if (!empty($orang)) {
		$_SESSION["user"] = $orang;
		header("location: ../view/v_admPage.php");
		// echo "login sukses";
		// exit();
	}
	else{
		$_SESSION["salah"] = "Log in gagal, harap periska kembali username dan password";
		header("location: ../view/v_login.php");
	}
}

?>