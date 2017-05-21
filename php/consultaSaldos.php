<?php

$confecha=date("Y-m-d",strtotime('-1 day'));
//$confecha=date("Y-m-d");

try{

$sqlconVenta="SELECT sum(valor) as valor from saldos where fecha='$confecha' and tipo='venta'";
$sqlconCredito="SELECT sum(valor) as suma from saldos where fecha='$confecha' and tipo='abonoCredito'";
$sqlconEmpeno="SELECT sum(valor) as suma from saldos where fecha='$confecha' and tipo='empeno'";
$sqlconAbonoEmpeno="SELECT sum(valor) as suma from saldos where fecha='$confecha' and tipo='abonoEmpeno'";

//------- Venta -------------------------------
$resconven=$base->prepare($sqlconVenta);
$resconven->execute(array());

while($registro=$resconven->fetch(PDO::FETCH_ASSOC)){
      $conventa=$registro['valor'];
}

//----- Credito ---------------------------------------
$resconcre=$base->prepare($sqlconCredito);
$resconcre->execute(array());

while($registro=$resconcre->fetch(PDO::FETCH_ASSOC)){
      $concredito=$registro['suma'];
}

//----- Empeno ----------------------------------------------
$resconemp=$base->prepare($sqlconEmpeno);
$resconemp->execute(array());

while($registro=$resconemp->fetch(PDO::FETCH_ASSOC)){
      $conempeno=$registro['suma'];
}

//-----  Abono Credito -------------------------------------
$resconabo=$base->prepare($sqlconAbonoEmpeno);
$resconabo->execute(array());

while($registro=$resconabo->fetch(PDO::FETCH_ASSOC)){
      $conabonoEmpeno=$registro['suma'];
}



}catch(Exception $e){
  //header("location:../abonoCredito.php?error");
}






 ?>
