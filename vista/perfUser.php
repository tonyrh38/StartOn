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
		<div id="card">
			<?php
				echo '<img src= "../'.$transferUser->getImagenPerfil().'"  style="width:100%">';
				echo " <p class='burbuja' id='btitulo'> ".$transferUser->getNombre()."  ".$transferUser->getApellido()."</p>";
				echo " <p class ='burbuja'> ".$transferUser->getOficio()." </p>";
				echo " <p class ='burbuja'> ".$transferUser->getLocalizacion()." </p>";
			?>
		</div>
		<div class="row">
			<div id="card">
				<p class ='burbuja' id='btitulo'>Carta de presentacion</p>
				<?php
					echo "<p class='burbuja' id='btexto'> ".$transferUser->getCartaPresentacion()." </p>";
				?>
			</div>

			<div id="card">
				<p class ='burbuja' id='btitulo'>Experiencia</p>
				<?php
					echo "<p class='burbuja' id='btexto'> ".$transferUser->getExperiencia()." </p>";
				?>
			</div>

			<div id="card">
				<p class ='burbuja' id='btitulo'>Pasiones</p>
				<?php
					echo "<p class='burbuja' id='btexto'> ".$transferUser->getPasiones()." </p>";
				?>
			</div>
		</div>
		<?php
			if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_usuario']))
				if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_usuario']))){
					echo '	<div class="row">
								<a class ="botonGuay" href="mod_perf.php" >Modificar perfil</a>
								<a class ="botonGuay" href="download.php?id='.$_SESSION["id_usuario"].'" >Currículum</a>
							</div>';
				}
				else{
					echo '	<div class="row">
								<a class ="botonGuay" href="download.php?id='.$_GET["id"].'" >Currículum</a>
							</div>';
				}
		?>
	</div>	
</body>
</html>
