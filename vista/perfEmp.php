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
		if(isset($_POST['like'])){
			$idusuario = htmlspecialchars($_SESSION['id_usuario']);
			$idempresa = $_POST['like'];

			$SAlikes = es\ucm\fdi\aw\SA_Like::getInstance();
			$SAlikes->insertLike($idempresa, $idusuario);
		}

		if(isset($_POST['dislike'])){
			$idusuario = htmlspecialchars($_SESSION['id_usuario']);
			$idempresa = $_POST['dislike'];

			$SAlikes = es\ucm\fdi\aw\SA_Like::getInstance();
			$SAlikes->deleteLike($idempresa, $idusuario);
		}
	 ?>
	<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_empresa'])){
			if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_empresa']))){
				$id = $_SESSION['id_empresa'];
				$SA = es\ucm\fdi\aw\SA_Empresa::getInstance();
				$SAlikes = es\ucm\fdi\aw\SA_Like::getInstance();
				$SAUsuario = es\ucm\fdi\aw\SA_Usuario::getInstance();
				$transfer = $SA->getElement($id);
				$likesList = $SAlikes->getElementsByIdEmpresa($id);
			}
			else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = es\ucm\fdi\aw\SA_Empresa::getInstance();
			$SAlikes = es\ucm\fdi\aw\SA_Like::getInstance();
			$SAUsuario = es\ucm\fdi\aw\SA_Usuario::getInstance();

			$transfer = $SA->getElement($id);
			$likesList = $SAlikes->getElementsByIdEmpresa($id);
			}
		}
		else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = es\ucm\fdi\aw\SA_Empresa::getInstance();
			$SAlikes = es\ucm\fdi\aw\SA_Like::getInstance();
			$SAUsuario = es\ucm\fdi\aw\SA_Usuario::getInstance();

			$transfer = $SA->getElement($id);
			$likesList = $SAlikes->getElementsByIdEmpresa($id);
		}else{
			$id = htmlspecialchars($_GET["id"]);
			$SA = es\ucm\fdi\aw\SA_Empresa::getInstance();
			$SAlikes = es\ucm\fdi\aw\SA_Like::getInstance();
			$SAUsuario = es\ucm\fdi\aw\SA_Usuario::getInstance();

			$transfer = $SA->getElement($id);
			$likesList = $SAlikes->getElementsByIdEmpresa($id);
		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	<div id="perfil">
		<div id="card">
			<?php
			echo '<img src= "../'.$transfer->getImagenPerfil().'"  style="width:100%">';
			echo '<p class ="burbuja" id="btitulo"> '.$transfer->getNombre().'</p>';
			echo '<p class ="burbuja"> '.$transfer->getLocalizacion().'</p>';
			echo '<p class ="burbuja"> '.$transfer->getSector().'</p>';
			/* BOTON LIKES*/
				if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_usuario'])){
					$idEmp = $transfer->getId_Empresa();
					if($SAlikes->getElementsByIds($idEmp, $_SESSION['id_usuario']) != false){
						echo '<form action="perfEmp.php?id='.$idEmp.'" method="post">';
							echo '<button class="botonGuay" id="botonRojo" type="submit" name="dislike" value="'.$idEmp.'">Quitar like</button>';
						echo '</form>';
					}
					else{
						echo '<form action="perfEmp.php?id='.$idEmp.'" method="post">';
							echo '<button id="likeButton" class="botonGuay"  type="submit" name="like" value="'.$idEmp.'">Like</button>';
						echo '</form>';
					}
				}
			?>
		</div>
		<div class="row">
			<div id="card">
				<p class ='burbuja' id='btitulo'>Carta de presentacion</p>
				<?php
					echo "<p class='burbuja' id='btexto'> ".$transfer->getCartaPresentacion()." </p>";
				?>
			</div>
			<div id="card">
				<p class ='burbuja' id='btitulo'>Que ofrecemos</p>
				<?php
					echo "<p class='burbuja' id='btexto'> ".$transfer->getOfrecemos()." </p>";
				?>
			</div>
			<div id="card">
				<p class ='burbuja' id='btitulo'>Que buscamos</p>
				<?php
					echo "<p class='burbuja' id='btexto'> ".$transfer->getBuscamos()." </p>";
				?>
			</div>
		</div>
		<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_empresa']))
			if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_empresa']))){
					echo '<div class="row">
					<div class="row"><a  id= "botonSubmit" class ="botonGuay" href="mod_perf.php" >Modificar perfil</a>';
					echo '<a class ="botonGuay" href="crear_evento.php" >Crear Evento</a></div>
					</div>';
			}
		?>
	</div>
	<!--PHP LISTA LIKES-->

	<div style="margin-top: 40px; text-align: center; font-size: 30px; ">LISTA DE LIKES</div>
	<?php
			if(isset($_SESSION['login'])){
				echo "<div id='Modperfil'>";
				if($likesList != null){
				foreach($likesList as $transfer) {
					$idlikeDado = $transfer->getId_Usuario();
					$tUsuario = $SAUsuario->getElement($idlikeDado);
					$nombreUsuario = $tUsuario->getNombre();
					$nombreUsuario = $nombreUsuario . " " . $tUsuario->getApellido();

					echo '<p><a id="likes" class ="burbuja" href ="perfUser.php?id='.$idlikeDado.'">'.$nombreUsuario.'</a></p>';
				}
			}else{
				echo "<p style='color:red;'> Esta empresa no tiene likes aún </p>";
			}
				echo "</div>";
			}
	 ?>




	<?php require("common/footer.php")?>
</body>
</html>
