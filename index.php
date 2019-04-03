<?php

	require_once("config.php");
	/*
	$sql = new Sql();

	$usuarios = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = 4");

	if (!empty($usuarios)) {
		echo json_encode($usuarios);
	} else {
		echo "Resultado não encontrado.";
	}
	*/
	// Carrega 01 usuario
	/*
	$root = new Usuario();

	$root->loadById(3);

	echo $root;
	*/

	// Carrega varios usuarios
	/*
	$lists = Usuario::getList();
	echo json_encode($lists);
	*/

	// Pesquisa por argumento
	/*
	$search = Usuario::search("o");
	echo json_encode($search);
	*/

	// Carrega um usuario  usando login e a senha

	$usuario = new Usuario();
	$usuario->login("jose", "1234567890");

	echo $usuario;

?>