<?php
require_once '../../Conexao/autentica.php';
require_once '../../layout/script.php';

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

  echo '
    <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Usuário</h3>
            </div>

            <form role="form" enctype="multipart/form-data" action="acaoUsuario.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" name="username" class="form-control" placeholder="Nome do usuário">
                </div>

                <div class="form-group">
                  <label>E-mail</label>
                  <input type="text" name="email" class="form-control"  placeholder="E-mail do usuário">
                </div>

                <div class="form-group">
                  <label>digite uma senha</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
        

             
                <div class="form-group">
                  <label>Foto Perfil</label>
               <input id="arquivo" name="arquivo" type="file" class="form-control" placeholder="Imagem">
                </div>

                 <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../menus/usuarios">Cancelar</a>
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
?>
