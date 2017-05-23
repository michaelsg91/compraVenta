<?php

$peso=$_POST["peso"];
$nombre=$_POST["nombre"];
$tipo=$_POST["tipo"];
$fecha=date("Y-m-d");

try{
require_once("conexion.php");
$base=conectar::conexion();

//Ingresando registros en la tabla credito
$sql="INSERT INTO articulo (peso,nombre,idTipoArticulo,fecha) VALUES (:peso,:nombre,:tipo,:fecha)";
$resultado=$base->prepare($sql);
$resultado->execute(array(":peso"=>$peso, ":nombre"=>$nombre,":tipo"=>$tipo,":fecha"=>$fecha));

header("location:../index.php?ex");

}catch(Exception $e){
  header("location:../index.php?error");
}



 ?>
