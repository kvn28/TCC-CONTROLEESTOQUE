<?php

$localhost = "localhost";
$root = "root";
$passwd = "12345";
$database = "tcc_controleestoque";
$SQL;
$SQL = mysqli_connect($localhost, $root, $passwd);
mysqli_select_db($SQL, $database);

$ID = $_POST['descricao'];
$EMinimo = $_POST['estoquemin'];
$EMedio = $_POST['estoquemed'];
$EMaximo = $_POST['estoquemax'];
$PossuiVencimento = $_POST['PVenct'];
$UM = $_POST['um'];
$User = $_POST['user'];


$query = "INSERT INTO `produtos`(`IDPROD`, `DESCRI`,`USERID`,`DTINCLU`,`ESTMAX`,`ESTMED`,`ESTMIN`,`PVENCT`,`UM`) VALUES (NULL,'$ID', '$User', CURRENT_TIMESTAMP,'$EMaximo','$EMedio','$EMinimo','$PossuiVencimento','$UM')";
if ($result = mysqli_query($SQL, $query) or die(mysqli_error($SQL))) {

  echo '1';
} else {
  echo mysqli_error($SQL);
}
