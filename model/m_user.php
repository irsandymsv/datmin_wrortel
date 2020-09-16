<?php 
include_once 'allModel.php';

class m_user extends koneksi
{

	public function getUser($user)
	{
		$query = "SELECT * FROM user WHERE username = ? AND password = ?";
		try {
			$stmt = $this->konek()->prepare($query);
			$stmt->bindParam(1, $user["username"]);
			$stmt->bindParam(2, $user["password"]);
			$stmt->execute();

			$stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
			$res = $stmt->fetch();

			return $res;
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		
	}
	
}
?>