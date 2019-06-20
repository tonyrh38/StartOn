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
		if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_usuario'])){
			if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_usuario']))){
				$id = $_SESSION['id_usuario'];
				$SA = es\ucm\fdi\aw\SA_Usuario::getInstance();
				$transferUser = $SA->getElement($id);
			}
			else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = es\ucm\fdi\aw\SA_Usuario::getInstance();
			$transferUser = $SA->getElement($id);

			}
		}
		else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = es\ucm\fdi\aw\SA_Usuario::getInstance();
			$transferUser = $SA->getElement($id);

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
			<div class="row">
				<div id="card">
					<?php
						echo '<img src= "../'.$transferUser->getImagenPerfil().'"  style="width:100%">';
						echo " <p class='burbuja' id='btitulo'> ".$transferUser->getNombre()."  ".$transferUser->getApellido()."</p>";
						if (!empty($transferUser->getOficio())) {
							echo " <p class ='burbuja'> ".$transferUser->getOficio()." </p>";
						}
						if (!empty($transferUser->getLocalizacion())) {
							echo " <p class ='burbuja'> ".$transferUser->getLocalizacion()." </p>";
						}
					?>
				</div>
			</div>
			<?php
				if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_usuario'])){
					if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_usuario']))){
						echo '	
						<div class="row">
							<a class ="botonGuay" href="mod_perfUser.php" >Modificar perfil</a>
						</div>';
						if (!empty($transferUser->getCurriculum())) {
							echo '	
							<div class="row">
								<a class ="botonGuay" href="download.php?id='.$transferUser->getId_Usuario().'" >Currículum</a>
							</div>';
						}
					}
				}
				elseif(isset($_SESSION['login']) && $_SESSION['login'] == true){
					if (!empty($transferUser->getCurriculum())) {
							echo '	
							<div class="row">
								<a class ="botonGuay" href="download.php?id='.$_GET["id"].'" >Currículum</a>
							</div>';
					}
				}
			?>
		</div>
		<div class="right-column">
			<?php
				if (!empty($transferUser->getCartaPresentacion())) {
					echo "
					<div class='row'>
						<div id='card'>
							<p class ='burbuja' id='btitulo'>Carta de presentacion</p>
							<p class='burbuja' id='btexto'> ".$transferUser->getCartaPresentacion()." </p>
						</div>
					</div>";
				}
				if (!empty($transferUser->getExperiencia())) {
					echo "
						<div class='row'>
							<div id='card'>
								<p class ='burbuja' id='btitulo'>Experiencia</p>
								<p class='burbuja' id='btexto'> ".$transferUser->getExperiencia()." </p>
							</div>
						</div>";
				}
				if (!empty($transferUser->getPasiones())) {
					echo "
						<div class='row'>
							<div id='card'>
								<p class ='burbuja' id='btitulo'>Pasiones</p>
								<p class='burbuja' id='btexto'> ".$transferUser->getPasiones()." </p>	
							</div>
						</div>";
				}
			?>
		</div>
	</div>	
</body>
</html>
