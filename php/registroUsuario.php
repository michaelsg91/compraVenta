<?php
try{
  require_once("conexion.php");
  $base=conectar::conexion();


$sqlusu="SELECT idUsuario from usuarios where online=1";
$resultado5=$base->prepare($sqlusu);
$resultado5->execute(array());

while($registro=$resultado5->fetch(PDO::FETCH_ASSOC)){
      $idusuario= $registro['idUsuario'];
}

if($idusuario==1){

$cedula=$_POST["cedula"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$usuario=$_POST["usuario"];
$contra=$_POST["contra"];
$pass_cifrado=password_hash($contra,PASSWORD_DEFAULT,array('cost' => 12));

$fechaC=date("Y-m-d");
$activo=1;
$online=0;


  $sql="INSERT INTO usuarios (cedula,usuario, password,fechaCreado,activo,online,nombre,apellido) VALUES (:cedula,:usu, :contra,:fechaC,:activo,:online,:nombre,:apellido)";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":cedula"=>$cedula,":usu"=>$usuario, ":contra"=>$pass_cifrado,":fechaC"=>$fechaC,":activo"=>$activo,":online"=>$online,":nombre"=>$nombre,":apellido"=>$apellido));

  $resultado->closeCursor();


  header("location:../index.php?ex");
}else{
  header("location:../index.php?error");
}

}catch(Exception $e){
  header("location:../index.php?error");

  echo "Línea del error: " . $e->getLine();

}finally{
  $base=null;
}


 ?>
