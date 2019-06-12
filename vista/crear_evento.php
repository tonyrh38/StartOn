<!DOCTYPE html>

<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Eventos.php");
 ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<title>Start On</title>
	<meta charset="utf-8">
</head>
<body>
  			<?php require("common/header.php")?>
	<div id="container">

			<div class="row">
				<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$nombre = test_input($_POST["nombre"]);
					$localizacion= test_input($_POST["localizacion"]);
					$precio = test_input($_POST["precio"]);
					$aforo = test_input($_POST["aforo"]);
					$fecha = test_input($_POST["fecha"]);
					$SA = SA_Eventos::getInstance();
					$transfer = new eventoTransfer($nombre, $localizacion ,$precio, $aforo, $fecha,"../img/event.png");
				 	$dir = $SA->createElement($transfer);
				 	if($dir !== "Error"){
						header('Location: '.$dir);
				 	}
				}

				function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}

				?>
				</form>
				<p class="titulo">Crea tu propio evento:</p>
				<form method="post" action="crear_evento.php" class="form-consulta">
				  <p>Nombre del evento: <input type="text" name="nombre" value="" class="campo-form"></p>
				  <p>Localizacion: <input type="text" name="localizacion" value="" class="campo-form"></p>
				  <p>Precio: <input type="text" name="precio" value="" class="campo-form"></p>
				  <p>Aforo: <input type="number" name="aforo" value="" class="campo-form"></p>
				  <p>Fecha: <input type="date" name= "fecha" value="" class="campo-form"></p>
				  <input id= 'botonSubmitU' class ='botonGuay' type="submit" name="submit" value="Submit">
		  		</form>
			</div>
				<?php require("common/footer.php")?>
		</div>
</body>
</html>
