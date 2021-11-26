  <?php

  require_once 'connect.php';
  require_once '../../layout/script.php';
  class Produtos extends Connect
  {

    public function index()
    {
      $this->query = "SELECT produtos.`IDPROD`,`DESCRI`,`PVENCT`,`ESTMAX`,`ESTMED`,`ESTMIN`,`UM`,saldo.`QUANT` FROM `produtos` LEFT JOIN `saldo` ON produtos.`IDPROD` = saldo.`IDPROD` WHERE `D_E_L_E_T_`IS NULL  ORDER BY `DESCRI`";
      $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));

      if ($this->result) {
        echo '<table id="example1" class="table">
        <thead>
          <tr>
     
            <th><center>ID</center></th>
            <th><center>Nome Produto</center></th>
            <th><center>Estoque Mínimo</center></th>
            <th><center>Estoque Médio</center></th>
            <th><center>Estoque Máximo</center></th>
            <th><center>Saldo Atual</center></th>
            <th><center>Unidade de Medida</center></th>
            <th><center>Possui Vencimento?</center></th>
            <th><center>Editar Produto</center></th>
            <th><center>Adicionar Item</center></th>
            <th><center>Excluir Produto</center></th>

          </tr>
        </thead> 
        <tbody>';
        while ($row = mysqli_fetch_array($this->result)) {


          $Item = $row['IDPROD'].','.$row['DESCRI']. ',' .$row['ESTMIN'].','.$row['ESTMED']. ',' .$row['ESTMAX']. ',' . $row['UM']. ',' . $row['PVENCT'];
          echo '
          <td><center>' . $row['IDPROD'] . '</center></td>
          <td><center>' . $row['DESCRI'] . '</center></td>
          <td><center>' . $row['ESTMIN'] . '</center></td>
          <td><center>' . $row['ESTMED'] . '</center></td>
          <td><center>' . $row['ESTMAX'] . '</center></td>';
          if($row['QUANT'] >= $row['ESTMAX']){
            echo '<td><center><b><span style="color:green">' . $row['QUANT'] . '<span></b></center></td>';
          }
          else if(($row['QUANT'] >= $row['ESTMED']) & ($row['QUANT'] < $row['ESTMAX'])){
            echo '<td><center><b><span style="color:brown">' . $row['QUANT'] . '<span></b></center></td>';
          }
          else if(($row['QUANT'] >= $row['ESTMIN']) & ($row['QUANT'] < $row['ESTMED'])){
            echo '<td><center><b><span style="color:orange">' . $row['QUANT'] . '<span></b></center></td>';
          }
          else if($row['QUANT'] < $row['ESTMIN']){
            echo '<td><center><b><span style="color:red">' . $row['QUANT'] . '<span></b></center></td>';
          }
          echo '
          <td><center>' . $row['UM'] . '</center></td>';
          if($row['PVENCT'] === 'S'){
          echo '<td><center>Sim</center></td>';
          }
          else{ 
          echo   '<td><center>Não</center></td>';
          }
          echo '<td><center><a onclick="EditaProduto(\'' . $Item. '\')"><i class="fa fa-edit"></i></a></center></td>
          <td><center><a onclick="AdicionaItem(\'' . $Item. '\')"><i class="fa fa-plus" title="Será Adicionado um Item em estoque com o produto selecionado."></i></a></center></td>
          <td><center><a  onclick="ExcluiProduto(\''. $Item . '\')"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></a> </div></center></td>
          </td>
          </tr>    ';}
         echo' </tbody>
          </table>';


       
      }
    }
 
    public function listProdutos($value)
    {

      $this->query = "SELECT *FROM `produtos` WHERE `D_E_L_E_T_` IS NULL ORDER BY `DESCRI`";
      $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));

      if ($this->result) {

          echo '<option value=""></option>';
        while ($row = mysqli_fetch_array($this->result)) {
          if ($value == $row['IDPROD']) {
            $selected = "selected";
          } else {
            $selected = "";
          }
          
          echo '<option value="' . $row['IDPROD'] . ','. $row['PVENCT'].'" ' . $selected . ' >' . $row['DESCRI'] . '</option>';
        }
      }
    }


  }

  $produtos = new Produtos;
