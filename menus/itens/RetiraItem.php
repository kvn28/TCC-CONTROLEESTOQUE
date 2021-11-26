<?php

$localhost = "localhost";
$root = "root";
$passwd = "12345";
$database = "tcc_controleestoque";
$SQL;
$SQL = mysqli_connect($localhost, $root, $passwd);
mysqli_select_db($SQL, $database);
$PROD = $_POST['produto'];
$QUANT = $_POST['quantidade'];
$USERID = $_POST['user'];
$IDITEM = $_POST['item'];


$query = "SELECT `IDMOV` FROM `movimentos` ORDER BY `IDMOV` DESC  LIMIT 1 ";
$result = mysqli_query($SQL, $query) or die(mysqli_error($SQL));
if ($row = mysqli_fetch_array($result) or die(mysqli_error($SQL))) {
    $MOV = $row["IDMOV"] + 1;
    $DTMOV = date('Ymd');

        mysqli_query($SQL, "CALL alteraSaldo('$MOV','$QUANT', $DTMOV,'$PROD','$USERID','S','$IDITEM')") or die("Query fail: " . mysqli_error($SQL));

  echo '1';
} else {
  echo mysqli_error($SQL);
}

