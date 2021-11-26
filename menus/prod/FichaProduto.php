<?php
require_once '../../Conexao/autentica.php';
require_once '../../layout/script.php';
echo $javascript;
echo '<script src="http://localhost/menus/prod/script.js"></script>';
echo $head;
echo $header;
echo '<div class="content-wrapper">';
echo '
    <section class="content-header">
      <h1>

      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i>Página Inicial</a></li>
        <li><a href="../../menus/prod"><i class="fa fa-list"></i>Lista Produtos</a></li>
        <li class="active">Cadastro de Produtos</li>
      </ol>
      </h1>
    </section>

    <section class="content">
      <div class="row">';

echo '<div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Produto</h3>
            </div>

            
              <div class="box-body">
                  <label class="control-label">Nome do Produto</label>
                  <label for="txtProduto" class="error"></label>
                  <input type="text" class="form-control" id="txtProduto" placeholder="Descrição Produto">
              </div>
                <div class="box-body"> 
                    <label class="control-label">Estoque Mínimo</label>
                    <label for="txtEstoqueMin" class="error"></label>
                    <input type="Number" class="form-control" id="txtEstoqueMin" placeholder="Favor Informar a Quantidade para Estoque Mínimo">          
                </div>
                <div class="box-body">
                <label class="control-label">Estoque Médio</label>
                  <label for="txtEstoqueMed" class="error"></label>
                  <input type="Number"  class="form-control" id="txtEstoqueMed" placeholder="Favor Informar a Quantidade para Estoque Médio">        
              </div>
              <div class="box-body">
                <label class="control-label">Estoque Máximo</label>
                <label for="txtEstoqueMax"  class="error"></label>
                <input type="Number" class="form-control" id="txtEstoqueMax" placeholder="Favor Informar a Quantidade para Estoque Máximo">
            </div>
            <div class="box-body">
            <label class="control-label">Unidade de Medida</label>
            <label for="txtUM"  class="error"></label>
            <input type="text" class="form-control" id="txtUM" placeholder="Favor Informar a Unidade de Medida" maxlength="2">
        </div>
            <div class="box-body">
                  <label class="control-label">Possui Vencimento?</label>
                  <label for="ddlPVenct"  class="error"></label>
                  <select id="ddlPVenct" class="form-control">
                  <option value=""></option>  
                  <option value="N">NÃO</option>
                  <option value="S">SIM</option>
                  </select>
		          </div>
                <div class="row">
                 <input type="hidden" id="idUsuario" value="' . $idUsuario . '">
                </div> 
              <div class="box-footer">
             <button type="submit" name="update" class="btn btn-primary" onclick="SalvaProduto()" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../menus/prod">Cancelar</a>
              </div>

          </div> 
          </div>
</div>';

echo '</div>';
echo '</div>';
echo '</section>';
echo '</div>';
