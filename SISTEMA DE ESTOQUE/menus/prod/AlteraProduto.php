<?php

$localhost = "localhost";
$root = "root";
$passwd = "12345";
$database = "tcc_controleestoque";
$SQL;
$SQL = mysqli_connect($localhost, $root, $passwd);
mysqli_select_db($SQL, $database);

$IdProd = $_POST['ID'];
$Desc = $_POST['Desc'];
$EMinimo = $_POST['estoquemin'];
$EMedio = $_POST['estoquemed'];
$EMaximo = $_POST['estoquemax'];
$PossuiVencimento = $_POST['PVenct'];

$query = "UPDATE `produtos` SET `DESCRI` = '$Desc', `PVENCT` = '$PossuiVencimento', `ESTMAX` = '$EMaximo', ESTMED = '$EMedio', ESTMIN = '$EMinimo'  WHERE `IDPROD` = '$IdProd'";
if ($result = mysqli_query($SQL, $query) or die(mysqli_error($SQL))) {

  echo '1';
} else {
  echo mysqli_error($SQL);
}
