<?php 
  require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="vista/css/css.css">
    <meta charset="utf-8">
<head>
	<title>Start On</title>
</head>
<body>
  <?php require ("vista/common/indexHeader.php")?>
	<div id="container">
    <?php
      var_dump($_SESSION); 
    ?>
		<div class="row">
      <div class="tituloIndex">Conectando talento con Startups</div>
    </div>
    <div class="row">
      <img id="logo_inicio" src="resources/img/info/icono1.png">
    </div>
    <div class="row">
			<?php
  			if(isset($_SESSION['login'])){
  				if($_SESSION['login']){
  				if (isset($_SESSION['id_usuario'])) {
  					$id = $_SESSION['id_usuario'];
  				}else{
  					$id = $_SESSION['id_empresa'];
  				}
  				echo "<p>Bienvenido, " . $_SESSION['nombre']."</p>";
  				}
  			}
			?>
    </div>
		<div class="row">
			<?php if (isset($_SESSION['login'])) {
				if(!$_SESSION['login']){
				echo '<div class="column"><a id="botonUsuario" class= "botonGuay" href="vista/usr_signup.php" >Registro de usuarios</a></div>
					<div class="column"><a id="botonEmpresa" class= "botonGuay" href="vista/emp_signup.php">Registro de empresas</a></div>';
				}
			} ?>
		</div>
    <div class="row rowind">
        <div class="fraseIndex">Si buscas sumergirte en el mundo de las Startups, encontraremos la indicada para ti.</div>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <img class="fotoIndex" src="resources/img/info/indexpic1.png">
    </div>
    <div class="row rowind">
      <img class="fotoIndex" src="resources/img/info/indexpic2.png">
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      <div class="fraseIndex">Si tienes una startup joven, queremos que encuentres al talento ideal para desarollar tu proyecto</div>
    </div>
    <div class="row rowind">
      <div class="fraseIndex">Nuestra idea surgió al observar los tablones del Google campus Madrid.</div>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      <img class="fotoIndex" src="resources/img/info/indexpic3.png">
    </div>
    <div class="row rowind">
        <img class="fotoIndex" src="resources/img/info/indexpic4.png">
          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
          <div class="fraseIndex">En uno, las startups ofrecían un puesto de trabajo y en el otro la gente se presentaba marcando sus capacidades</div>
    </div>
	</div>
  <?php require ("vista/common/footer.php")?>
</body>
</html>
