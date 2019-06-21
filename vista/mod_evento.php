<?php
require_once __DIR__.'/../includes/config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/css.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<?php require("common/header.php")?>
	<div class="row">
    	<div class="titulo">Modificar campos:</div>
		<div class="form-consulta">
			<?php 
				$form = new es\ucm\fdi\aw\FormularioModificarEvento();
				$form->gestiona();
			?>
		</div>
	</div>
</body>
</html>