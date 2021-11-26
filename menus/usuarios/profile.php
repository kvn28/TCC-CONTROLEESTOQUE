<?php
require_once '../../Conexao/autentica.php';
require_once '../../layout/script.php';
require_once '../../Conexao/ConexaoBD/usuario.class.php';

echo $head;
echo $header;
echo '<div class="content-wrapper">
    <section class="content-header">
      <h1>
 
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i>Página Inicial</a></li>
        <li class="active">Perfil</li>
      </ol>
       </h1>
    </section>
    <section class="content">
    ';
require '../../layout/alert.php';
echo '

      <div class="row">
        <div class="col-md-3"> 

          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="' . $url . '/' . $foto . '" alt="User profile picture">

              <h3 class="profile-username text-center">' . $username . '</h3>

              <form action="trocaSenha.php" method="post">
              <div class="modal-body">
              <div class="form-group">
              <label for="passAtual">Senha Atual</label> 
                <input type="password" class="form-control" id="passAtual" name="passAtual">
                </div>
                <div class="form-group">
                <label for="password">Nova Senha</label> 
                <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                <label for="rpassword">Repetir nova senha</label> 
                <input type="password" class="form-control" id="rpassword" name="rpassword">
                </div>

              </div> 
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salvar Senha</button>
              </div>
              </form>
      </div>
    </section>';

echo '</div>';

echo $javascript;
