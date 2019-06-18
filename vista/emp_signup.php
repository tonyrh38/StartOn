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
<?php /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$nombre = test_input($_POST["nombre"]);
					$email = test_input($_POST["email"]);
					$password = sha1(md5(test_input($_POST["password"])));
					$password2 = sha1(md5(test_input($_POST["password2"])));
					if($password !== $password2){
						$dir = "Error";
					}
					else{
						$SA = SA_Empresa::getInstance();
						$transfer = new empresaTransfer("",$nombre,$password, $email,"", "" ,"" ,"","img/empresa.png","","","", "");
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
*/
				?>
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
