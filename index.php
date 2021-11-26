<?php
require_once 'Conexao/autentica.php';

if($usuario){

	header('Location: menus/');
}else{

header('Location: login.php');
}

?>