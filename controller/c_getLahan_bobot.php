<?php 

$model_lahan = new m_lahan();
if (!isset($_SESSION["lahan_bobot"])) {
	$_SESSION["lahan_bobot"] = $model_lahan->getLahan_bobot();
}

 ?>