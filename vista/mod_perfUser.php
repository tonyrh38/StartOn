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
<body>
	<?php require("common/header.php")?>
	<div class="row">
		    <?php
      var_dump($_SESSION); 
    ?>
    	<div class="titulo">Modificar campos:</div>
		<div class="form-consulta" style="margin-bottom: 10px">
			<?php 
				$form = new es\ucm\fdi\aw\FormularioModificarUsuario();
				$form->gestiona();
			?>
		</div>
	</div>
	<?php require("common/footer.php")?>
</body>
</html>
