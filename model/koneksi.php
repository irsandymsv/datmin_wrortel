<?php 

/**
 * 
 */
class koneksi 
{

	public $server = "localhost";
	public $username = "root";
	public $password = "";
	public $db = "datmin_wortel";
	public $con = "";

	// Create connection
	public function konek()
	{
		try {
			$this->con = new PDO("mysql:host=$this->server;dbname=$this->db", $this->username, $this->password);
			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->con->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
			return $this->con;
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
		
	
}



?>