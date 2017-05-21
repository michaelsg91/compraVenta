<?php
$cedcli=$_POST["cedcli"];
$articulo=$_POST["articulo"];
$valor=$_POST["valor"];
$fecha=date("Y-m-d");
$empfin=$_POST["empfin"];
$estado="empeno";
$valorre=$_POST["valorre"];

try{
require_once("conexion.php");
$base=conectar::conexion();

//Buscando que usuario hizo la accion
$sqlusu="SELECT idUsuario from usuarios where online=1";
$resusu=$base->prepare($sqlusu);
$resusu->execute(array());

while($registro=$resusu->fetch(PDO::FETCH_ASSOC)){
      $usuario=$registro['idUsuario'];
}

$sqlcli="SELECT idCliente from cliente where cedula=$cedcli";
$rescli=$base->prepare($sqlcli);
$rescli->execute(array());

while($registro=$rescli->fetch(PDO::FETCH_ASSOC)){
      $idcli=$registro['idCliente'];
}


//Insertando registros en la tabla empenos
$sqlingven="INSERT INTO empenos (idCliente,idUsuario,idArticulo,fechaIngreso,fechaRetiro,valorEmpeno,estado,valorRecibir) VALUES (:doccli,:usuario,:articulo,:fecha,:fecharetiro,:valor,:estado,:valorre)";
$resingven=$base->prepare($sqlingven);
$resingven->execute(array(":doccli"=>$idcli, ":usuario"=>$usuario,":articulo"=>$articulo,":fecha"=>$fecha,":fecharetiro"=>$empfin,":valor"=>$valor,":estado"=>$estado,":valorre"=>$valorre));

//Insertando valores en la tabla saldos
$tipo="empeno";
$sqlSaldos="INSERT INTO saldos (fecha,valor,tipo) VALUES (:fecha,:valor,:tipo)";
$ressal=$base->prepare($sqlSaldos);
$ressal->execute(array(":fecha"=>$fecha, ":valor"=>$valor,":tipo"=>$tipo));

header("location:../index.php?exitoemp");

}catch(Exception $e){
  echo $e->getMessage();
  echo "Linea del error ". $e->getLine();
//  header("location:../index.php?erroremp");
}

?>
