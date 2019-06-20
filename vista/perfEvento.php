<?php
require_once __DIR__.'/../includes/config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/css.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
	$SA_Comentario = es\ucm\fdi\aw\SA_Comentario::getInstance();
	if(isset($_POST['delete'])){
			$nombreEvento = $_POST['delete'];
			$idUser = $_SESSION['id_usuario'];
			$SA_Comentario->deleteElement($nombreEvento, $idUser);
	}
 	if(isset($_POST['crearComentario'])){
 		$nombreEvento = $_POST['crearComentario'];
 		$idUser = $_SESSION['id_usuario'];
		$Titulo = $_POST['titulo'];
		$Contenido = $_POST['contenido'];
		$SA_Usuario = es\ucm\fdi\aw\SA_Usuario::getInstance();
		$SA = es\ucm\fdi\aw\SA_Comentario::getInstance();

		$transfer = new es\ucm\fdi\aw\transferComentario($nombreEvento, $idUser, $Titulo, $Contenido);
		$SA->createElement($transfer);
		$formAction = 'perfEvento.php?id='.$nombreEvento;
		header('Location: '.$formAction);
 	}
	if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["id"]){
		$id = htmlspecialchars($_GET["id"]);
		$SA = es\ucm\fdi\aw\SA_Eventos::getInstance();
		$transfer = $SA->getElement($id);
	}
	else{
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
<body>
	<?php require("common/header.php")?>
	<div id="container">
		<div class="left-column">
			<div id="card">
				<?php 
					echo '<img src= "../'.$transfer->getImagenEvento().'"  style="width:100%">';
					echo '<p class ="burbuja" id="btitulo"> '.$transfer->getNombre().'</p>';
					if (!empty($transfer->getLocalizacion())) {
						echo '<p class ="burbuja"> '.$transfer->getLocalizacion().'</p>';
					}
					if (!empty($transfer->getFecha())) {
						echo '<p class ="burbuja"> '.$transfer->getFecha().'</p>';
					}
					if (!empty($transfer->getCantidad())) {
						echo '<p class ="burbuja"> '.$transfer->getCantidad().' plazas</p>';
					}
					if (!empty($transfer->getPrecio())) {
						echo '<p class ="burbuja"> '.$transfer->getPrecio().'</p>';
					}
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
				?>
			</div>
		</div>
		<div class="right-column">
			<?php
				$commentList = $SA_Comentario->getElementsByNombreEvento($transfer->getNombre());
				if($commentList == null){
					echo '
					<div class="row">
						<div class="burbuja" style="margin:20px"> No existen comentarios para este evento</div>
					</div>';
				}
				else{
					$SAuser = es\ucm\fdi\aw\SA_Usuario::getInstance();
      				foreach($commentList as $document){
						echo "<div id='bcoment'";
							$transferUs = $SAuser->getElement($document->getId_Usuario());
							$nombreUs = $transferUs->getNombre();
							echo '<p><img src= "../'.$transferUs->getImagenPerfil().'"  style="width:30px; height:auto;">'.$nombreUs.'</p>';
            				echo ' <p class ="burbuja" id="btitulo">  '. $document->getTitulo() .'</p>';
            				echo ' <p class ="burbuja" id="btexto"> '. $document->getContenido() .'<p>';
							if((isset($_SESSION['id_usuario'])) && ($document->getId_Usuario() == $_SESSION['id_usuario'])){
								echo '<form action="perfEvento.php?id='.$document->getNombreEvento().'" method="post">';
		            			echo '<button class="botonSubmit" id="botonRojo" type="submit" name="delete" value="'.$document->getNombreEvento().'">Delete</button>';
								echo '</form>';
							}
						echo '</div>';
      				}
				}
			?>
			<?php
				if(isset($_SESSION['id_usuario'])){
					if($SA_Comentario->getElementsByIds($_GET["id"], $_SESSION['id_usuario']) ==false){
						$id = $_GET["id"];
						echo '<div class="row">';
							echo '<div class="titulo">Añade tu comentario:</div>';
							echo '<div id="Modperfil">';
								echo '<form enctype="multipart/form-data" method="post" action= "perfEvento.php?id='.$id.'">';
									echo '<p>Título: <input type="text" id="ModperfilCampos" name="titulo" value=""></p>';
									echo '<p>Contenido: <input type="text" id="ModperfilCampos" name="contenido" value=""></p>';
									echo '<button class="botonSubmit" type="submit" name="crearComentario" value="'.$id.'">Crear</button>';
								echo '</form>';
							echo '</div>';
						echo '</div>';
					}
				}
			?>
		</div>
	</div>
</body>
</html>
