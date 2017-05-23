<?php
try{
require_once("conexion.php");
$base=conectar::conexion();


$sqlPro="SELECT idInventario,nombre from articulo,inventario where articulo.idArticulo=inventario.idInventario and estado='inventario' order by idInventario";
$sqlcre="SELECT * FROM credito where estado='credito' or estado='vencido'";
$sqlciu="SELECT * from ciudad";
$sqlart="SELECT * from tipoArticulo";
$sqlemp="SELECT idArticulo,nombre from articulo where idArticulo not in (select idArticulo from inventario) and idArticulo not in (select idArticulo from empenos)";
$sqlinv="SELECT idArticulo,nombre from articulo where idArticulo not in (select idArticulo from empenos where estado='empeno') and idArticulo not in (select idArticulo from empenos where estado='finalizado') and idArticulo not in (select idArticulo from inventario)";
$sqlaboemp="SELECT idEmpeno from empenos where estado='empeno'";

$sqlvenciemp="UPDATE empenos set estado='vencido' where estado='empeno' and fechaRetiro<now()";
$sqlvencicre="UPDATE credito set estado='vencido' where estado='credito' and fechaFin<now()";


$resultado10=$base->prepare($sqlvenciemp);
$resultado10->execute(array());

$resultado11=$base->prepare($sqlvencicre);
$resultado11->execute(array());

$resultado2=$base->prepare($sqlPro);
$resultado2->execute(array());

$resultado3=$base->prepare($sqlcre);
$resultado3->execute(array());

$resultado4=$base->prepare($sqlciu);
$resultado4->execute(array());

$resultado6=$base->prepare($sqlart);
$resultado6->execute(array());

$resultado7=$base->prepare($sqlemp);
$resultado7->execute(array());

$resultado8=$base->prepare($sqlinv);
$resultado8->execute(array());

$resultado9=$base->prepare($sqlaboemp);
$resultado9->execute(array());



$sqlusu="SELECT usuario from usuarios where online=1";
$resultado5=$base->prepare($sqlusu);
$resultado5->execute(array());

while($registro=$resultado5->fetch(PDO::FETCH_ASSOC)){
      $usuario= $registro['usuario'];
}

if($usuario==null){
  header("location:../login.php");
}

//Consulta saldos


$confecha=date("Y-m-d",strtotime('-1 day'));
//$confecha=date("Y-m-d");

$sqlconVenta="SELECT sum(valor) as valor from saldos where fecha='$confecha' and tipo='venta'";
$sqlconCredito="SELECT sum(valor) as suma from saldos where fecha='$confecha' and tipo='abonoCredito'";
$sqlconEmpeno="SELECT sum(valor) as suma from saldos where fecha='$confecha' and tipo='empeno'";
$sqlconAbonoEmpeno="SELECT sum(valor) as suma from saldos where fecha='$confecha' and tipo='abonoEmpeno'";

//------- Venta -------------------------------
$resconven=$base->prepare($sqlconVenta);
$resconven->execute(array());

while($registro=$resconven->fetch(PDO::FETCH_ASSOC)){
      $conventa=$registro['valor'];
}

//----- Credito ---------------------------------------
$resconcre=$base->prepare($sqlconCredito);
$resconcre->execute(array());

while($registro=$resconcre->fetch(PDO::FETCH_ASSOC)){
      $concredito=$registro['suma'];
}

//----- Empeno ----------------------------------------------
$resconemp=$base->prepare($sqlconEmpeno);
$resconemp->execute(array());

while($registro=$resconemp->fetch(PDO::FETCH_ASSOC)){
      $conempeno=$registro['suma'];
}

//-----  Abono Credito -------------------------------------
$resconabo=$base->prepare($sqlconAbonoEmpeno);
$resconabo->execute(array());

while($registro=$resconabo->fetch(PDO::FETCH_ASSOC)){
      $conabonoEmpeno=$registro['suma'];
}


  }catch(Exception $e){
    echo "Linea del error: " . $e->getLine();
  }



 ?>
