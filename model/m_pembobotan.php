<?php 
include_once 'allModel.php';
/**
 * 
 */
class m_pembobotan extends koneksi
{

	public function getPh()
	{
		$query = "SELECT * FROM ph";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->execute();

			$res = $stmt->fetchAll(PDO::FETCH_CLASS, 'pembobotan');

			return $res;

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();	
			
		}
	}

	public function getSuhu()
	{
		$query = "SELECT * FROM suhu";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->execute();

			$res = $stmt->fetchAll(PDO::FETCH_CLASS, 'pembobotan');

			return $res;

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();	
			
		}
	}

	public function getKetinggian()
	{
		$query = "SELECT * FROM ketinggian";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->execute();

			$res = $stmt->fetchAll(PDO::FETCH_CLASS, 'pembobotan');

			return $res;

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();	
			
		}
	}

	public function getAir()
	{
		$query = "SELECT * FROM air";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->execute();

			$res = $stmt->fetchAll(PDO::FETCH_CLASS, 'pembobotan');

			return $res;

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();	
			
		}
	}

	public function getTanah()
	{
		$query = "SELECT * FROM tanah";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->execute();

			$res = $stmt->fetchAll(PDO::FETCH_CLASS, 'pembobotan');

			return $res;

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();	
			
		}
	}

}
 ?>