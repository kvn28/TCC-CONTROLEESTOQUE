<?php
require_once '../Conexao/autentica.php';
require_once '../layout/script.php';


echo $head;
echo $header;
echo '<div class="content-wrapper">';
echo '<section class="content" style="height: auto !important; min-height: 0px !important;">

      <div class="row">
        <div class="col-lg-12 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
            <center><p style="font-size:35px">Cadastro de Produtos</p></center>
            <br/>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="../menus/prod/index.php" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-12 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
            <center><p style="font-size:35px">Cadastro de Itens</p></center>
              <br/>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="../menus/itens/index.php" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        </div>
        <div class="row">

        <div class="col-lg-12 col-xs-6">
          <!-- small box --> 
          <div class="small-box bg-green">
            <div class="inner">
            <center><p style="font-size:35px">Cadastro de Usuários</p></center>
            <br/>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="../menus/usuarios/index.php" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
  

    </section>

</div>

';
echo $javascript;
?>