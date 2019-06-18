<?php 
  require_once __DIR__.'/../includes/config.php';
  require_once __DIR__.'/../includes/SA_Usuario.php';
  require_once __DIR__.'/../includes/SA_Empresa.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<title>Start On</title>
	<meta charset="utf-8">
</head>
<?php
				/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$email = test_input($_POST["email"]);
					$password = sha1(md5(test_input($_POST["password"])));

					$SA = SA_Usuario::getInstance();
					$transfer = new TransferUsuario("","","",$password, $email,"", "" ,"" ,"","", "","");
				 	$dir = $SA->login($transfer);
					if($dir !== "Error" && $dir!=="../index.php"){
						header('Location: '.$dir);
					}
					else{
						$SA = SA_Empresa::getInstance();
						$transfer = new empresaTransfer("","",$password, $email,"", "" ,"" ,"","","","","", "");
						$dir = $SA->login($transfer);
					 	if($dir !== "Error"){
							header('Location: '.$dir);
						}
					}
				}*/
				?>
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
