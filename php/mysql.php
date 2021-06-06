<?php 
	require ('conection.php');
	class MySQL extends Conection {
		private $conection;
		private $query;

		function __construct() {
			$this->conection = new Conection();
			$this->conection = $this->conection->connect();
		}

		public function closeConection() {
			$this->conection = null;
		}

		//Login

		public function login(array $arrValues) {
			$this->query = $this->conection->prepare("SELECT usuario.username, tipousuario.tipo FROM usuario INNER JOIN tipousuario ON usuario.idTipoUsuario = tipousuario.idTipoUsuario WHERE username = ? AND contrasenna = ?");
			$this->query->execute($arrValues);
			return $this->query;
		}

		//Login

		//Product

		public function insertProduct(array $arrValues) { //$arrValues = (val1, val2, ...;)
			//$this->arrValues = $arrValues;
			$this->query = $this->conection->prepare("INSERT INTO producto (codBarras, nombre, precio, cantidad, idDepartamento) VALUES (?, ?, ?, ?, ?)");
			$result = $this->query->execute($arrValues);
			if ($result) {
				$lastInsert = $this->conection->lastInsertId();
			} else {
				$lastInsert = 0;
			}
			return $lastInsert;
		}

		public function selectAllProduct() {
			$this->query = $this->conection->prepare("SELECT * FROM producto");
			$this->query->execute();
			$data = $this->query->fetchAll(PDO::FETCH_OBJ);
			return $data;
		}

		public function selectIdNameProduct(array $arrValues) {
			$this->query = $this->conection->prepare("SELECT * FROM producto WHERE codBarras = ? OR nombre = ?");
			$this->query->execute($arrValues);
			$data = $this->query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		public function updateProduct(array $arrValues) {
			$this->query =  $this->conection->prepare("UPDATE producto SET nombre = ?, precio = ?, cantidad = ?, idDepartamento = ? WHERE codBarras = ?");
			$result = $this->query->execute($arrValues);
			return $result;
		}

		public function deleteProduct(array $arrValues) {
			$this->query = $this->conection->prepare("DELETE FROM producto WHERE codBarras = ?");
			$result = $this->query->execute($arrValues);
			print_r($arrValues);
			return $result;
		}

		//Product

		//Department



		//Department
		
	}
 ?>