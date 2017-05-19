<?php
$cedula=$_POST["cedula"];
$sueldo=$_POST["sueldo"];
$dias=$_POST["dias"];

try{
require_once("conexion.php");
$base=conectar::conexion();

$sql="SELECT prima,subsidio from sueldo where sueldo=:sueldo";

$resultado=$base->prepare($sql);

$resultado->execute(array(":sueldo"=>$sueldo));
while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
  $prima=$registro['prima'];
  $subsidio=$registro['subsidio'];
  }
if($prima!=null){
  $consulta=new devuelveSueldo();

  $consulta->setsueldo($sueldo);
  $consulta->setdias($dias);
  $consulta->setcedula($cedula);
  $consulta->setprima($prima);
  $consulta->setsubsidio($subsidio);
  $consulta->settotal();
  //echo $consulta->getprima() . "<br>";
  //echo $consulta->getsueldo() . "<br>";
  //echo $consulta->getsubsisdio() . "<br>";
  echo "<p> Cédula:  " . $consulta->getcedula() . "</p>";
  echo "<p> Días:  ". $consulta->getdias() . "</p>";
  echo "<p> Total:  " . $consulta->gettotal() . "</p>";

}else{
  header("location:../sueldo.php?error");
}


}catch(Exception $e){
  header("location:../sueldo.php?error");
}

class devuelveSueldo{
  private $prima,$subsidio,$sueldo,$dias,$total,$cedula;
  function setprima($prima){
    $this->prima=$prima*$this->sueldo;
  }
  function getprima(){
    return $this->prima;
  }
  function setsubsidio($subsidio){
    $this->subsidio=$subsidio;
  }
  function getsubsisdio(){
    return $this->subsidio;
  }
  function setsueldo($sueldo){
    $this->sueldo=$sueldo;
  }
  function getsueldo(){
    return $this->sueldo;
  }
  function setdias($dias){
    $this->dias=$dias;
  }
  function getdias(){
    return $this->dias;
  }
  function settotal(){
    $this->total=($this->sueldo+$this->subsidio+$this->prima)*$this->dias/30;
  }
  function gettotal(){
    return  $this->total;
  }
  function setcedula($cedula){
    $this->cedula=$cedula;
  }
  function getcedula(){
    return $this->cedula;
  }
}


?>
