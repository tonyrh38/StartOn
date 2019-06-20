<?php
require_once __DIR__.'/../includes/config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
	if(isset($_POST['delete'])){
			$nombreEvento = $_POST['delete'];
			$idUser = $_SESSION['id_usuario'];

			$SA_Comentario = SA_Comentario::getInstance();
			$SA_Comentario->deleteElement($nombreEvento, $idUser);
		}
 	if(isset($_POST['crearComentario'])){
 		$nombreEvento = $_POST['crearComentario'];
 		$idUser = $_SESSION['id_usuario'];
		$Titulo = $_POST['titulo'];
		$Contenido = $_POST['contenido'];
		$SA_Comentario = SA_Comentario::getInstance();
		$SA_Usuario = SA_Usuario::getInstance();
		$SA = SA_Comentario::getInstance();

		$transfer = new transferComentario($nombreEvento, $idUser, $Titulo, $Contenido);
		$SA->createElement($transfer);

		$formAction = 'listaEventos.php';
		header('Location: '.$formAction);
 	}
	if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["id"]){
		$id = htmlspecialchars($_GET["id"]);
		$SA = SA_Eventos::getInstance();
		$transfer = $SA->getElement($id);
	}
	else{
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
<body>
	<?php require("common/header.php")?>


	<div id="container">
		<div id="perfil">
			<div id="card">
				<?php
				echo '<img src= "../img/'.$transfer->getImagenEvento().'"  style="width:100%">';
				echo '<p class ="burbuja" id="btitulo"> '.$transfer->getNombre().'</p>';
				echo '<p class ="burbuja"> '.$transfer->getLocalizacion().'</p>';
				echo '<p class ="burbuja"> '.$transfer->getFecha().'</p>';
				echo '<p class ="burbuja"> '.$transfer->getCantidad().'</p>';
				echo '<p class ="burbuja"> '.$transfer->getPrecio().'</p>';

				$idSess = $_GET["id"];
				if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_usuario'])){
					echo '<a  class ="botonGuay" href="unirEvento.php?id='.$transfer->getNombre().'" >';
					if(!$SA->existsUserEvent($_SESSION['id_usuario'],$transfer->getNombre()))
						echo '¡Apuntate!</a>';
					else
						echo 'Desapuntate</a>';
				}

				if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_empresa'])){
					if($_SESSION['id_empresa'] == $SA->getEventEmpresa($transfer->getNombre())){
						echo '<div class="row"><a class ="botonGuay" href="mod_evento.php?id='.$transfer->getNombre().'">Modifica Evento</a></div>';
					}
				}
				echo '</div>';
		echo '</div>';

		echo '<div>';

			$SA_Comentario = SA_Comentario::getInstance();
			$commentList = $SA_Comentario->getElementsByNombreEvento($transfer->getNombre());
			echo '<div style="margin-top:80px">';

			if($commentList == null){
				echo '<div class="burbuja" style="float:left"> No existen comentarios para este evento </div>';
			}
			else{
			$SAuser = SA_Usuario::getInstance();

      foreach($commentList as $document){  /* Follows will be created and deleted from the companies list*/
				echo "<div id='bcoment' style='margin-top:15px'>";
						$transferUs = $SAuser->getElement($document->getId_Usuario());
						$nombreUs = $transferUs->getNombre();
						echo '<p><img src= "../'.$transferUs->getImagenPerfil().'"  style="width:30px; height:auto;">'.$nombreUs.'</p>';
            echo ' <p class ="burbuja" id="btitulo">  '. $document->getTitulo() .'</p>';
            echo ' <p class ="burbuja" id="btexto"> '. $document->getContenido() .'<p>';

						if((isset($_SESSION['id_usuario'])) && ($document->getId_Usuario() == $_SESSION['id_usuario'])){
							echo '<form action="perfEvento.php?id='.$document->getNombreEvento().'" method="post">';
	            	echo '<button class="botonGuay" id="botonRojo" type="submit" name="delete" value="'.$document->getNombreEvento().'">Delete</button>';
							echo '</form>';
						}
					/*	'.<?php echo "htmlspecialchars($_SERVER["PHP_SELF"])"; ?>.'*/
				echo '	</div>';
      }
		}
			echo'</div>';

			?>

			<?php
			$SA_Comentario = SA_Comentario::getInstance();
			if(isset($_SESSION['id_usuario'])){
			if($SA_Comentario->getElementsByIds($_GET["id"], $_SESSION['id_usuario']) ==false){
			echo '</div>';

			$id = $_GET["id"];
			echo '<div class="row">';
			echo '<div class="titulo">Crear comentario:</div>';
			echo '<div id="Modperfil">';
			echo '<form enctype="multipart/form-data" method="post" action= "perfEvento.php?id='.$id.'">';
				echo '<p>Título: <input type="text" id="ModperfilCampos" name="titulo" value=""></p>';
					echo '<p>Contenido: <input type="text" id="ModperfilCampos" name="contenido" value=""></p>';
				echo '<button class="botonGuay" type="submit" name="crearComentario" value="'.$id.'">Crear Comentario</button>';
			echo '</form>';
			echo '</div>';
		}
	}
			?>


			</div>


	</div>
	<?php require("common/footer.php")?>
</body>
</html>
