<?php 
	class mysql extends conexion {
		private $conexion;

		function __construct() {
			$this->conexion = new conexion();
			$this->conexion = $this->conexion->connect();
		}

		//Product

		public function insertProduct(array $arrValues) { //$arrValues = (val1, val2, ...;)
			$this->arrValues = $arrValues;
			$query = $this->conexion->prepare("INSERT INTO producto (codBarras, nombre, precio, cantidad, idDepartamento) VALUES (?, ?, ?, ?, ?)");
			$result = $query->execute($arrValues);
			if ($result) {
				$lastInsert = $this->conexion->lastInsertId();
			} else {
				$lastInsert = 0;
			}
			return $lastInsert;
		}

		public function selectAllProduct() {
			$query = $this->conexion->prepare("SELECT * FROM producto");
			$query->execute();
			$data = $query->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}

		public function selectIdNameProduct(array $arrValues) {
			$query = $this->conexion->prepare("SELECT * FROM producto WHERE codBarras = ? OR nombre = ?");
			$query->execute($arrValues);
			$data = $query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		public function updateProduct(array $arrValues) {
			//FALTA select
			//Falta dato para where
			$query =  $this->conexion->prepare("UPDATE producto SET codBarras = ?, nombre = ?, precio = ?, cantidad = ?, idDepartamento = ? WHERE codBarras = ?");
			$result = $query->execute($this->arrValues);
			return $result; //Pensar en cambiar $resExecute por $resUpdate
		}

		//Product

		///////Funciones ejemplo que no forman parte de este proyecto

		//Insertar un registro
		public function insert(string $query, array $arrValues) {
			$this->strQuery = $query;
			$this->arrValues = $arrValues;
			$insert = $this->conexion->prepare($this->strQuery);
			$resInsert = $insert->execute($this->arrValues);
			if ($resInsert) {
				$lastInsert = $this->conexion->lastInsertId();
			} else {
				$lastInsert = 0;
			}
			return $lastInsert;
		}

		//Busca un registro
		public function select(string $query) {
			$this->strQuery = $query;
			$result = $this->conexion->prepare($this->strQuery);
			$result->execute();
			$data = $result->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		//Devuelve todos los registros
		public function select_all(string $query) {
			$this->strQuery = $query;
			$result = $this->conexion->prepare($this->strQuery);
			$result->execute();
			$data = $result->fetchall(PDO::FETCH_ASSOC);
			return $data;
		}

		//Actualiza registros
		public function update(string $query, array $arrValues) {
			$this->strQuery = $query;
			$this->arrValues = $arrValues;
			$update = $this->conexion->prepare($this->strQuery);
			$resExecute = $update->execute($this->arrValues);
			return $resExecute; //Pensar en cambiar $resExecute por $resUpdate
		}

		//Eliminar un registro
		public function delete(string $query) {
			$this->strQuery = $query;
			$result = $this->conexion->prepare($this->strQuery);
			$del = $result->execute();
			return $del;
		}
	}
 ?>