<?php
require_once '../../Conexao/autentica.php';
require_once '../../Conexao/ConexaoBD/usuario.class.php';

$username  = $_POST['username'];
$email = $_POST['email'];
$idUser = $_POST['idUsuario'];

    if ($username != NULL || $idUser == $idUsuario) { 
        
        if (!file_exists($_FILES['arquivo']['name'])) {		
			
			$pt_file =  '../../menus/dist/img/'.$_FILES['arquivo']['name'];
			
			if ($pt_file != '../../menus/dist/img/'){	
				
				$destino =  '../../menus/dist/img/'.$_FILES['arquivo']['name'];				
				$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
				move_uploaded_file($arquivo_tmp, $destino);
				chmod ($destino, 0644);	

				$nomeimagem =  'dist/img/'.$_FILES['arquivo']['name'];
				
			}elseif($_POST['valor'] != NULL){
				
				$nomeimagem = $_POST['valor'];				
			
				}else{
				$nomeimagem = 'dist/img/avatar.png';
				}
			}
    
if(isset($idUser) != NULL){

		$usuario->UpdateUser($idUser, $username, $email, $nomeimagem);

}else{
	$password = md5($_POST['password']);
    $usuario->InsertUser($username, $email, $password, $nomeimagem);

}
    
}