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
	<div id="container">
		<div class="row">
			<p class="titulo">Regístrate como empresa aquí:</p>
			<div class="form-consulta">
				<?php 
					$form = new es\ucm\fdi\aw\FormularioRegistroEmpresa();
					$form->gestiona();
				?>	
			</div>
		</div>
	</div>
</body>
</html>
