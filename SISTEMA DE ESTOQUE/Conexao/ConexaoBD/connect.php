<?php

 class Connect
 {
 	
 	var $localhost = "localhost";
 	var $root = "root";
 	var $passwd = "12345";
 	var $database = "tcc_controleestoque";
 	var $SQL;
 	


 	public function __construct()
 	{
 		$this->SQL = mysqli_connect($this->localhost, $this->root, $this->passwd);
		mysqli_select_db($this->SQL, $this->database);
		if(!$this->SQL){
			die("Conexão com o banco de dados falhou!:" . mysqli_connect_error($this->SQL)); 
		}
 	}

 	function login($username, $password){

 		$this->query  = "SELECT * FROM `usuarios` WHERE `USERNAME` = '$username'";
 		$this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
 		$this->total  = mysqli_num_rows($this->result);

 		if($this->total){

 			$this->dados = mysqli_fetch_array($this->result);
 			if(!strcmp($password, $this->dados['PASSWORD'])){

 				$_SESSION['idUsuario'] = $this->dados['ID'];
 				$_SESSION['usuario']   = $this->dados['USERNAME'];

 				$_SESSION['foto']      = $this->dados['IMAGEM'];
 				
 				header("Location: ../menus/");
 			}else{
 				header("Location: ../login.php?alert=2");
 			}
 		}else{
 				header("Location: ../login.php?alert=1");
 			}
 	}
 	
 }
$connect = new Connect; 
