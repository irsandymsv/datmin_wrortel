<?php 
$model_lahan = new m_lahan();
if (isset($_GET["id_lahan"])) {
	$lahan = $model_lahan->getLahan($_GET["id_lahan"]);
}
else{
	$semuaLahan = $model_lahan->getSemuaLahan();
}

 ?>