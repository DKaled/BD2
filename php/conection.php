<?php 
    class Conection {
        private $dbHost = "localhost";
        private $dbName = "minisuper";
        private $dbUser = "root";
        private $dbPass = "";

		public function __construct() {
			$connectionString = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName . ";";
			try {
				$this->connect = new PDO($connectionString, $this->dbUser, $this->dbPass);
				$this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $error) {
				$this->connect = "Error de conexión";
				echo "ERROR: " . $error->getMessage();
			}
		}

		public function connect() {
			return $this->connect;
		}
	}
 ?>