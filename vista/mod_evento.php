<!DOCTYPE html>
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Eventos.php");
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	<?php require("common/header.php")?>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$localizacion = test_input($_POST["localizacion"]);
			$precio = test_input($_POST["precio"]);
			$cantidad = test_input($_POST["cantidad"]);
			$fecha = test_input($_POST["fecha"]);
			$imagen_destino = "";

			if($_FILES["imagen"]["name"] != "" && ($_FILES["imagen"]["type"] == "image/png"||$_FILES["imagen"]["type"] == "image/jpeg")){
				$imagen_ruta = $_FILES["imagen"]["tmp_name"];
				if ($_FILES["imagen"]["type"] == "image/jpeg") {
					$imagen_destino = $_SESSION["evento_modificar"].".jpg";
				}
				else{
					$imagen_destino = $_SESSION["evento_modificar"].".png";
				}

				copy($imagen_ruta,$imagen_destino);
			}
			$SA = SA_Eventos::getInstance();
			$transfer = new eventoTransfer($_SESSION["evento_modificar"], $localizacion, $precio, $cantidad, $fecha, $imagen_destino);
			$dir = $SA->updateElement($transfer);
			if($dir !== "Error"){
				header('Location: '.$dir);
			}
		}else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["id"]){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Eventos::getInstance();
			$transfer = $SA->getElement($id);
		}
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	?>
	<div class="rowC"> <!--Row modificar campos-->
    	<div class="titulo">Modificar campos:</div>
    </div>
	<div id="Modperfil">
		<form enctype="multipart/form-data" method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<p>Localizacion: <input type="text" id="ModperfilCampos" name="localizacion" value=<?php echo $transfer->getLocalizacion(); ?>></p>
		<p>Precio: <input type="text" id="ModperfilCampos" name="precio" value=<?php echo $transfer->getPrecio(); ?>></p>
		<p>Cantidad: <input type="number" id="ModperfilCampos" name="cantidad" value=<?php echo $transfer->getCantidad(); ?>></p>
		<p>Fecha: <input type="date" id="ModperfilCampos" name="fecha" value=<?php echo $transfer->getFecha(); ?>></p>
		<p>Imagen(jpg o png): <input type="file" name="imagen" value=""></p>
		<?php $_SESSION['evento_modificar'] = $transfer->getNombre(); ?>
		<p><input id="botonSubmit" class="botonGuay" type="submit" name="submit" value="Guardar"></p>
		</form>
	</div>
	<div class ="row">
		<?php $_SESSION['evento_eliminar'] = $transfer->getNombre();?>
		<input id="botonSubmit" class="botonGuay" type="button" value="Borrar" onclick="borrarPerfil()"></input>
    	<div id="espacio"></div>
    </div>
	<script type="text/javascript">
		function borrarPerfil(){
			if(confirm("¿Estás seguro de que quieres borrar tu evento? (Los datos guardados se perderán para siempre)")){
		  		window.location.assign("delete_evento.php");
		  		}
		  	}
	</script>
	<?php require("common/footer.php")?>
</body>
</html>