<?php 
include_once '../model/allModel.php';

$bobot = new m_pembobotan();
$ph = $bobot->getPh();
$suhu = $bobot->getSuhu();
$ketinggian = $bobot->getKetinggian();
$air = $bobot->getAir();
$tanah  = $bobot->getTanah();
 ?>