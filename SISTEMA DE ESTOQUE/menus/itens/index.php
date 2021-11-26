<?php
require_once '../../Conexao/autentica.php';
require_once '../../layout/script.php';
require_once '../../Conexao/ConexaoBD/itens.class.php';

echo $head;
echo $header;
echo $javascript;
echo '<script src="http://localhost/menus/itens/script.js"></script>';
echo '<div class="content-wrapper">
    <section class="content-header">
      <h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i>Página Inicial</a></li>
        <li class="active">Lista de Itens</li>
      </ol>
      </h1>
    </section>
    <section class="content">
    ';
require '../../layout/alert.php';
echo '
      <div class="row">
      	<div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Lista de Itens</h3>
              <br/><br/>
              <p><b>Legenda: <span style="color:green">Na Validade</span> | <span style="color:orange">Próximo do Vencimento</span> | <span style="color:red">Vencido</span></b></p>

            <div class="box-body">
             <ul class="todo-list">';
$itens->index();
echo '</ul>';
echo ' </div>
           
            <div class="box-footer clearfix no-border">
             <form action="totalitens.php" method="post">

              <a href="FichaItens.php" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Itens</a>
            </div>
          </div>

	 
';
echo '</div>';
echo '</section>';

echo '</div>';

