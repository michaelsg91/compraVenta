<?php
try{

echo  "<option value=''>-- Elige una opción --</option>";

require_once("conexion.php");
$base=conectar::conexion();

$departamento=$_GET['tipoDep'];
$sql="SELECT * FROM ciudades WHERE idDepartamento=$departamento";
$resultado=$base->prepare($sql);
$resultado->execute(array());


while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
  echo  "<option value='". $registro['idCiudad'] ."'>". $registro['nombreCiudad'] ."</option>";
  }

}catch(Exception $e){
  echo "Linea del error: " . $e->getLine();
}

 ?>
