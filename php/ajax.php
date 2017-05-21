<?php
try{

require_once("conexion.php");
$base=conectar::conexion();

if(isset($_GET['num'])){


$numdoc=$_GET['num'];
$sql="SELECT * FROM cliente WHERE cedula=$numdoc";
$resultado=$base->prepare($sql);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
  echo  $registro['nombre'] . " " . $registro['apellido'];
}

}

if(isset($_GET["art"])){
$articulo=$_GET["art"];
$sql="SELECT * from inventario where idInventario=$articulo";
$resultado=$base->prepare($sql);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
  $valor=$registro['valorVender'];
  $fecha=$registro['fechaCompra'];
}
$fecha=date("d-m-Y",strtotime($fecha));
echo "(". $articulo . ")&nbsp;&nbsp;&nbsp;" . $valor . " &nbsp;&nbsp;&nbsp; " . $fecha;
}


if(isset($_GET["cre"])){
$credito=$_GET["cre"];
$sql="SELECT cliente.nombre as nomcli,articulo.nombre as nomart,apellido,fechaFin,credito.valor as valcre,sum(abonoCredito.valor) as valabo from cliente,credito,articulo,inventario,abonoCredito where cliente.idCliente=credito.idCredito and credito.idInventario=inventario.idInventario and inventario.idArticulo=articulo.idArticulo and abonoCredito.idCredito=credito.idCredito and credito.idCredito=$credito";
$resultado=$base->prepare($sql);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
  $nomcli=$registro['nomcli'];
  $apellido=$registro['apellido'];
  $nomart=$registro['nomart'];
  $valcre=$registro['valcre'];
  $valabo=$registro['valabo'];
  $fechaFin=$registro['fechaFin'];
}
$fechaFin=date("d-m-Y",strtotime($fechaFin));
echo $nomcli . "&nbsp;" . $apellido . "&nbsp;[" . $nomart . "]&nbsp;&nbsp;&nbsp;(" . $valabo . ")&nbsp;" . $valcre . "&nbsp;&nbsp;&nbsp;" . $fechaFin;
}


if(isset($_GET["emp"])){
$empeno=$_GET["emp"];
$sql="select cliente.nombre as nomcli,apellido,articulo.nombre as nomart,sum(valorAbono) as abono,valorRecibir,fechaRetiro from empenos,abonoEmpeno,articulo,cliente where empenos.idEmpeno=abonoEmpeno.idEmpeno and empenos.idArticulo=articulo.idArticulo and empenos.idCliente=cliente.idCliente and empenos.idEmpeno=$empeno";
$resultado=$base->prepare($sql);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
  $nomcli=$registro['nomcli'];
  $apellido=$registro['apellido'];
  $nomart=$registro['nomart'];
  $valemp=$registro['valorRecibir'];
  $abono=$registro['abono'];
  $fechaRetiro=$registro['fechaRetiro'];
}
$fechaRetiro=date("d-m-Y",strtotime($fechaRetiro));
echo $nomcli . "&nbsp;" . $apellido . "&nbsp;[" . $nomart . "]&nbsp;&nbsp;&nbsp;(" . $abono . ")&nbsp;" . $valemp . "&nbsp;&nbsp;&nbsp;" . $fechaRetiro;
}


}catch(Exception $e){

}

 ?>
