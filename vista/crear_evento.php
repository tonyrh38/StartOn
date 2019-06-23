<?php
require_once __DIR__.'/../includes/config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<title>Start On</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
		$fecha_introducida = htmlspecialchars($_GET["fecha"]);
		$_SESSION["fecha_crear_evento_bool"] = true;
		$_SESSION["fecha_crear_evento_value"] = $fecha_introducida;
	}else{
		$_SESSION["fecha_crear_evento_bool"] = false;
	}
	?>
  	<?php require("common/header.php")?>
	<div class="row">
    	<div class="titulo">Crea tu propio evento:</div>
		<div class="form-consulta">
			<?php 
				$form = new es\ucm\fdi\aw\FormularioCrearEvento();
				$form->gestiona();
			?>
		</div>
	</div>
</body>
</html>
