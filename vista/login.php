<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Empresa.php");
require_once ("../logica/SA_Usuario.php");
 ?>

<!DOCTYPE html>
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
					$email = test_input($_POST["email"]);
					$password = sha1(md5(test_input($_POST["password"])));

					//if($_REQUEST["mode"] == "usuario"){
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
					 	if($dir !== "error"){
							header('Location: '.$dir);
					 	}
					}
				}

				function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}
				?>

				<p class="titulo">Inicia sesión:</p>
				<form method="post" action="login.php" class="form-consulta">
				  <p>E-mail: <input type="email" name="email" value="" class="campo-form"></p>
				  <p>Contraseña: <input type="password" name="password" value="" class="campo-form"></p>
				 <!--<p> Iniciar sesión como:<p>  -->
				 <!--<p> <input type="radio" name="mode" value ="usuario" checked> Usuario
				  <input type="radio" name="mode" value ="empresa"> Empresa </p>-->
				  <input  class ='botonGuay' type="submit" name="submit" value="Submit">
          <p>¿No estas registrado?</p>
          <p><a href="emp_signup.php" style="color:blue; font-size: 15px;" >Registro de empresa,</a>
          <a href="usr_signup.php"  style="color: blue; font-size: 15px;">&nbsp&nbspRegistro de usuarios</a></p>
		  		</form>
			</div>

			<?php require("common/footer.php")?>
		</div>
</body>
</html>
