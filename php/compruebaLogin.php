<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>


<?php

try{

	$login=htmlentities(addslashes($_POST["login"]));

	$password=htmlentities(addslashes($_POST["password"]));

	$contador=0;


	require_once("conexion.php");
	$base=conectar::conexion();


	$sql="SELECT * FROM usuarios WHERE usuario= :login";

	$resultado=$base->prepare($sql);

	$resultado->execute(array(":login"=>$login));

		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

			if(password_verify($password, $registro['password'])){
				$contador++;
			}

		}

		if($contador>0){
			$online=1;
			$sqlOnl="UPDATE usuarios SET online=:online WHERE usuario=:login";
			$resultado=$base->prepare($sqlOnl);
			$resultado->execute(array(":online"=>$online, ":login"=>$login));
			header("location:../index.php");
		}else{
			header("location:../login.php?error");
		}




		$resultado->closeCursor();



}catch(Exception $e){

	die("Error: " . $e->getMessage());



}




?>
</body>
</html>
