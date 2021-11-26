<?php

$localhost = "localhost";
$root = "root";
$passwd = "12345";
$database = "tcc_controleestoque";
$SQL;
$SQL = mysqli_connect($localhost, $root, $passwd);
mysqli_select_db($SQL, $database);
$PROD = $_POST['ID'];
$FORNECEDOR = $_POST['Fornecedor'];
$QUANT = $_POST['Quant'];
$VALCOMPRA = $_POST['ValCompra'];
$VALUNIT = $_POST['ValUnit'];
$VALVENDA = $_POST['ValVenda'];
$DTCOMPRA =$_POST['DtCompra'];
$DTVENCT = $_POST['DtVenct'];

$query = "SELECT `IDITEM`,`IDMOV`,(SELECT `IDPROD` FROM `saldo` WHERE `IDPROD`= $PROD) AS 'PROD' FROM `itens`,`movimentos` WHERE `D_E_L_E_T_` IS NULL ORDER BY `IDITEM` DESC,`IDMOV` DESC  LIMIT 1";
$result = mysqli_query($SQL, $query) or die(mysqli_error($SQL));
if ($row = mysqli_fetch_array($result) or die(mysqli_error($SQL))) {
  if($row['IDITEM'] != ''){
    $ITEM = $row["IDITEM"] + 1;
    
  }else{
    $ITEM = 1;
  }
  if($row['IDMOV'] != ''){
    $MOV = $row["IDMOV"] + 1;
    
  }
  else{
    $MOV =  1;
  }
    $TIPO = 'E';

    if ($row["PROD"] === NULL) {
        mysqli_query($SQL, "CALL insereMovimentos('$ITEM','$QUANT','$DTCOMPRA','$DTVENCT','$PROD','2',$MOV,'$TIPO','$FORNECEDOR','$VALCOMPRA','$VALUNIT','$VALVENDA')") or die("Query fail: " . mysqli_error($SQL));
      } else {
        mysqli_query($SQL, "CALL alteraMovimento('$ITEM','$QUANT','$DTCOMPRA','$DTVENCT','$PROD','2',$MOV,'$TIPO','$FORNECEDOR','$VALCOMPRA','$VALUNIT','$VALVENDA')") or die("Query fail: " . mysqli_error($SQL));
      }


  echo '1,'. $ITEM;
} else {
  echo $row['IDITEM'];
}


 