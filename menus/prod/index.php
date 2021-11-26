<?php
require_once '../../Conexao/autentica.php';
require_once '../../layout/script.php';
require_once '../../Conexao/ConexaoBD/produtos.class.php';

echo $head;
echo $header;
echo $javascript;
echo '<script src="http://localhost/menus/prod/script.js"></script>';
echo '<div class="content-wrapper">
    <section class="content-header">
      <h1>  
        <ol class="breadcrumb">
          <li><a href="../"><i class="fa fa-dashboard"></i>Página Inicial</a></li>
          <li class="active">Lista de Produtos</li>
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

        <h3 class="box-title">Lista de Produtos</h3>
        <br/><br/>
        <p><b>Legenda: <span style="color:green">Acima/Igual Estoque Máximo</span> | <span style="color:brown">Acima/Igual Estoque Médio</span> | <span style="color:orange">Acima/Igual Estoque Mínimo</span>| <span style="color:red">Abaixo Estoque Mínimo</span></b></p>

            <div class="box-body"> 
              <ul class="todo-list">';
$produtos->index();

echo '</ul>
            </div>

            <div class="box-footer clearfix no-border">
            <a href="../itens/index.php" type="button" class="btn btn-success pull-left"><i class="fa fa-search"></i> Abrir Lista de Itens</a>
              <a href="FichaProduto.php" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Adicionar Produto</a>
            </div>
          </div>
	 
';
echo '</div>';
echo '</section>';




echo '</div>';
