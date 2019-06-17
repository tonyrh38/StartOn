<!DOCTYPE html>
<?php
require_once ("../includes/config.php");

	session_unset();
	session_destroy();
 ?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<title>Start On</title>
</head>
<body>
	<div class="container">
		<?php require("common/header.php")?>
		<div class="row">
			<div class="titulo">
				<img id="logo_inicio" src="../img/Logo1.png">
			</div>
		</div>
		<div class="row">
			Saliste de la sesión. Te echaremos de menos.
		</div>
		<?php require("common/footer.php")?>
</body>
</html>
