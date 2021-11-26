<?php
require_once '../../Conexao/autentica.php';
require_once '../../layout/script.php';
require_once '../../Conexao/ConexaoBD/itens.class.php';

echo $head;
echo $header;
echo '<div class="content-wrapper">
    <section class="content-header">
      <h1>

      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Lista de Saldos</li>
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

            </div>

            <div class="box-body">
            <ul class="todo-list">';
$itens->totalitens();
echo '</ul>';
echo ' </div>
           
          </div>
	 
';
echo '</div>';
echo '</section>';




echo '</div>';

echo $javascript;
