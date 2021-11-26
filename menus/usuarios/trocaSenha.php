<?php

require_once '../../Conexao/autentica.php';
require_once '../../Conexao/ConexaoBD/usuario.class.php';

if(isset($_POST['passAtual']) != NULL && isset($_POST['password']) != NULL && isset($_POST['rpassword']) !=NULL){

$passAtual  = $_POST['passAtual'];
$password   = $_POST['password'];
$rpassword  = $_POST['rpassword'];

if(!strcmp($password, $rpassword)){

$resp = $usuario->trocaSenha($passAtual, $password, $idUsuario);

}else{
	$resp = 0;
}

}else{
	$resp = 0;
}

$_SESSION['alert'] = $resp;
	header('Location: ../../menus/usuarios/profile.php');
