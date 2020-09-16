<?php 

include_once 'allModel.php';
/**
 * 
 */
class m_lahan extends koneksi
{
	
	public function addLahan($lahan)
	{
		$query = "INSERT INTO lahan (nama, ph, suhu, ketinggian, sumber_air, kondisi_tanah, kelas) VALUES (?, ?, ?, ?, ?, ?, ?)";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->bindParam(1, $lahan["nama"]);
			$stmt->bindParam(2, $lahan["ph"]);
			$stmt->bindParam(3, $lahan["suhu"]);
			$stmt->bindParam(4, $lahan["tinggi"]);
			$stmt->bindParam(5, $lahan["air"]);
			$stmt->bindParam(6, $lahan["tanah"]);
			$stmt->bindParam(7, $lahan["kelas"]);
			$run = $stmt->execute();

			return $run;
			
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function getSemuaLahan()
	{
		$query = "SELECT * FROM lahan";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->execute();

			// $stmt->setFetchMode(PDO::FETCH_CLASS, 'lahan');
			$res = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'lahan', ['ph', 'suhu', 'tinggi', 'air', 'tanah', 'kelas']);

			return $res;

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function getLahan($id_lahan)
	{
		$query = "SELECT * FROM lahan WHERE id=?";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->bindParam(1, $id_lahan);
			$stmt->execute();

			$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'lahan', ['ph', 'suhu', 'tinggi', 'air', 'tanah', 'kelas']);
			$res = $stmt->fetch();
			
			return $res;
		} catch (PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}

	public function editLahan($lahan)
	{
		$query = "UPDATE lahan SET nama=?, ph=?, suhu=?, ketinggian=?, sumber_air=?, kondisi_tanah=?, kelas=? WHERE id=?";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->bindParam(1, $lahan["nama"]);
			$stmt->bindParam(2, $lahan["ph"]);
			$stmt->bindParam(3, $lahan["suhu"]);
			$stmt->bindParam(4, $lahan["tinggi"]);
			$stmt->bindParam(5, $lahan["air"]);
			$stmt->bindParam(6, $lahan["tanah"]);
			$stmt->bindParam(7, $lahan["kelas"]);
			$stmt->bindParam(8, $lahan["id"]);
			$run = $stmt->execute();

			return $run;
			
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
	
	public function hapusLahan($id)
	{
		$query = "DELETE FROM lahan WHERE id=?";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->bindParam(1, $id);
			$run = $stmt->execute();

			return $run;
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function getLahan_bobot()
	{
		$query = "SELECT lahan.*, ph.bobot AS bobot_ph, suhu.bobot AS bobot_suhu, ketinggian.bobot AS bobot_tinggi, air.bobot AS bobot_air, tanah.bobot AS bobot_tanah FROM lahan JOIN ph ON lahan.ph=ph.sub_kriteria JOIN suhu ON lahan.suhu=suhu.sub_kriteria JOIN ketinggian ON lahan.ketinggian = ketinggian.sub_kriteria JOIN air ON lahan.sumber_air=air.sub_kriteria JOIN tanah ON lahan.kondisi_tanah=tanah.sub_kriteria ORDER BY lahan.id";
		
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->execute();

			// $stmt->setFetchMode(PDO::FETCH_CLASS, 'lahan');
			$res = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'lahan', ['ph', 'suhu', 'tinggi', 'air', 'tanah', 'kelas']);

			return $res;

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

}
 ?>