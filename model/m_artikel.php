<?php 
/**
 * 
 */
include_once 'allModel.php';
class m_artikel extends koneksi
{
	
	public function buatArtikel($artikel)
	{
		$query = "INSERT INTO artikel (judul, isi, id_penulis) VALUES (?, ?, ?)";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->bindParam(1, $artikel["judul"]);
			$stmt->bindParam(2, $artikel["isi"]);
			$stmt->bindParam(3, $artikel["id_penulis"]);
			$run = $stmt->execute();

			$getId = $this->konek()->prepare("SELECT MAX(id) FROM artikel");
			$getId->execute();
			$id = $getId->fetch();

			return array($run, $id[0]);
			
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function setPicture($picture, $id)
	{
		$query = "UPDATE artikel SET gambar = ? WHERE id = ?";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->bindParam(1, $picture);
			$stmt->bindParam(2, $id);
			$run = $stmt->execute();

			return $run;
			
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();	
		}
	}

	public function getArtikel($id)
	{
		$query = "SELECT artikel.*, user.nama AS penulis FROM artikel JOIN user on artikel.id_penulis=user.id WHERE artikel.id=?";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->bindParam(1, $id);
			$stmt->execute();

			$stmt->setFetchMode(PDO::FETCH_CLASS, 'artikel');
			$res = $stmt->fetch();

			return $res;

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();	
			
		}
	}

	public function getAllArtikel()
	{
		$query = "SELECT * FROM artikel ORDER BY created_at DESC";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->execute();

			$stmt->setFetchMode(PDO::FETCH_CLASS, 'artikel');
			$res = $stmt->fetchAll();

			return $res;

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	// public function getArtikelSaran($saran)
	// {
	// 	$query = "SELECT * FROM artikel WHERE saran=? ORDER BY created_at DESC";
	// 	try {
	// 		$stmt = $this->konek()->prepare($query);
	// 		$stmt->bindParam(1, $saran);
	// 		$stmt->execute();

	// 		$stmt->setFetchMode(PDO::FETCH_CLASS, 'artikel');
	// 		$res = $stmt->fetchAll();

	// 		return $res;

	// 	} catch (PDOException $e) {
	// 		echo "Error: " . $e->getMessage();
	// 	}	
	// }

	public function editArtikel($artikel)
	{
		$query = "UPDATE artikel SET judul=?, isi=?, gambar=? WHERE id=?";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->bindParam(1, $artikel["judul"]);
			$stmt->bindParam(2, $artikel["isi"]);
			$stmt->bindParam(3, $artikel["gambar"]);
			$stmt->bindParam(4, $artikel["id"]);
			$run = $stmt->execute();

			return $run;
			
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function hapusArtikel($id)
	{
		$query = "DELETE FROM artikel WHERE id=?";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->bindParam(1, $id);
			$run = $stmt->execute();

			return $run;
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
}
?>