<?php
$articulo=$_POST["articulo"];
$valorcompra=$_POST["valorcompra"];
$valorvender=$_POST["valorvender"];
$fecha=date("Y-m-d");
$estado="inventario";

try{
require_once("conexion.php");
$base=conectar::conexion();


//Insertando registros en la tabla inventario
$sqlinven="INSERT INTO inventario (idArticulo,valorCompra,valorVender,estado,fechaCompra) VALUES (:articulo,:valorcompra,:valorvender,:estado,:fecha)";
$resinven=$base->prepare($sqlinven);
$resinven->execute(array(":articulo"=>$articulo, ":valorcompra"=>$valorcompra,":valorvender"=>$valorvender,":fecha"=>$fecha,":estado"=>$estado));


header("location:../index.php?ex");

}catch(Exception $e){
  header("location:../index.php?error");
}

?>
