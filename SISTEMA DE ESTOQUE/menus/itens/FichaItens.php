<?php
require_once '../../Conexao/autentica.php';
require_once '../../layout/script.php';
require_once '../../Conexao/ConexaoBD/produtos.class.php';

echo $head;
echo $header;
echo $javascript;
echo '<script src="http://localhost/menus/itens/script.js"></script>';
echo '<div class="content-wrapper">';
echo '
    <section class="content-header">
      <h1>

      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i>Página Inicial</a></li>
        <li><a href="../../menus/itens/index.php"><i class="fa fa-list"></i>Lista de Itens</a></li>
        <li class="active">Cadastro de Itens</li>
      </ol>
      </h1>
    </section>

    <section class="content">
      <div class="row">';

echo '
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Item</h3>
            </div>
              <div class="box-body">
              	<div class="form-group">
                  <label>Nome do Produto</label>
                  <label for="txtProduto" class="error"></label>
                  <select class="form-control" id="txtProduto" onchange="validaVencto()">
                  ';
$produtos->listProdutos($resp['Itens']['PROD']);
echo '</select>
                </div> 
                <div class="form-group">
                  <label>Fornecedor</label>
                  <label for="txtFornecedor" class="error"></label>
                  <input type="text"  class="form-control" id="txtFornecedor" placeholder="Fornecedor">
                </div>
                <div class="form-group">
                  <label >Quantidade</label>
                  <label for="txtQuant" class="error"></label>
                  <input type="text" class="form-control" onchange="calcularValorUnitario()" id="txtQuant" placeholder="Quantidades a Serem Cadastradas">
                </div>
                <div class="form-group">
                  <label>Valor de Compra</label>
                  <label for="txtValCompra" class="error"></label>
                  <input type="text" class="form-control" id="txtValCompra" onchange="calcularValorUnitario()" placeholder="Valor de Compra">
                  </div>
                <div class="form-group">
                  <label>Valor Unitário</label>
                  <label for="txtValUnitario" class="error"></label>
                  <input type="text" class="form-control" id="txtValUnitario" placeholder="Valor Unitário" disabled>
                </div>
              <div class="form-group">
                <label>Valor de Unitário de Venda</label>
                <label for="txtValVenda" class="error"></label>
                <input type="text" class="form-control" id="txtValVenda" placeholder="Valor de Unitário de Venda">
              </div>
              <div class="form-group">  
                  <label>Data da Compra</label>
                  <label for="txtDataCompra" class="error"></label>
                  <input type="date" name="DataCompraItens" class="form-control" id="txtDataCompra" placeholder="Data de Compra"> 
                </div>
                <div id="Vencto"> 
                  <div class="form-group">
                    <label>Data de Vencimento</label>
                    <label for="txtDataVencimento" class="error"></label>
                    <input type="date" class="form-control" id="txtDataVencimento" placeholder="Data de Vencimento">
                  </div>
                </div> 
                           
                 <input type="hidden" id="txtUsuario" value="' . $idUsuario . '">


 
              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" onclick="salvaItem()" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../menus/itens/">Cancelar</a>
              </div>
  
          </div>

          </div>
          <script>init()</script>
</div>';

echo '</div>';
echo '</div>';
echo '</section>';
echo '</div>';
