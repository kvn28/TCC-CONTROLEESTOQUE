<?php
require_once '../../Conexao/autentica.php';
require_once '../../layout/script.php';
require_once '../../Conexao/ConexaoBD/usuario.class.php';

echo $head;
echo $header;
echo '<div class="content-wrapper">';
echo '
    <section class="content-header">
      <h1>

      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i>Página Inicial</a></li>
        <li><a href="../../menus/usuarios"><i class="fa fa-list"></i>Lista de Usuários</a></li>
        <li class="active">Usuário</li>
      </ol>
      </h1>
    </section>

    <section class="content">

      <div class="row">';

echo ' 
      <div class="row">
    
        
';


$ID = $_GET['q'];

$resp = $usuario->editUsuario($ID);

echo '
    <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Usuário</h3>
            </div>
            <form role="form" enctype="multipart/form-data" action="acaoUsuario.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome</label>
                  <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Nome do usuário" value="' . $resp['Usuario'] . '">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail do usuário" value="' . $resp['E-mail'] . '">
                </div>

                                 
             
                <div class="form-group">
                <img src="../' . $resp['Imagem'] . '" width="50" class="img img-responsive" />
                  <label for="exampleInputEmail1">Foto Perfil</label>
               <input id="arquivo" name="arquivo" type="file" class="form-control" id="exampleInputEmail1" placeholder="Imagem">
                </div>';


echo '<div class="box-footer">
                                <input type="hidden" id="valor" name="valor" value="./' . $resp['Imagem'] . '">
                 <input type="hidden" id="ID" name="idUsuario" value="' . $ID . '">
                                 <button type="submit" id="atualizar" name="update" class="btn btn-primary" value="Atualizar">Atualizar</button>
                <a class="btn btn-danger" href="../../menus/usuarios/">Cancelar</a>
              </div>
            </form>
            
';
echo '
          </div>
          </div>
</div>';

echo '</div>';
echo '</div>';
echo '</section>';
echo '</div>';
echo $javascript;
