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
