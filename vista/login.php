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
			<p class="titulo">Inicia sesión:</p>
			<div class="form-consulta">
				<?php 
					$form = new es\ucm\fdi\aw\FormularioLogin();
					$form->gestiona();
				?>
			</div>
		</div>
		<div class="row">
			<p>¿No estas registrado?</p>
          	<p>
          		<a href="emp_signup.php" style="color:blue; font-size: 15px;" >Registro de empresa,</a>
          		<a href="usr_signup.php"  style="color: blue; font-size: 15px;">&nbsp&nbspRegistro de usuarios</a>
      		</p>	
		</div>		
	</div>
</body>
</html>
