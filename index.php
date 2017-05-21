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

#banner{
  position: relative;
}
body{
  border: 1px solid;
  position: relative;
  width: 1300px;
  margin: auto;
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


</style>
</head>

<body>
  <?php

  try{
  require_once("php/conexion.php");
  $base=conectar::conexion();
  $sqlPro="SELECT idInventario,nombre from articulo,inventario where articulo.idArticulo=inventario.idInventario and estado='inventario'";
  $sqlcre="SELECT * FROM credito where estado='credito'";
  $sqlciu="SELECT * from ciudad";
  $sqlart="SELECT * from tipoArticulo";
  $sqlemp="SELECT idArticulo,nombre from articulo where idArticulo not in (select idArticulo from inventario) and idArticulo not in (select idArticulo from empenos)";
  $sqlinv="SELECT idArticulo,nombre from articulo where idArticulo not in (select idArticulo from empenos where estado='empeno' and estado='finalizado') and idArticulo not in (select idArticulo from inventario)";
  $sqlaboemp="SELECT idEmpeno from empenos where estado='empeno'";

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

    }catch(Exception $e){
      echo "Linea del error: " . $e->getLine();
    }



  ?>

<div id="banner"><img src="img/compra.png" alt="CosmoFarmer 2.0" name="logo" width="413" height="74" id="logo"/>
  <ul>
    <li class="separador"><?php echo  date("d-m-Y") ?></li>
    <li><?php echo $usuario ?></li></ul>
</div>

  <div id="princNav">
  <ul>
    <li><a id="lventa" href="#">Venta</a></li>
	  <li><a id="lventacre" href="#">Venta Crédito</a></li>
    <li><a id="labonocre" href="#">Abono Crédito</a></li>
	  <li><a id="lempeno" href="#">Empeño</a></li>
	  <li><a id="laboemp" href="#">Abono Empeño</a></li>
    <li><a id="lsaldos" href="#">Saldos</a></li>
    <li><a id="lcliente" href="#">Registrar Cliente</a></li>
    <li><a id="linventario" href="#">Inventario</a></li>
    <li><a id="larticulo" href="#">Agregar Artículo</a></li>
    <li><a id="lhelp" href="#">Help</a></li>
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
            <td><input type="text" name="cedcli" id="cedcli"></td>
            <td><p  id="nombre"></p></td>
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
              <td><p id="compra"></p></td>
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
            <td>Cedula Cliente:</td>
            <td><input type="text" name="cedcli" id="cedcli"></td>
            <td><p  id="nombre"></p></td>
          </tr>
          <tr>
          <tr>
            <td>Producto:</td>
            <td><select id="producto" name="producto">
              <option value="">-- Elige una Opción --</option>
              <?php

              $resultado2=$base->prepare($sqlPro);
              $resultado2->execute(array());

              while($registro=$resultado2->fetch(PDO::FETCH_ASSOC)){
                echo  "<option value='". $registro['idInventario'] ."'>". $registro['nombre'] ."</option>";
                }
              ?>
              </select></td>
              <td><p id="compra"></p></td>
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
                <td><p id="info"></p></td>
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





<article class="cliente">
  <h2>Registro de Cliente</h2>
    <form id="formcli" action="php/registroCliente.php" method="post">
      <table>
        <tr>
          <td>Cédula:</td>
          <td><input type="text" name="cedula" id="cedula"></td>
        </tr>
        <tr>
          <td>Nombre:</td>
          <td><input type="text" name="nombre" id="nombre"></td>
        </tr><tr>
          <td>Apellido:</td>
          <td><input type="text" name="apellido" id="apellido"></td>
        </tr><tr>
          <td>Teléfono:</td>
          <td><input type="text" name="telefono" id="telefono"></td>
        </tr>
        <tr>
          <td>Ciudad:</td>
          <td>
            <select id="ciudad" name="ciudad">
              <option value="">-- Elige una Opción --</option>
              <?php
              while($registro=$resultado4->fetch(PDO::FETCH_ASSOC)){
                echo  "<option value='". $registro['idCiudad'] ."'>". $registro['nombre'] ."</option>";
                }
              ?>
              </select>
          </td>
        </tr>


        <tr>
          <td colspan="2" align="center"><input type="submit" name="enviar" value="Enviar"></td>
        </tr>
      </table>
    </form>
</article>



<article class="articulo">
  <h2>Agregar Artículo</h2>
    <form id="formart" action="php/registroArticulo.php" method="post">
      <table>
        <tr>
          <td>Nombre:</td>
          <td><input type="text" name="nombre" id="nombre"></td>
        </tr>
        <tr>
          <td>Peso (gr):</td>
          <td><input type="text" name="peso" id="peso"></td>
        </tr>
        <tr>
          <td>Tipo:</td>
          <td>
            <select id="tipo" name="tipo">
              <option value="">-- Elige una Opción --</option>
              <?php
              while($registro=$resultado6->fetch(PDO::FETCH_ASSOC)){
                echo  "<option value='". $registro['idTipoArticulo'] ."'>". $registro['nombre'] ."</option>";
                }
              ?>
              </select>
          </td>
        </tr>


        <tr>
          <td colspan="2" align="center"><input type="submit" name="enviar" value="Enviar"></td>
        </tr>
      </table>
    </form>
</article>

<article class="empeno">
  <h2>Empeño</h2>
    <form id="formemp" action="php/registroEmpeno.php" method="post">
      <table>
        <tr>
          <td>Cedula Cliente:</td>
          <td><input type="text" name="cedcli" id="cedcli"></td>
          <td><p  id="nombre"></p></td>
        </tr>
        <tr>
        <tr>
          <td>Articulo:</td>
          <td>
            <select id="articulo" name="articulo">
              <option value="">-- Elige una Opción --</option>
              <?php
              while($registro=$resultado7->fetch(PDO::FETCH_ASSOC)){
                echo  "<option value='". $registro['idArticulo'] ."'>". $registro['nombre'] ."</option>";
                }
              ?>
              </select>
          </td>
        </tr>
        <tr>
          <td>Fecha Final:</td>
          <td><input type="text" name="empfin" id="empfin"></td>
        </tr>
        <tr>
          <td>Valor Empeño:</td>
          <td><input type="text" name="valor" id="valor"></td>
        </tr>

        <tr>
          <td>Valor a Recibir:</td>
          <td><input type="text" name="valorre" id="valorre"></td>
        </tr>


        <tr>
          <td colspan="2" align="center"><input type="submit" name="enviar" value="Enviar"></td>
        </tr>
      </table>
    </form>
</article>


<article class="abonoempeno">

      <h2>Abono Empeño</h2>
        <form id="formabemp" action="php/registroAbonoEmpeno.php" method="post">
          <table>
            <tr>
              <td>Empeno:</td>
              <td><select id="empeno" name="empeno">
                <option value="">-- Elige una Opción --</option>
                <?php
                while($registro=$resultado9->fetch(PDO::FETCH_ASSOC)){
                  echo  "<option value='". $registro['idEmpeno'] ."'>". $registro['idEmpeno'] ."</option>";
                  }
                ?>
                </select></td>
                <td><p id="info"></p></td>
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



<article class="inventario">
  <h2>Inventario</h2>
    <form id="forminv" action="php/registroInventario.php" method="post">
      <table>
        <tr>
          <td>Articulo:</td>
          <td>
            <select id="articulo" name="articulo">
              <option value="">-- Elige una Opción --</option>
              <?php
              while($registro=$resultado8->fetch(PDO::FETCH_ASSOC)){
                echo  "<option value='". $registro['idArticulo'] ."'>". $registro['nombre'] ."</option>";
                }
              ?>
              </select>
          </td>
          <td><input type="text" name="valorcompra" id="valorcompra"></td>
          <td><input type="text" name="valorvender" id="valorvender"></td>
        </tr>

        <tr>
          <td colspan="2" align="center"><input type="submit" name="enviar" value="Agregar"></td>
        </tr>
      </table>
    </form>
</article>
<article>
  <p align="center" id="aviso">
    <?php
    if (isset($_GET["erroremp"])) {
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
