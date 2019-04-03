<?php

class Sql extends PDO {

	private $conn;

	/* 
		Conexão com o db
	*/
	public function __construct(){
		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");
	}

	private function setParams($statement, $parameters = array()){
		foreach ($parameters as $key => $value) {
			$this->setParam($statement, $key, $value);
		}
	}

	private function setParam($statement, $key, $value){
			$statement->bindParam($key, $value);
	}

	/* 
		$rawQuery - Query que recebe os dados brutos a serem tratados
		$params - Parametros a serem recebidos
	*/
	public function query($rawQuery, $params = array()){
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);
		
		$stmt->execute();

		return $stmt;
	}

	public function select($rawQuery, $params = array()):array{
		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}

?>