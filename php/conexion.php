<?php 
    class conexion {
        private $dbHost = "localhost";
        private $dbName = "_pruebabd2";
        private $dbUser = "root";
        private $dbPass = "";

		public function __construct() {
			$connectionString = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName . ";";
			try {
				$this->connect = new PDO($connectionString, $this->dbUser, $this->dbPass);
				$this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo "Conexión exitosa";
			} catch (PDOException $error) {
				$this->connect = "Error de conexión";
				echo "ERROR: " . $error->getMessage();
			}
		}

		public function connect() {
			return $this->connect;
		}
	}

    $con = new conexion();
    $con = $con->connect();
 ?>