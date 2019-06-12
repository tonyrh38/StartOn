<?php require_once ("includes/config.php"); ?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="vista/css/common.css">
    <meta charset="utf-8">
<head>
	<title>Start On</title>
</head>
<body>
  		<?php require ("vista/common/indexHeader.php")?>
	<div id="container">
		<div class="row">
      <div class="rowC"> <!--Row titulo-->
        <div class="tituloIndx">Conectando talento con Startups</div>
      </div>
			<div class="titulo">
				<img id="logo_inicio" src="img/Logo1.png">
			</div>

			<?php
			if(isset($_SESSION['login'])){
				if($_SESSION['login']){
				if (isset($_SESSION['id_usuario'])) {
					$id = $_SESSION['id_usuario'];
				}else{
					$id = $_SESSION['id_empresa'];
				}
				echo "Bienvenido, Agente " . $_SESSION['nombre'];
				}
			}
			?>

		</div>
		<div class="row">
			<?php if (isset($_SESSION['login'])) {
				if(!$_SESSION['login']){
				echo '<div class="column"><a class= "botonGuay" id= "Botonusuario" href="vista/usr_signup.php" >Registro de usuarios</a></div>
					<div class="column"><a class= "botonGuay" id= "Botonempresa" href="vista/emp_signup.php">Registro de empresas</a></div>';
				}
			} ?>

		</div>
    <div id="espacio"></div>
    <div class="rowind">
        <div class="fraseIndx">Si buscas sumergirte en el mundo de las Startups, encontraremos la indicada para ti</div>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <img class="fotoIndex" src="img/indexpic1.png">
    </div>
    <div class="rowind">
      <img class="fotoIndex" src="img/indexpic2.png">
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      <div class="fraseIndx">Si tienes una startup joven, queremos que encuentres al talento ideal para desarollar tu proyecto</div>
    </div>
    <div id="espacio"></div>
    <div class="rowind">
      <div class="fraseIndx">Nuestra idea surgió al observar los tablones del Google campus Madrid.</div>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      <img class="fotoIndex" src="img/indexpic3.png">
    </div>
    <div class="rowind">
        <img class="fotoIndex" src="img/indexpic4.png">
          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
          <div class="fraseIndx">En uno, las startups ofrecían un puesto de trabajo y en el otro la gente se presentaba marcando sus capacidades</div>
    </div>
	</div>
  		<?php require ("vista/common/footer.php")?>
</body>
</html>
