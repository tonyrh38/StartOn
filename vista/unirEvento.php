<?php
require_once __DIR__.'/../includes/config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/css.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<?php require("common/header.php")?>
	<?php
		if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = es\ucm\fdi\aw\SA_Eventos::getInstance();
			$transfer = $SA->getElement($id);
		}
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	<?php
    	if(isset($_POST['SI_apuntado'])){
    		$SA = es\ucm\fdi\aw\SA_Eventos::getInstance();
     		$transfer = $SA->getElement($_SESSION["nombre_evento_apuntado"]);
     		$SA->linkUserEvent($_SESSION['id_usuario'], $_SESSION["nombre_evento_apuntado"]);
     		header('Location: perfEvento.php?id='.$transfer->getNombre().'');
    	}
    	if(isset($_POST['SI_desapuntado'])){
    		$SA = es\ucm\fdi\aw\SA_Eventos::getInstance();
     		$transfer = $SA->getElement($_SESSION["nombre_evento_apuntado"]);
     		$SA->unlinkUserEvent($_SESSION['id_usuario'], $_SESSION["nombre_evento_apuntado"]);
     		header('Location: perfEvento.php?id='.$transfer->getNombre().'');
    	}
    	if(isset($_POST['NO'])){
    		$SA = es\ucm\fdi\aw\SA_Eventos::getInstance();
      		$transfer = $SA->getElement($_SESSION["nombre_evento_apuntado"]);
      		header('Location: perfEvento.php?id='.$transfer->getNombre().'');
    	}
    ?>
	<div id="container">
		<div id ="card">
		<?php
			echo '<img src= "../'.$transfer->getImagenEvento().'">';
			echo "<p class ='burbuja'>Plazas: ".$SA->usersRemainingEvent($transfer->getNombre())."/".$transfer->getCantidad()."</p>";
			if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_usuario'])){
				$_SESSION["nombre_evento_apuntado"]= $transfer->getNombre();
				if(!$SA->existsUserEvent($_SESSION['id_usuario'],$transfer->getNombre())){
					echo "<p class ='burbuja'>¿Quieres indicar que vas a asistir al evento ".$transfer->getNombre()."?</p>";
					echo '<form method="post"><input type="submit" name="SI_apuntado" style="border-radius: 10px" value="SI"><input type="submit" name="NO" style="border-radius: 10px"value="NO"></form>';
				}
				else{
					echo "<p class ='burbuja'>Ya te has apuntado a este evento. ¿Quieres dejar de indicar que vas a asistir al evento ".$transfer->getNombre()."?</p>";
					echo '<form method="post"><input type="submit" name="SI_desapuntado" style="border-radius: 10px" value="SI"><input type="submit" name="NO" style="border-radius: 10px" value="NO"></form>';
				}
			}
		?>
		</div>
	</div>
</body>
</html>
