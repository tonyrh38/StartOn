<!DOCTYPE html>
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Eventos.php");
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<?php require("common/header.php")?>
	<?php
		if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Eventos::getInstance();
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
    		$SA = SA_Eventos::getInstance();
     		$transfer = $SA->getElement($_SESSION["nombre_evento_apuntado"]);
     		$SA->linkUserEvent($_SESSION['id_usuario'], $_SESSION["nombre_evento_apuntado"]);
     		header('Location: perfEvento.php?id='.$transfer->getNombre().'');
    	}
    	if(isset($_POST['SI_desapuntado'])){
    		$SA = SA_Eventos::getInstance();
     		$transfer = $SA->getElement($_SESSION["nombre_evento_apuntado"]);
     		$SA->unlinkUserEvent($_SESSION['id_usuario'], $_SESSION["nombre_evento_apuntado"]);
     		header('Location: perfEvento.php?id='.$transfer->getNombre().'');
    	}
    	if(isset($_POST['NO'])){
    		$SA = SA_Eventos::getInstance();
      		$transfer = $SA->getElement($_SESSION["nombre_evento_apuntado"]);
      		header('Location: perfEvento.php?id='.$transfer->getNombre().'');
    	}
    ?>

	<div id="container">
		<div id ="card">
		<?php
			//comprobar si esa persona ya estaba apuntada
			//comprobacion(evento, persona)

			echo '<img src= "/ProyectoStartOn/img/'.$transfer->getImagenEvento().'"  style="width:100%">';
			echo "<p class ='burbuja'>Plazas: ".$SA->usersRemainingEvent($transfer->getNombre())."/".$transfer->getCantidad()."</p>";
			if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_usuario'])){
				$_SESSION["nombre_evento_apuntado"]= $transfer->getNombre();
				if(!$SA->existsUserEvent($_SESSION['id_usuario'],$transfer->getNombre())){
					echo "<p class ='burbuja'>¿Quieres indicar que vas a asistir al evento ".$transfer->getNombre()."?</p>";
					echo '<form method="post"><input type="submit" name="SI_apuntado" id = "botonGuay" value="SI"><input type="submit" name="NO" value="NO"></form>';
				}
				else{
					echo "<p class ='burbuja'>Ya te has apuntado a este evento. ¿Quieres dejar de indicar que vas a asistir al evento ".$transfer->getNombre()."?</p>";
					echo '<form method="post"><input type="submit" name="SI_desapuntado" value="SI"><input type="submit" name="NO" value="NO"></form>';
				}
			}
		?>
		</div>
	</div>
	<?php require("common/footer.php")?>
</body>
</html>
