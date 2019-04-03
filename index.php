<?php

require_once("config.php");

$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = 4");

if (!empty($usuarios)) {
	echo json_encode($usuarios);
} else {
	echo "Resultado não encontrado.";
}

?>