<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>

<link href="css/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>

<h2>Login Compra Venta</h2>

<form action="php/compruebaLogin.php" method="post">

<table>
<tr style="">
<td class="izq">Usuario:</td><td class="der"><input type="text" name="login"></td></tr>
<tr><td class="izq">Password:</td><td class="der"><input type="password" name="password"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="enviar" value="LOGIN"></td></tr></table>
<article>
	<p align="center" id="aviso">
		<?php
		if (isset($_GET["error"])) {
			echo "Usuario o contraseña incorrecta";
		}
		if (isset($_GET["salir"])) {
			require_once("php/conexion.php");
			$base=conectar::conexion();

			$online=0;
			$sqlOnl="UPDATE usuarios SET online=:online";
			$resultado=$base->prepare($sqlOnl);
			$resultado->execute(array(":online"=>$online));
		}
			?>
		</article>
</body>
</html>
