<?php

  /*
   Class produtos
  */

   require_once 'connect.php';

   class Usuario extends Connect
   {

   	public function index()
   	{

   			$this->query = "SELECT * FROM `usuarios`";
   			$this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));

   			while($row[] = mysqli_fetch_array($this->result));
        return json_encode($row);
              
 
     
   	}

   	public function InsertUser($username, $EMAIL, $password, $pt_file)
   	{
   		$this->query = "INSERT INTO `usuarios`(`ID`,`USERNAME`,`EMAIL`,`PASSWORD`,`IMAGEM`,`DATAREGISTRO`)VALUES (NULL, '$username', '$EMAIL', '$password', '$pt_file' , CURRENT_TIMESTAMP  )";
   		$this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
        mysqli_insert_id($this->result);
        if($this->result){
           header('Location: ../../menus/usuarios/index.php?alert=1');
        
      }else{
                header('Location: ../../menus/usuarios/index.php?alert=0');
              }

   	}

      public function editUsuario($id){

      $query = "SELECT * FROM `usuarios` WHERE `ID` = '$id'";
      $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));

      if($row = mysqli_fetch_array($result)){

        return array('Usuario' => $row['USERNAME'], 'E-mail' => $row['EMAIL'],  'Imagem' => $row['IMAGEM']);

      }


    }
    public function UpdateUser($id, $username, $email, $nomeimagem){

        
      $username = mysqli_real_escape_string($this->SQL, $username);
      $email = mysqli_real_escape_string($this->SQL, $email);

      $this->query = "UPDATE `usuarios` SET `USERNAME`='$username',`EMAIL`='$email',`IMAGEM`='$nomeimagem'  WHERE `ID`= '$id'";
      
        $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
        mysqli_insert_id($this->result);
        if($this->result){
           header('Location: ../../menus/usuarios/index.php?alert=1');
        
      }else{
                header('Location: ../../menus/usuarios/index.php?alert=0');
      }

    }   

    public function trocaSenha($passAtual, $password, $idUsuario){

      $query = "SELECT * FROM `usuarios` WHERE `ID` = '$idUsuario'";
      $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));

      if($row = mysqli_fetch_array($result)){
        $passAtual = md5($passAtual);

        if(!strcmp($passAtual, $row['PASSWORD'])){

          $id = $row['ID'];

          $password = md5($password);

          $up = "UPDATE `usuarios` SET `PASSWORD` = '$password' WHERE `ID` = '$id'";
          mysqli_query($this->SQL, $up) or die(mysqli_error($this->SQL));

          return 1;

        }
        return 0;

      }
      return 0;

    }

   }

   $usuario = new Usuario;