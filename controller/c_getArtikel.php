<?php 

$art = new m_artikel();
if (isset($_GET["id"])) {
	$id_artikel = $_GET["id"];

	$artikel = $art->getArtikel($id_artikel);
	if (empty($artikel)) {
		echo "data artikel tidak ada";
	}
}
else{
	$allArtikel = $art->getAllArtikel();
}

?>