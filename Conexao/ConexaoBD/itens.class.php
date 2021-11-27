  <?php

  /*
   Class produtos
  */

  require_once 'connect.php';
  require_once '../../layout/script.php';
  class Itens extends Connect
  {

    public function listItens($idprodutos)
    {
      $query = "SELECT * FROM `itens` INNER JOIN `produtos` ON produtos.`IDPROD` = itens.`PROD` AND produtos.`D_E_L_E_T_` IS NULL WHERE (`PROD` = '$idprodutos') ";
      $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
      $q = 0;

      while ($rowlist = mysqli_fetch_array($result)) {

        $q = $q + $rowlist['QUANT'];
        $NomeProduto = $rowlist['DESCRI'];
        $Vencimento = $rowlist['DTVENCT'];
      }

      return array('NomeProduto' => $NomeProduto, 'Quant' => $q,  'Vencimento' => $Vencimento,);
    }

    public function totalitens()
    {
      $this->query = "SELECT `QUANT`,prod.`IDPROD`,`DESCRI` FROM `saldo`  as `sald` INNER JOIN `produtos` as `prod` on prod.`IDPROD` = sald.`IDPROD` AND `D_E_L_E_T_` IS NULL GROUP BY `IDPROD`,`QUANT`,`DESCRI`";
      $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
      while ($row = mysqli_fetch_array($this->result)) {

        echo '<li>';
        echo '<b> Produto: ' . $row['IDPROD'] . ' - ' . $row['DESCRI']  . '</b> = ';
        echo 'Saldo em Estoque: ' . $row['QUANT'];
        echo '</li>';
      }
    }

    public function index()
    {
      $this->query = "SELECT * FROM `itens` INNER JOIN `produtos` ON itens.`PROD` = produtos.`IDPROD` AND produtos.`D_E_L_E_T_` IS NULL WHERE itens.`D_E_L_E_T_` IS NULL AND ((`ENCERR` !='E') OR (`ENCERR` IS NULL)) ORDER BY `DESCRI`";
      $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));

      if ($this->result) {

        echo '<table id="example1" class="table">
    <thead>
      <tr>
 
        <th><center>ID</center></th>
        <th><center>Nome Produto</center></th>
        <th><center>Fornecedor</center></th>
        <th><center>Quant. Estoque</center></th>
        <th><center>Data Compra</center></th>
        <th><center>Data Vencimento</center></th>
        <th><center>Valor Compra</center></th>
        <th><center>Valor Venda</center></th>
        <th><center>Retirada de Item</center></th>
      </tr>
    </thead>
    <tbody>';

        while ($row = mysqli_fetch_array($this->result)) {

          //INÍCIO FORMATAÇÃO DE DATA
          $dataAtual = date("Y-m-d");
          $intervalo = new DateInterval('P1M');
          $Dataatual = new DateTime($row['DTVENCT']);
          $subtraido = date_sub($Dataatual, $intervalo);
          $Avencer = $subtraido->format('Y-m-d');
          $compra = new DateTime($row['DTCOMPRA']);
          $dataCompra = $compra->format('d/m/Y');
          //FIM FORMATAÇÃO DE DATA

          $Item = $row['IDITEM'].','.$row['DESCRI'];


          echo '<td><center>' . $row['IDITEM'] . '</center></td>
          <td><center>' . $row['DESCRI'] . '</center></td>
          <td><center>' . $row['FORNEC'] . '</center></td>
          <td><center>' . $row['QUANT'] . '</center></td> 
          <td><center>' . $dataCompra . '</center></td>';

          $vencto = new DateTime($row['DTVENCT']);
          $formatado = $vencto->format('d/m/Y');
          if ($row['PVENCT'] === 'S') {
            if (($dataAtual < $row['DTVENCT']) & ($dataAtual >= $Avencer)) {
              echo '<td><center><b><span style="color:orange">' . $formatado  . '<span></b></center></td>';
            } else if ($dataAtual > $row['DTVENCT']) {
              echo '<td><center><b><span style="color:red">' .  $formatado . '<span></b></center></td>';
            } else {
              echo  '<td><center><b><span style="color:green">' . $formatado . '<span></b></center></td>';
            }
          } else {
            echo  '<td><center><b><span style="color:green">Não Possui Vencimento<span></b></center></td>';
          }
          echo '
          <td><center>' . $row['VLUNIT'] . '</center></td>
          <td><center>' . $row['VLVEND']  . '</center></td>
          <td>
                <a href="retiradaItens.php?q=' . $row['IDITEM'] . '"><center><i class="fa fa-sign-out"></i></center></a>
          </td>';

          echo '
            </tr>';
        }
        echo '</tbody>
  </table>';
      }
    }

    public function editItens($value)
    { 

      $this->query = "SELECT *FROM `itens` WHERE `IDITEM` = '$value'";
      $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));

      if ($row = mysqli_fetch_array($this->result)) {

        $idItens = $row['IDITEM'];
        $QuantItens = $row['QUANT'];
        $DataCompraItens = $row['DTCOMPRA'];
        $DataVenci_Itens = $row['DTVENCT'];
        $PROD = $row['PROD'];
        return $resp = array('Itens' => [

          'IDITEM' => $idItens,
          'QUANT'   => $QuantItens,
          'DTCOMPRA' => $DataCompraItens,
          'DTVENCT' => $DataVenci_Itens,
          'PROD' => $PROD
        ],);
      }
    }

  }

  $itens = new Itens;
