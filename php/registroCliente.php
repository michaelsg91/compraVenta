<?php

$cedula=$_POST["cedula"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$telefono=$_POST["telefono"];
$ciudad=$_POST["ciudad"];

try{
require_once("conexion.php");
$base=conectar::conexion();

//Ingresando registros en la tabla credito
$sql="INSERT INTO cliente (cedula,nombre,apellido,telefono,idCiudad) VALUES (:cedula,:nombre,:apellido,:telefono,:ciudad)";
$resultado=$base->prepare($sql);
$resultado->execute(array(":cedula"=>$cedula, ":nombre"=>$nombre,":apellido"=>$apellido,":telefono"=>$telefono,":ciudad"=>$ciudad));

header("location:../index.php?exitocli");

}catch(Exception $e){
  header("location:../index.php?errorcli");
}



 ?>
