<?php
require_once __DIR__.'/../includes/config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/css.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Start On</title>
</head>
<?php
	if(isset($_SESSION['login']) && $_SESSION['login'] == true){
		if(isset($_SESSION["id_usuario"])){
			$id = $_SESSION['id_usuario'];
			$SA = es\ucm\fdi\aw\SA_Usuario::getInstance();
			$transfer = $SA->getElement($id);
		}
	}
	else{
		header('Location: ../index.php');
	}
?>
<?php
		/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$nombre = test_input($_POST["nombre"]);
			$password = sha1(md5(test_input($_POST["password"])));
			$email = test_input($_POST["email"]);
			$localizacion = test_input($_POST["localizacion"]);
			$imagen = test_input($_POST["imagen"]);
			$presentacion = test_input($_POST["presentacion"]);
			$oficio = test_input($_POST["oficio"]);
			$imagen_destino = "";

			if(isset($_SESSION["id_usuario"])){
				$apellido = test_input($_POST["apellido"]);
				$experiencia = test_input($_POST["experiencia"]);
				$pasiones = test_input($_POST["pasiones"]);
				$archivo_destino = "";
				if($_FILES["archivo"]["name"] != "" && $_FILES["archivo"]["type"] == "application/pdf"){
					$archivo_ruta = $_FILES["archivo"]["tmp_name"];
					$archivo_destino = "../pdf/curr". $_SESSION["id_usuario"].".pdf";
					copy($archivo_ruta,$archivo_destino);
				}
				if($_FILES["imagen"]["name"] != "" && ($_FILES["imagen"]["type"] == "image/png"||$_FILES["imagen"]["type"] == "image/jpeg")){
				echo "bien";
				$imagen_ruta = $_FILES["imagen"]["tmp_name"];
				if ($_FILES["imagen"]["type"] == "image/jpeg") {
					$imagen_destino = "img/imgU". $_SESSION["id_usuario"].".jpg";
				}
				else{
					$imagen_destino = "img/imgU". $_SESSION["id_usuario"].".png";
				}
				copy($imagen_ruta,"../".$imagen_destino);
			}

				$SA = es\ucm\fdi\aw\SA_Usuario::getInstance();
				$transfer = new es\ucm\fdi\aw\TransferUsuario($_SESSION["id_usuario"],$nombre,$apellido,$password, $email,$localizacion, $experiencia ,$pasiones ,$presentacion,$imagen_destino,$oficio,$archivo_destino);
			 	$dir = $SA->updateElement($transfer);
			 	if($dir !== "Error"){
					header('Location: '.$dir);
			 	}
			}
			else{
				$fase = test_input($_POST["fase"]);
				$buscamos = test_input($_POST["buscamos"]);
				$ofrecemos = test_input($_POST["ofrecemos"]);
				$sector = test_input($_POST["sector"]);
				if($_FILES["imagen"]["name"] != "" && ($_FILES["imagen"]["type"] == "image/png"||$_FILES["imagen"]["type"] == "image/jpeg")){
				echo "bien";
				$imagen_ruta = $_FILES["imagen"]["tmp_name"];
				if ($_FILES["imagen"]["type"] == "image/jpeg") {
					$imagen_destino = "img/imgS". $_SESSION["id_empresa"].".jpg";
				}
				else{
					$imagen_destino = "img/imgS". $_SESSION["id_empresa"].".png";
				}
				copy($imagen_ruta,"../".$imagen_destino);
			}

				$SA = es\ucm\fdi\aw\SA_Empresa::getInstance();
        	$tEmpActual = $SA->getElement($_SESSION["id_empresa"]);
        	$numLikes= $tEmpActual->getNumLikes();
				$transfer = new es\ucm\fdi\aw\empresaTransfer($_SESSION["id_empresa"],$nombre,$password, $email,$localizacion,$sector,$oficio, $fase ,$imagen_destino,$presentacion,$buscamos,$ofrecemos, $numLikes);
				$dir = $SA->updateElement($transfer);
		 		if($dir !== "Error"){
					header('Location: '.$dir);
				}
			}
		}*/
	?>	
<body>
	<?php require("common/header.php")?>
	<div class="row" style="margin: 20px">
    	<div class="titulo">Modificar campos:</div>
		<div class="form-consulta">
			<?php 
				$form = new es\ucm\fdi\aw\FormularioModificarUsuario();
				$form->gestiona();
			?>
		</div>
	</div>
	<?php require("common/footer.php")?>
</body>
</html>
