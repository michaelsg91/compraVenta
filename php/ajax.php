<?php
try{

require_once("conexion.php");
$base=conectar::conexion();

$numdoc=$_GET['num'];
$sql="SELECT * FROM registro WHERE numDocumento=$numdoc";
$resultado=$base->prepare($sql);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
  echo  "El número de documento ya existe";
}

}catch(Exception $e){
  echo "Formato no válido" . $e->getLine();
}

 ?>
