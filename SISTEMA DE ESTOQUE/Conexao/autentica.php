<?php
session_start();

if(!isset($_SESSION["idUsuario"]) || !isset($_SESSION["usuario"])){

 			header('Location: ../');
}else{

	$idUsuario = $_SESSION["idUsuario"]; 
	$username   = $_SESSION["usuario"];

	$foto      = $_SESSION["foto"];

}

?>