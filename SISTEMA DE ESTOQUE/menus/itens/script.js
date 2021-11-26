
function init() {
    $('#txtProduto').select2()
}
function salvaItem() {
    var valido = ValidaCampos()

    if (valido) {
        var prod = $('#txtProduto').val().split(',')[0]
        var vencto = $('#txtProduto').val().split(',')[1]
        var Fornecedor = $('#txtFornecedor').val()
        var Quantidade = $('#txtQuant').val()
        var ValCompra = $('#txtValCompra').val()
        var ValUnitario = $('#txtValUnitario').val()
        var ValVenda = $('#txtValVenda').val()
        var DataCompra = $('#txtDataCompra').val()
        if (vencto == 'S') {
            var DataVencto = $('#txtDataVencimento').val()
        }
        else {
            var DataVencto = '0000-00-00'
        }
        var Usuario = $('#txtUsuario').val()
        $.ajax({
            url: 'http://localhost/menus/itens/AdicionaItem.php',
            data: {
                produto: prod,
                fornecedor: Fornecedor,
                quantidade: Quantidade,
                valcompra: ValCompra,
                valunitario: ValUnitario,
                valvenda: ValVenda,
                datacompra: DataCompra,
                datavencto: DataVencto,
                user: Usuario
            },
            type: 'post',
            success: function (data) {
                if (data == '1') {
                    $(location).attr('href', 'http://localhost/menus/itens/index.php')
                    alert('Item Adicionado Com Sucesso')
                }
                else {

                    $(location).attr('href', 'http://localhost/menus/itens/index.php')
                    alert(data)
                }
            }
        });
    }
    else {
        bootbox.alert('Favor Preencher os Campos Obrigatórios')
    }
}


function validaVencto() {
    var produto = $('#txtProduto').val()
    var vencto = produto.split(',')[1]


    if (vencto == 'S') {
        $('#Vencto').show()
    }
    else {
        $('#Vencto').hide()
    }
}


function retiraItem() {
    var valido = ValidaCamposRetirada()

    if (valido) {
        var prod = $('#txtProduto').val().split(',')[0]
        var Quantidade = $('#txtQuant').val()
        var Usuario = $('#txtUsuario').val()
        var Saldo = $('#txtSaldo').val()
        var Item = $('#txtItem').val()
        if (Quantidade > Saldo) {
            bootbox.alert('Quantidade informada maior do que o saldo disponível em estoque.')
        }
        else {
            $.ajax({
                url: 'http://localhost/menus/itens/RetiraItem.php',
                data: {
                    produto: prod,
                    quantidade: Quantidade,
                    user: Usuario,
                    item: Item
                },
                type: 'post',
                success: function (data) {
                    if (data == '1') {
                        $(location).attr('href', 'http://localhost/menus/itens/index.php')
                        alert('Movimentação Realizada Com Sucesso')
                    }
                    else {

                        $(location).attr('href', 'http://localhost/menus/itens/index.php')
                        alert(data)
                    }
                }
            });
        }
    }
    else {
        bootbox.alert('Favor Preencher os Campos Obrigatórios')
    }
}


function ValidaCampos() {
    var vencto = $('#txtProduto').val().split(',')[1]

    CamposRequiridos = 'txtProduto,txtFornecedor,txtQuantidade,txtValCompra,txtValUnitario,txtValVenda,txtDataCompra';
    if (vencto == 'S') {
        CamposRequiridos += ',txtDataVencimento'
    }
    var Array = CamposRequiridos.split(',');
    $.each(Array, function (index, value) {
        $('#' + value).prop('required', true).css('border', '1px solid #3774aa');
        $('label[for=' + value + ']').html('<span style="color:red;font-weight:bolder">*</span>');
    });

    var Valido = true;

    $.each(Array, function (index, value) {
        if ($('#' + value).val() == '') {
            Valido = false;
            return Valido;
        }
    });

    return Valido;

}

function ValidaCamposRetirada() {


    CamposRequiridos = 'txtProduto,txtQuantidade';

    var Array = CamposRequiridos.split(',');
    $.each(Array, function (index, value) {
        $('#' + value).prop('required', true).css('border', '1px solid #3774aa');
        $('label[for=' + value + ']').html('<span style="color:red;font-weight:bolder">*</span>');
    });

    var Valido = true;

    $.each(Array, function (index, value) {
        if ($('#' + value).val() == '') {
            Valido = false;
            return Valido;
        }
    });

    return Valido;

}

function calcularValorUnitario() {

    var valorTotal = 0;

    var txtQtde = parseFloat($('#txtQuant').val());
    var txtValor = parseFloat($('#txtValCompra').val());

    valorTotal = parseFloat(txtValor / txtQtde);


    $('#txtValUnitario').val(valorTotal);

}
