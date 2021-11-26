<?php

$localhost = "localhost";
$root = "root";
$passwd = "12345";
$database = "tcc_controleestoque";
$SQL;
$SQL = mysqli_connect($localhost, $root, $passwd);
mysqli_select_db($SQL, $database);
$PROD = $_POST['produto'];
$FORNECEDOR = $_POST['fornecedor'];
$QUANT = $_POST['quantidade'];
$VALCOMPRA = $_POST['valcompra'];
$VALUNIT = $_POST['valunitario'];
$VALVENDA = $_POST['valvenda'];
$DTCOMPRA =$_POST['datacompra'];
$DTVENCT = $_POST['datavencto'];
$USER = $_POST['user'];

$query = "SELECT `IDITEM`,`IDMOV`,(SELECT `IDPROD` FROM `saldo` WHERE `IDPROD`= $PROD) AS 'PROD' FROM `itens`,`movimentos` WHERE `D_E_L_E_T_` IS NULL ORDER BY `IDITEM` DESC,`IDMOV` DESC  LIMIT 1";
$result = mysqli_query($SQL, $query) or die(mysqli_error($SQL));
if ($row = mysqli_fetch_array($result) or die(mysqli_error($this->SQL))) {
    if($row['IDITEM'] === NULL){
      $ITEM = 1;
    }else{
      $ITEM = $row["IDITEM"] + 1;
    }
    if($row['IDMOV'] === NULL){
      $MOV =  1;
    }
    else{
      $MOV = $row["IDMOV"] + 1;
    }
    
    $TIPO = 'E';

    if ($row["PROD"] === NULL) {
        mysqli_query($SQL, "CALL insereMovimentos('$ITEM','$QUANT','$DTCOMPRA','$DTVENCT','$PROD','$USER',$MOV,'$TIPO','$FORNECEDOR','$VALCOMPRA','$VALUNIT','$VALVENDA')") or die("Query fail: " . mysqli_error($SQL));
      } else {
        mysqli_query($SQL, "CALL alteraMovimento('$ITEM','$QUANT','$DTCOMPRA','$DTVENCT','$PROD','$USER',$MOV,'$TIPO','$FORNECEDOR','$VALCOMPRA','$VALUNIT','$VALVENDA')") or die("Query fail: " . mysqli_error($SQL));
      }


  echo '1';
} else {
  echo mysqli_error($SQL);
}


 