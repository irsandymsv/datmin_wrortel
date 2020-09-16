<?php 
/**
 * 
 */
class lahan 
{
	public $nama;
	public $ph;
	public $suhu;
	public $ketinggian;
	public $sumber_air;
	public $kondisi_tanah;
	public $kelas;

	public $bobot_ph;
	public $bobot_suhu;
	public $bobot_tinggi;
	public $bobot_air;
	public $bobot_tanah;

	public $jarak;


	function __construct($ph, $suhu, $tinggi, $air, $tanah, $kelas)
	{
		$this->ph = $ph;
		$this->suhu = $suhu;
		$this->ketinggian = $tinggi;
		$this->sumber_air = $air;
		$this->kondisi_tanah = $tanah;
		$this->kelas = $kelas;
		$this->jarak = -1;

	}
}
?>