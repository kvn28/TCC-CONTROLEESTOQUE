<?php
require_once '../../Conexao/autentica.php';
require_once '../../layout/script.php';
require_once '../../Conexao/ConexaoBD/produtos.class.php';
require_once '../../Conexao/ConexaoBD/itens.class.php';
$url = 'http://localhost/menus/';
if (isset($_GET['q'])) {

  $resp = $itens->editItens($_GET['q']);


  echo $head;
  echo $header;
  echo $javascript;
echo '<script src="http://localhost/menus/itens/script.js"></script>';
  echo '<div class="content-wrapper">
    <section class="content-header">
      <h1>

      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i>Página Inicial</a></li>
        <li><a href="../../menus/itens/index.php"><i class="fa fa-list"></i>Lista de Itens</a></li>
        <li class="active">Movimentação de Item</li>
      </ol>
      </h1>
    </section>

    <section class="content">
      <div class="row">
      <div class="row"> 
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Produto</h3>
            </div>
              <div class="box-body">
              	<div class="form-group">
                  <label for="exampleInputEmail1">Nome do Produto</label>

            <select class="form-control" id="txtProduto" disabled>';
  $produtos->listProdutos($resp['Itens']['PROD']);
  echo '</select>
            </div>
            <div class="form-group"> 
              <label>Quantidade de Item</label>
              <label for="txtQuant" class="error"></label>
              <input type="text" class="form-control" id="txtQuant" placeholder="Quantidades de Itens" value="' . $resp['Itens']['QUANT'] . '">
              <input type="hidden" id="txtSaldo" value="' . $resp['Itens']['QUANT'] . '">
            </div>
                 <input type="hidden" id="txtUsuario" value="' . $idUsuario . '">
                 <input type="hidden" id="txtItem" value="' . $resp['Itens']['IDITEM'] . '">
              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" onclick="retiraItem()" >Cadastrar</button>
                <a class="btn btn-danger" href="../../menus/itens">Cancelar</a>
              </div>
          </div>
          </div>
</div>';

  echo '</div>';
  echo '</div>';
  echo '</section>';
  echo '</div>';
} else {
  header('Location: ./');
}
