<!DOCTYPE html>

<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Usuario.php");
 ?>
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
					$nombre = test_input($_POST["nombre"]);
					$apellido = test_input($_POST["apellido"]);
					$email = test_input($_POST["email"]);
					$password = sha1(md5(test_input($_POST["password"])));
					$password2 = sha1(md5(test_input($_POST["password2"])));
					if($password !== $password2){
						$dir = "Error";
					}
					else{
						$SA = SA_Usuario::getInstance();
						$transfer = new TransferUsuario("",$nombre,$apellido,$password, $email,"", "" ,"" ,"","img/usuario.png","","");
				 		$dir = $SA->createElement($transfer);
				 	}
				 	if($dir !== "Error"){
						header('Location: '.$dir);
				 	}
				}

				function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}

				?>
				</form>
				<p class="titulo">Regístrate como usuario aquí:</p>
				<form method="post" action="usr_signup.php" class="form-consulta">
					<p>Nombre de usuario: <input type="text" name="nombre" value="" class="campo-form"></p>
					<p>Apellido: <input type="text" name="apellido" value="" class="campo-form"></p>
				  <p>E-mail: <input type="email" name="email" value="" class="campo-form"></p>
				  <p>Contraseña: <input type="password" name="password" value="" class="campo-form"></p>
				  <p>Repetir contraseña: <input type="password" name= "password2" value="" class="campo-form"></p>
				  <input id= 'botonSubmitU' class ='botonGuay' type="submit" name="submit" value="Submit">
		  		</form>
			</div>
				<?php require("common/footer.php")?>
		</div>
</body>
</html>
