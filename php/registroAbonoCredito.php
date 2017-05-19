<?php

$credito=$_POST["credito"];
$valor=$_POST["valor"];
$fecha=date("Y-m-d");

try{
require_once("conexion.php");
$base=conectar::conexion();

$sqlusu="SELECT idUsuario from usuarios where online=1";
$resultado=$base->prepare($sqlusu);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
      $usuario=$registro['idUsuario'];
}

//Insertando registros en la tabla abonoCredito
$sql="INSERT INTO abonoCredito (idUsuario,idCredito,fechaAbono,valor) VALUES (:usuario,:credito,:fecha,:valor)";
$resultado=$base->prepare($sql);
$resultado->execute(array(":usuario"=>$usuario,":credito"=>$credito,":fecha"=>$fecha,":valor"=>$valor));


//Insertando valores en la tabla saldos
$tipo="abonoCredito";
$sqlSaldos="INSERT INTO saldos (fecha,valor,tipo) VALUES (:fecha,:valor,:tipo)";
$resultado=$base->prepare($sqlSaldos);
$resultado->execute(array(":fecha"=>$fecha, ":valor"=>$valor,":tipo"=>$tipo));


//Comprueba si el credito ya ha sido candelado
$sqlval="SELECT valor from credito where idCredito=$credito";
$resultado=$base->prepare($sqlval);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
      $valor=$registro['valor'];
}

$sqlsum="SELECT sum(valor) as suma from abonoCredito where idCredito=$credito";
$resultado=$base->prepare($sqlsum);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
      $suma=$registro['suma'];
}

if($suma==$valor || $suma>$valor){
  $estado="finalizado";
  $sqlEst="UPDATE credito SET estado=:estado WHERE idCredito=:credito";
  $resultado=$base->prepare($sqlEst);
  $resultado->execute(array(":estado"=>$estado, ":credito"=>$credito));
}


header("location:../index.php?exitoabcre");

}catch(Exception $e){
  header("location:../index.php?errorabcre");
}



 ?>
