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
<?php
			/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
			*/
		?>
<body>
  	<?php require("common/header.php")?>
	<div id="container">
		<div class="row">
			<p class="titulo">Regístrate como usuario aquí:</p>
			<div class="form-consulta">
				<?php 
					$form = new es\ucm\fdi\aw\FormularioRegistroUsuario();
					$form->gestiona();
				?>
			</div> 
		</div>
	</div>
	<?php require("common/footer.php")?>
</body>
</html>
