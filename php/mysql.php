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

		public function insertProduct(array $arrValues) {
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
			$this->query = $this->conection->prepare("SELECT * FROM producto WHERE codBarras = ?");
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

		public function selectAllDepartment() {
			$this->query = $this->conection->prepare("SELECT * FROM departamento");
			$this->query->execute();
			$data = $this->query->fetchAll(PDO::FETCH_OBJ);
			return $data;
		}

		public function insertDepartment(array $arrValues) { 
			$this->query = $this->conection->prepare("INSERT INTO departamento (idDepartamento, nombre) VALUES (?, ?)");
			$result = $this->query->execute($arrValues);
			if ($result) {
				$lastInsert = $this->conection->lastInsertId();
			} else {
				$lastInsert = 0;
			}
			return $lastInsert;
		}

		public function selectIdNameDepartment(array $arrValues) {
			$this->query = $this->conection->prepare("SELECT * FROM departamento WHERE idDepartamento = ?");
			$this->query->execute($arrValues);
			$data = $this->query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		public function updateDepartment(array $arrValues) {
			$this->query =  $this->conection->prepare("UPDATE departamento SET idDepartamento = ?, nombre = ? WHERE idDepartamento = ?");
			$result = $this->query->execute($arrValues);
			return $result;
		}

		public function deleteDepartment(array $arrValues) {
			$this->query = $this->conection->prepare("DELETE FROM departamento WHERE idDepartamento = ?");
			$result = $this->query->execute($arrValues);
			print_r($arrValues);
			return $result;
		}

		//Department
		
		//User

		public function selectAllUser() {
			$this->query = $this->conection->prepare("SELECT * FROM usuario");
			$this->query->execute();
			$data = $this->query->fetchAll(PDO::FETCH_OBJ);
			return $data;
		}

		public function insertUser(array $arrValues) { 
			$this->query = $this->conection->prepare("INSERT INTO usuario (idUsuario, username, contrasenna, idTipoUsuario) VALUES (?, ?, ?, ?)");
			$result = $this->query->execute($arrValues);
			if ($result) {
				$lastInsert = $this->conection->lastInsertId();
			} else {
				$lastInsert = 0;
			}
			return $lastInsert;
		}

		public function selectIdNameUser(array $arrValues) {
			$this->query = $this->conection->prepare("SELECT * FROM usuario WHERE idUsuario = ?");
			$this->query->execute($arrValues);
			$data = $this->query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		public function updateUser(array $arrValues) {
			$this->query =  $this->conection->prepare("UPDATE usuario SET idUsuario = ?, username = ?, idTipoUsuario = ? WHERE idUsuario = ?");
			print_r($arrValues);
			$result = $this->query->execute($arrValues);
			
			return $result;
		}

		public function deleteUser(array $arrValues) {
			$this->query = $this->conection->prepare("DELETE FROM usuario WHERE idUsuario = ?");
			$result = $this->query->execute($arrValues);
			print_r($arrValues);
			return $result;
		}

		//User

		//Employee

		public function selectAllEmployee() {
			$this->query = $this->conection->prepare("SELECT * FROM empleado");
			$this->query->execute();
			$data = $this->query->fetchAll(PDO::FETCH_OBJ);
			return $data;
		}

		public function insertEmployee(array $arrValues) { 
			$this->query = $this->conection->prepare("INSERT INTO empleado (numNomina, nombre, apeP, apeM, sexo, fechaContratacion, idCargo, idUsuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			print_r($this->query);
			$result = $this->query->execute($arrValues);
			if ($result) {
				$lastInsert = $this->conection->lastInsertId();
			} else {
				$lastInsert = 0;
			}
			return $lastInsert;
		}

		public function selectIdNameEmployee(array $arrValues) {
			$this->query = $this->conection->prepare("SELECT * FROM empleado WHERE numNomina = ?");
			$this->query->execute($arrValues);
			$data = $this->query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		public function updateEmployee(array $arrValues) {
			$this->query =  $this->conection->prepare("UPDATE empleado SET numNomina = ?, nombre = ?, apeP = ?, apeM = ?, sexo = ?, fechaContratacion = ?, idCargo = ?, idUsuario = ? WHERE numNomina = ?");
			print_r($arrValues);
			$result = $this->query->execute($arrValues);
			
			return $result;
		}

		public function deleteEmployee(array $arrValues) {
			$this->query = $this->conection->prepare("DELETE FROM empleado WHERE numNomina = ?");
			$result = $this->query->execute($arrValues);
			print_r($arrValues);
			return $result;
		}

		//Employee

		//Cargos

		public function selectAllCargos() {
			$this->query = $this->conection->prepare("SELECT * FROM cargo");
			$this->query->execute();
			$data = $this->query->fetchAll(PDO::FETCH_OBJ);
			return $data;
		}

		public function insertCargos(array $arrValues) { 
			$this->query = $this->conection->prepare("INSERT INTO cargo (idCargo, nombre) VALUES (?, ?)");
			$result = $this->query->execute($arrValues);
			if ($result) {
				$lastInsert = $this->conection->lastInsertId();
			} else {
				$lastInsert = 0;
			}
			return $lastInsert;
		}

		public function selectIdNameCargos(array $arrValues) {
			$this->query = $this->conection->prepare("SELECT * FROM cargo WHERE idCargo = ?");
			$this->query->execute($arrValues);
			$data = $this->query->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		public function updateCargos(array $arrValues) {
			$this->query =  $this->conection->prepare("UPDATE cargo SET idCargo = ?, nombre = ? WHERE idCargo = ?");
			$result = $this->query->execute($arrValues);
			return $result;
		}

		public function deleteCargos(array $arrValues) {
			$this->query = $this->conection->prepare("DELETE FROM cargo WHERE idCargo = ?");
			$result = $this->query->execute($arrValues);
			print_r($arrValues);
			return $result;
		}

		//Cargos

	}
 ?>