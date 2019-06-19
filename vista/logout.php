<?php
require_once __DIR__.'/../includes/config.php';

	session_unset();
	session_destroy();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<title>Start On</title>
</head>
<body>
	<?php require("common/header.php")?>
	<div class="container">
		<div class="row">
			<div class="titulo">
				<img id="logo_inicio" src="../resources/img/info/icono1.png">
			</div>
		</div>
		<div class="row">
			Saliste de la sesión. Te echaremos de menos.
		</div>
	</div>
</body>
</html>
