<?php
$cedcli=$_POST["cedcli"];
$producto=$_POST["producto"];
$valor=$_POST["valor"];
$fecha=date("Y-m-d");

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


//Insertando registros en la tabla venta
$sqlingven="INSERT INTO venta (idCliente,idUsuario,idInventario,fecha,valor) VALUES (:doccli,:usuario,:producto,:fecha,:valor)";
$resingven=$base->prepare($sqlingven);
$resingven->execute(array(":doccli"=>$cedcli, ":usuario"=>$usuario,":producto"=>$producto,":fecha"=>$fecha,":valor"=>$valor));

//Insertando valores en la tabla saldos
$tipo="venta";
$sqlSaldos="INSERT INTO saldos (fecha,valor,tipo) VALUES (:fecha,:valor,:tipo)";
$ressal=$base->prepare($sqlSaldos);
$ressal->execute(array(":fecha"=>$fecha, ":valor"=>$valor,":tipo"=>$tipo));

//Actualizando el estado del producto en invetario
$estado="venta";
$sqlEst="UPDATE inventario SET estado=:estado WHERE idInventario=:producto";
$resest=$base->prepare($sqlEst);
$resest->execute(array(":estado"=>$estado, ":producto"=>$producto));


//Inserccion en tabla detalleVenta
$sqlven="SELECT idVenta from venta where idInventario=$producto";
$resven=$base->prepare($sqlven);
$resven->execute(array());

while($registro=$resven->fetch(PDO::FETCH_ASSOC)){
      $idventa=$registro['idVenta'];
}

$sqldetalle="INSERT INTO detalleVenta(idVenta,idInventario) VALUES (:idventa,:producto)";
$resdet=$base->prepare($sqldetalle);
$resdet->execute(array(":idventa"=>$idventa, ":producto"=>$producto));


header("location:../index.php?exitoven");

}catch(Exception $e){
  header("location:../index.php?errorven");
}

?>
