<?php

$cedcli=$_POST["cedcli"];
$producto=$_POST["producto"];
$fechafin=$_POST["fechafin"];
$valor=$_POST["valor"];
$fechaini=date("Y-m-d");
$estado="credito";

try{
require_once("conexion.php");
$base=conectar::conexion();

//Buscando usuario online
$sqlusu="SELECT idUsuario from usuarios where online=1";
$resultado=$base->prepare($sqlusu);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
      $usuario= $registro['idUsuario'];
}

$sqlcli="SELECT idCliente from cliente where cedula=$cedcli";
$rescli=$base->prepare($sqlcli);
$rescli->execute(array());

while($registro=$rescli->fetch(PDO::FETCH_ASSOC)){
      $cedcli=$registro['idCliente'];
}

//Ingresando registros en la tabla credito
$sql="INSERT INTO credito (idCliente,idUsuario,idInventario,fechaInicio,fechaFin,valor,estado) VALUES (:cedcli,:usuario,:producto,:fechaini,:fechafin,:valor,:estado)";
$resultado=$base->prepare($sql);
$resultado->execute(array(":cedcli"=>$cedcli, ":usuario"=>$usuario,":producto"=>$producto,":fechaini"=>$fechaini,":fechafin"=>$fechafin,":valor"=>$valor,":estado"=>$estado));

//Actualizando el estado del producto en invetario
$sqlEst="UPDATE inventario SET estado=:estado WHERE idInventario=:producto";
$resultado=$base->prepare($sqlEst);
$resultado->execute(array(":estado"=>$estado, ":producto"=>$producto));

//Inserccion en tabla detalleVenta
$sqlcre="SELECT idCredito from credito where idInventario=$producto";
$resultado=$base->prepare($sqlcre);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
      $idcredito=$registro['idCredito'];
}

$sqldetalle="INSERT INTO detalleVenta(idCredito,idInventario) VALUES (:idcredito,:producto)";
$resultado=$base->prepare($sqldetalle);
$resultado->execute(array(":idcredito"=>$idcredito, ":producto"=>$producto));


header("location:../index.php?exitocre");

}catch(Exception $e){
  header("location:../index.php?errorcre");
}



 ?>
