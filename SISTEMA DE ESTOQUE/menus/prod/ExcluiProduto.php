<?php

$localhost = "localhost";
$root = "root";
$passwd = "12345";
$database = "tcc_controleestoque";
$SQL;
$SQL = mysqli_connect($localhost, $root, $passwd);
mysqli_select_db($SQL, $database);

$IdProd = $_POST['ID'];

$query = "UPDATE `produtos` SET `D_E_L_E_T_` = '*' WHERE `IDPROD` = '$IdProd'";
if ($result = mysqli_query($SQL, $query) or die(mysqli_error($SQL))) {

  echo '1';
} else {
  echo '2';
}
