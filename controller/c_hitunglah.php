<?php 
include_once '../model/allModel.php';
session_start();

$lahan_bobot = $_SESSION["lahan_bobot"];

$cekLahan = $_POST["cekLahan"];
$lahanBaru = new lahan($cekLahan[0], $cekLahan[1], $cekLahan[2], $cekLahan[3], $cekLahan[4], "none");

$bobot = new m_pembobotan();
$ph = $bobot->getPh();
$suhu = $bobot->getSuhu();
$ketinggian = $bobot->getKetinggian();
$air = $bobot->getAir();
$tanah  = $bobot->getTanah();

//Pembobotan Lahan Baru
foreach ($ph as $key) {
	if ($lahanBaru->ph == $key->sub_kriteria) {
		$lahanBaru->bobot_ph = $key->bobot;
		break;
	}
}

foreach ($suhu as $key) {
	if ($lahanBaru->suhu == $key->sub_kriteria) {
		$lahanBaru->bobot_suhu = $key->bobot;
		break;
	}
}

foreach ($ketinggian as $key) {
	if ($lahanBaru->ketinggian == $key->sub_kriteria) {
		$lahanBaru->bobot_tinggi = $key->bobot;
		break;
	}
}

foreach ($air as $key) {
	if ($lahanBaru->sumber_air == $key->sub_kriteria) {
		$lahanBaru->bobot_air = $key->bobot;
		break;
	}
}

foreach ($tanah as $key) {
	if ($lahanBaru->kondisi_tanah == $key->sub_kriteria) {
		$lahanBaru->bobot_tanah = $key->bobot;
		break;
	}
}

//Perhitungan Jarak
foreach ($lahan_bobot as $key) {
	$number = pow(($lahanBaru->bobot_ph - $key->bobot_ph), 2) + 
			pow(($lahanBaru->bobot_suhu - $key->bobot_suhu), 2) + 
			pow(($lahanBaru->bobot_tinggi - $key->bobot_tinggi), 2) + 
			pow(($lahanBaru->bobot_air - $key->bobot_air), 2) + 
			pow(($lahanBaru->bobot_tanah - $key->bobot_tanah), 2);
	$key->jarak = sqrt($number);
}

//sorting
function compare_jarak($a, $b)
{
	return ($a->jarak > $b->jarak); //untuk Ascending sort
}
usort($lahan_bobot, 'compare_jarak'); //sorting array obyek lahan

//Penentuan Kelas
$k = 5;
$cocok = 0; $tidak = 0;
$klasifikasi = "";

for ($i=0; $i < $k; $i++) { 
	if ($lahan_bobot[$i]->kelas == "Cocok") {
		$cocok++;
	}
	else{
		$tidak++;
	}
}

if ($cocok > $tidak) {
	$klasifikasi = "Cocok";
}
else{
	$klasifikasi = "Tidak Cocok";
}

// echo "ph=$lahanBaru->bobot_ph"."<br>";
// echo "suhu=$lahanBaru->bobot_suhu"."<br>";
// echo "tinggi=$lahanBaru->bobot_tinggi"."<br>";
// echo "air=$lahanBaru->bobot_air"."<br>";
// echo "tanah=$lahanBaru->bobot_tanah"."<br>";

// echo "cocok=$cocok"."<br>";
// echo "tidak=$tidak";

// foreach ($lahan_bobot as $key) {
// 	echo "$key->nama | $key->jarak | $key->kelas"."<br>";
// }

echo $klasifikasi;

?>