<?php

$empeno=$_POST["empeno"];
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
$sql="INSERT INTO abonoEmpeno (idUsuario,idEmpeno,fechaAbono,valorAbono) VALUES (:usuario,:empeno,:fecha,:valor)";
$resultado=$base->prepare($sql);
$resultado->execute(array(":usuario"=>$usuario,":empeno"=>$empeno,":fecha"=>$fecha,":valor"=>$valor));


//Insertando valores en la tabla saldos
$tipo="abonoEmpeno";
$sqlSaldos="INSERT INTO saldos (fecha,valor,tipo) VALUES (:fecha,:valor,:tipo)";
$resultado=$base->prepare($sqlSaldos);
$resultado->execute(array(":fecha"=>$fecha, ":valor"=>$valor,":tipo"=>$tipo));


//Comprueba si el empeno ya ha sido candelado
$sqlval="SELECT valorRecibir from empenos where idEmpeno=$empeno";
$resultado=$base->prepare($sqlval);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
      $valor=$registro['valorRecibir'];
}

$sqlsum="SELECT sum(valorAbono) as suma from abonoEmpeno where idEmpeno=$empeno";
$resultado=$base->prepare($sqlsum);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
      $suma=$registro['suma'];
}

if($suma==$valor || $suma>$valor){
  $estado="finalizado";
  $sqlEst="UPDATE empenos SET estado=:estado WHERE idEmpeno=:empeno";
  $resultado=$base->prepare($sqlEst);
  $resultado->execute(array(":estado"=>$estado, ":empeno"=>$empeno));
}


header("location:../index.php?ex");

}catch(Exception $e){
  header("location:../index.php?error");
}



 ?>
