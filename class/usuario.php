<?php
	
	class Usuario{
		
		private $idusuario;
		private $deslogin;
		private $dessenha;
		private $dtcadastro;

		public function getUsuario(){
			return $this->idusuario;
		}
		public function setUsuario($value){
			$this->idusuario = $value;
		}

		public function getDeslogin(){
			return $this->deslogin;
		}
		public function setDeslogin($value){
			$this->deslogin = $value;
		}

		public function getDessenha(){
			return $this->desenha;
		}
		public function setDessenha($value){
			$this->desenha = $value;
		}

		public function getDtcadastro(){
			return $this->dtcadastro;
		}
		public function setDtcadastro($value){
			$this->dtcadastro = $value;
		}

		public function loadById($id){
			$sql = new Sql();

			$result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
					":ID"=>$id
			));
			// if (count($result)) {
			if (!empty($result)) {
				$row = $result[0];

				$this->setUsuario($row['idusuario']);
				$this->setDeslogin($row['deslogin']);
				$this->setDessenha($row['dessenha']);
				$this->setDtcadastro(new DateTime($row['dtcadastro']));

			} else {
				echo "Resultado não encontrado.";
			}
		}

		public function getList(){

			$sql = new Sql();
			return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
		}

		public static function search($login){
			$sql = new Sql();
			return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(":SEARCH"=>"%".$login."%"));
		}

		public function login($login, $password){
			$sql = new Sql();

			$result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
					":LOGIN"=>$login,
					":PASSWORD"=>$password
			));
			if (count($result)) {
			//if (!empty($result)) {
				$row = $result[0];

				$this->setUsuario($row['idusuario']);
				$this->setDeslogin($row['deslogin']);
				$this->setDessenha($row['dessenha']);
				$this->setDtcadastro(new DateTime($row['dtcadastro']));

			} else {
				throw new Exception("Login e/ou senha incorreto");
				
			}
		}

		public function __toString(){

			return json_encode(array(
				"idusuario"=>$this->getUsuario(),
				"deslogin"=>$this->getDeslogin(),
				"dessenha"=>$this->getDessenha(),
				"dtcadastro"=>$this->getDtcadastro()->format('d/m/y H:m:s')
			));
		}

	}
?>