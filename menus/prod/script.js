function SalvaProduto() {
    var valido = ValidaCampos()

    if (valido) {
        var desc = $('#txtProduto').val()
        var EMinimo = $('#txtEstoqueMin').val()
        var EMedio = $('#txtEstoqueMed').val()
        var EMaximo = $('#txtEstoqueMax').val()
        var PossuiVencimento = $('#ddlPVenct').val()
        var usuariologado = $('#idUsuario').val()
        var UM = $('#txtUM').val()
        $.ajax({
            url: 'http://localhost/menus/prod/AdicionaProduto.php',
            data: {
                descricao: desc,
                estoquemin: EMinimo,
                estoquemed: EMedio,
                estoquemax: EMaximo, 
                PVenct: PossuiVencimento,
                um: UM,
                user: usuariologado
            },
            type: 'post',
            success: function (data) {
                if (data == '1') {

                    $(location).attr('href', 'http://localhost/menus/prod/index.php')
                    alert('Operação Executada com sucesso.')
                }
                else {

                    $(location).attr('href', 'http://localhost/menus/prod/index.php')
                    alert(data)
                }
            }
        });
    }
    else {
        bootbox.alert('Favor Preencher os Campos Obrigatórios')
    }
}

function EditaProduto(Prod) {
    var produto = Prod.split(',')[0];
    var descricao = Prod.split(',')[1];
    var EMinimo = Prod.split(',')[2];
    var EMedio = Prod.split(',')[3];
    var EMaximo = Prod.split(',')[4];
    var UM = Prod.split(',')[5];
    var PossuiVencimento = Prod.split(',')[6];
    
  
    var html = ''
    html += 'Descrição do Produto<p><input id=\"txtProduto\"  type=\"text\" class=\"form-control\" /></p>';
    html += 'Estoque Mínimo<p><input id=\"txtEstoqueMin\"  type=\"Number\" class=\"form-control\" /></p>'
    html += 'Estoque Médio<p><input id=\"txtEstoqueMed\"  type=\"Number\" class=\"form-control\"/></p>'
    html += 'Estoque Máximo<p><input id=\"txtEstoqueMax\"  type=\"Number\" class=\"form-control\"/></p>'
    html += 'Unidade de Medida<p><input id=\"txtUM\"  type=\"text\" class=\"form-control\" maxlength="2" disabled/></p>'
    html += 'Possui Vencimento<p><select id=\"ddlPVenct\" class="form-control"><option value=""></option><option value="N">NÃO</option><option value="S">SIM</option></select></p>'

    var message = html

    bootbox.confirm(message, function (result) {
        var valido = ValidaCampos()
        
            if (result) {

                if (valido) {
                $.ajax({
                    url: 'http://localhost/menus/prod/AlteraProduto.php',
                    data: {
                        ID: produto,
                        Desc: $('#txtProduto').val(),
                        estoquemin: $('#txtEstoqueMin').val(),
                        estoquemed: $('#txtEstoqueMed').val(),
                        estoquemax: $('#txtEstoqueMax').val(),
                        PVenct: $('#ddlPVenct').val()
                    },
                    type: 'post',
                    success: function (data) {
                        if (data == '1') {
                            $(location).attr('href', 'http://localhost/menus/prod/index.php')
                            alert('Operação Executada com sucesso.')
                        }
                        else {
                            $(location).attr('href', 'http://localhost/menus/prod/index.php')
                            alert(data)
                        }
                    }
                });
            }
            else {
                alert('Favor preencher todos os campos.')
            }
            }

    });
    $('#txtProduto').val(descricao);
    $('#txtEstoqueMin').val(EMinimo)
    $('#txtEstoqueMed').val(EMedio)
    $('#txtEstoqueMax').val(EMaximo)
    $('#txtUM').val(UM)
    $('#ddlPVenct').val(PossuiVencimento)
}

function ExcluiProduto(Produto) {
    var ID = Produto.split(',')[0];
    var Desc = Produto.split(',')[1];
    var message = "Deseja Excluir o Produto " + ID + '/' + Desc + "?";

    bootbox.confirm(message, function (result) {

        if (result) {
            $.ajax({
                url: 'http://localhost/menus/prod/ExcluiProduto.php',
                data: { ID: ID },
                type: 'post',
                success: function (data) {
                    if (data == '1') {
                        $(location).attr('href', 'http://localhost/menus/prod/index.php')
                        alert('Operação Executada com sucesso.')
                    }
                    else {
                        $(location).attr('href', 'http://localhost/menus/prod/index.php')
                        alert('Operação com falha.')
                    }
                }
            });

        }

    });
}

function ValidaCampos() {

    CamposRequiridos = 'txtProduto,txtEstoqueMin,txtEstoqueMed,txtEstoqueMax,ddlPVenct,txtUM'; //Campos à serem validados






    var Array = CamposRequiridos.split(',');
    $.each(Array, function (index, value) {
        $('#' + value).prop('required', true).css('border', '1px solid #3774aa');
        $('label[for=' + value + ']').html('<span style="color:red;font-weight:bolder">*</span>');
    });

    var lValid = true;

    $.each(Array, function (index, value) {
        if ($('#' + value).val() == '') {
            lValid = false;
            return lValid;
        }
    });

    return lValid;

}

function AdicionaItem(Prod){
    var produto = Prod.split(',')[0];
    var descricao = Prod.split(',')[1];
    var PossuiVencimento = Prod.split(',')[6];

    var html = '<h3>Adicionar Item</h3>'
    html += 'Descrição do Produto<p><input id=\"txtProduto\"  type=\"text\" class=\"form-control\" disabled/></p>';
    html += 'Fornecedor<p><input id=\"txtFornecedor\"  type=\"text\" class=\"form-control\"/></p>';
    html += 'Quantidade<p><input id=\"txtQuant\"  onchange="calcularValorUnitario()" type=\"Number\" class=\"form-control\" /></p>'
    html += 'Valor de Compra<p><input id=\"txtValCompra\"  onchange="calcularValorUnitario()" type=\"text\" class=\"form-control\" /></p>'
    html += 'Valor Unitário<p><input id=\"txtValUnit\"  type=\"Number\" class=\"form-control\" disabled/></p>'
    html += 'Valor Unitário de Venda<p><input id=\"txtValVenda\"  type=\"Number\" class=\"form-control\" /></p>'
    html += 'Data da Compra<p> <input type="date" name="txtDataCompra" class="form-control" id="txtDataCompra" placeholder="Data de Compra"></p>'
    if(PossuiVencimento == 'S'){
    html += 'Data de Vencimento<p> <input type="date" name="txtDataVencimento" class="form-control" id="txtDataVencimento" placeholder="Data de Vencimento"></p>'
    }
    else{
        html += ' <input type="hidden" name="txtDataVencimento" class="form-control" id="txtDataVencimento" value="0000-00-00" placeholder="Data de Vencimento">'  
    }


    var message = html

    bootbox.confirm(message, function (result) {
        var valido = ValidaCampos()
        
            if (result) {

                if (valido) {
                $.ajax({
                    url: 'http://localhost/menus/prod/ModalItem.php',
                    data: {
                        ID: produto,
                        Quant: $('#txtQuant').val(),
                        Fornecedor: $('#txtFornecedor').val(),
                        ValCompra: $('#txtValCompra').val(),
                        ValUnit: $('#txtValUnit').val(),
                        ValVenda: $('#txtValVenda').val(),
                        DtCompra: $('#txtDataCompra').val(),
                        DtVenct: $('#txtDataVencimento').val()
                    },
                    type: 'post',
                    success: function (data) {
                        if (data.split(',')[0] == '1') {
                            $(location).attr('href', 'http://localhost/menus/prod/index.php')
                            alert('Operação Executada com sucesso, item '+ data.split(',')[1] + ' incluso')
                        }
                        else {
                            $(location).attr('href', 'http://localhost/menus/prod/index.php')
                            alert(data)
                        }
                    }
                });
            }
            else {
                alert('Favor preencher todos os campos.')
            }
            }

    });
    $('#txtProduto').val(descricao);


}

function calcularValorUnitario() {

	var valorTotal = 0;

	var txtQtde = $('#txtQuant').val();
	var txtValor = $('#txtValCompra').val();


		var qtde = parseFloat(txtQtde);
		var valor = parseFloat(txtValor);
		valorTotal = parseFloat(valor / qtde);


	$('#txtValUnit').val(valorTotal);

}
