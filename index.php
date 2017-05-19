<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Compra Venta</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/jquery-ui.css">

<script src="js/jquery-3.1.1.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/validate.addtionalMethods.js"></script>
<script src="js/jquery-ui.min.js"></script>

<script src="js/script.js"></script>




<style type="text/css">

#banner #logobanner{
  position: absolute;
  left:-22px;
  top:-5px;
}
#banner{
  position: relative;
}
body{
  margin: 20px;
}
#banner #logo{
  margin: 30px;
}
#banner ul{
  position: absolute;
  right: 60px;
  bottom: 5px;
}
#contenidoPrincipal{
  position: relative;
  clear: both;
}
#contenedor{
  position: relative;
  width: 1300px;
  margin: auto;
}


</style>
</head>

<body>
  <?php

  try{
  require_once("php/conexion.php");
  $base=conectar::conexion();
  $sqlCed="SELECT * FROM cliente";
  $sqlPro="SELECT idInventario,nombre from articulo,inventario where articulo.idArticulo=inventario.idInventario and estado='inventario'";
  $sqlcre="SELECT * FROM credito where estado='credito'";


  $resultado=$base->prepare($sqlCed);
  $resultado->execute(array());

  $resultado2=$base->prepare($sqlPro);
  $resultado2->execute(array());

  $resultado3=$base->prepare($sqlcre);
  $resultado3->execute(array());

    }catch(Exception $e){
      echo "Linea del error: " . $e->getLine();
    }



  ?>
<div id="contenedor">
<div id="banner"><img src="img/compra.png" alt="CosmoFarmer 2.0" name="logo" width="413" height="74" id="logo"/>
  <ul>
    <li class="separador">hora</li>
    <li>Usuario online</li></ul>
</div>

  <div id="princNav">
  <ul>
    <li><a href="#">Venta</a></li>
	  <li><a href="#">Venta Crédito</a></li>
    <li><a href="#">Abono Crédito</a></li>
	  <li><a href="#">Empeño</a></li>
	  <li><a href="#">Abono Empeño</a></li>
    <li><a href="#">Saldos</a></li>
    <li><a href="#">Help</a></li>
	  <li><a href="login.php?salir">Salir</a></li>
  </ul>
  </div>

<section id="contenidoPrincipal">
  <article class="venta">
      <h2>Venta</h2>
      <form id="formven" action="php/registroVenta.php" method="post">
        <table>
          <tr>
            <td>Cedula Cliente:</td>
            <td><select id="cedcli" name="cedcli">
              <option value="">-- Elige una Opción --</option>
              <?php
              while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                echo  "<option value='". $registro['idCliente'] ."'>". $registro['cedula'] ."</option>";
                }
              ?>
              </select></td>
          </tr>
          <tr>
            <td>Producto:</td>
            <td><select id="producto" name="producto">
              <option value="">-- Elige una Opción --</option>
              <?php
              while($registro=$resultado2->fetch(PDO::FETCH_ASSOC)){
                echo  "<option value='". $registro['idInventario'] ."'>". $registro['nombre'] ."</option>";
                }
              ?>
              </select></td>
          </tr>

          <tr>
            <td>Valor:</td>
            <td><input type="text" name="valor" id="valor"></td>
          </tr>
          <tr>
              <td colspan="2" align="center"><input type="submit" value="Enviar" id="enviar"></td>
          </tr>
        </table>
      </form>

    </article>

  <article class="credito">
    <h2>Credito</h2>
      <form id="formcre" action="php/registroCredito.php" method="post">
        <table>
          <tr>
            <td>Cédula Cliente:</td>
            <td><select id="cedcli" name="cedcli">
              <option value="">-- Elige una Opción --</option>
              <?php
              $resultado=$base->prepare($sqlCed);
              $resultado->execute(array());

              $resultado2=$base->prepare($sqlPro);
              $resultado2->execute(array());


              while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                echo  "<option value='". $registro['idCliente'] ."'>". $registro['cedula'] ."</option>";
                }
              ?>
              </select></td>
          </tr>
          <tr>
            <td>Producto:</td>
            <td><select id="producto" name="producto">
              <option value="">-- Elige una Opción --</option>
              <?php
              while($registro=$resultado2->fetch(PDO::FETCH_ASSOC)){
                echo  "<option value='". $registro['idInventario'] ."'>". $registro['nombre'] ."</option>";
                }
              ?>
              </select></td>
          </tr>
          <tr>
            <td>Fecha Final:</td>
            <td><input type="text" name="fechafin" id="fechafin"></td>
          </tr>
          <tr>
            <td>Valor:</td>
            <td><input type="text" name="valor" id="valor"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="enviar" value="Enviar"></td>
          </tr>
        </table>
      </form>

    </article>

<article class="abonoCredito">

      <h2>Abono Credito</h2>
        <form id="formabcre" action="php/registroAbonoCredito.php" method="post">
          <table>
            <tr>
              <td>Crédito:</td>
              <td><select id="credito" name="credito">
                <option value="">-- Elige una Opción --</option>
                <?php
                while($registro=$resultado3->fetch(PDO::FETCH_ASSOC)){
                  echo  "<option value='". $registro['idCredito'] ."'>". $registro['idCredito'] ."</option>";
                  }
                ?>
                </select></td>
            </tr>
            <tr>
              <td>Valor:</td>
              <td><input type="text" name="valor" id="valor"></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input type="submit" name="enviar" value="Enviar"></td>
            </tr>
          </table>
        </form>
    </article>

<article class="saldos">

      <h2>Saldo día anterior</h2>
          <table>
            <tr>
              <td>Ventas:</td>
              <td><?php

include ("php/consultaSaldos.php");

              echo $conventa;

              ?></td>
            </tr>
            <tr><td>Abono Credito:</td>
            <td><?php
            echo $concredito;

             ?></td>
            </tr>
            <tr>
              <td>Empeño:</td>
              <td><?php
                echo $conempeno;
               ?></td>
            </tr>
            <tr>
              <td>Abono Empeño:</td>
              <td><?php
                echo $conabonoEmpeno;
               ?></td>
            </tr>
            <tr>
              <td>Total:</td>
              <td><?php
                echo $conventa+$concredito-$conempeno+$conabonoEmpeno;

               ?></td>
            </tr>
            </table>

    </article>



    <article>
      <p align="center" id="aviso">
        <?php
        if (isset($_GET["error"])) {
          echo "El sueldo ingresado no existe";
        }
          ?>

          <?php
          if (isset($_GET["error"])) {
            echo "El formulario no ha podido ser registrado. Inténtalo más tarde.";
          }
          if (isset($_GET["exito"])) {
            echo "Registrado correctamente.";

          }
            ?>

            <p align="center" id="aviso">
              <?php
              if (isset($_GET["error"])) {
                echo "El sueldo ingresado no existe";
              }
                ?>

                  <?php
                  if (isset($_GET["error"])) {
                    echo "El sueldo ingresado no existe";
                  }
                    ?>

            </p>


      </p>
    </article>




  <p id="pie">2017. Universidad Cooperativa de Colombia</p>

</section>
</body>
</html>
