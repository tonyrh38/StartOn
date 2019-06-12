<?php require_once ("../includes/config.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <title>Start On</title>
    <meta charset="utf-8">
  </head>

  <body>
    <?php require("common/header.php")?>
  	<div id="container">

  		<div class="rowC"> <!--Row titulo-->
  			<div class="titulo">Conócenos</div>
  		</div>

  		<div class="rowC">
        <div class ="burbuja" id="bconocenos">
  				<p>Esta página ha sido realizada como parte de un proyecto universitario de la Universidad Complutense de Madrid.</p>
          <p>"Nuestro proyecto se trata de una web para poner en contacto a personas interesadas
          en el mundo del emprendimiento que estén en la etapa laboral de su vida con startups
           en cualquier fase que quieran buscar a nuevos integrantes en sus equipos.</p>
  			</div>
      </div>

      <div class="rowC">
    		<div class="titulo">Nuestro equipo</div>
    	</div>

      <div class="row_content"  id="pers1">
        <div class="conocenosCard">
          <h2>Pablo Aguilera Heredero</h2>
          <img src = "../img/pabloa.jpg">
	   			<p class="burbuja" id="btitulo"><i>pablagui@ucm.es</i></p>
				  <p class="burbuja" id="btexto">Programador y diseñador CSS, nacido en Madrid en 1995, estudiante de ingeniería informática en la universidad complutense de Madrid. Se unió al proyecto debido a la dificultad a la que se enfrentó al intentar encontrar gente para su nueva StartUp.</p>
			  </div>
      </div>

		<div class="row_content"  id="pers2">
			<div class="conocenosCard">
				<h2>Pablo Fernández Jara</h2>
        <img src = "../img/pablof.jpg">
	   			<p class="burbuja" id="btitulo"><i>pablof10@ucm.es</i></p>
				<p class="burbuja" id="btexto">Programador y diseñador CSS, estudiante de ingeniería informática en la universidad complutense de Madrid. Se unió al proyecto motivado por facilitar a los nuevos graduados salidas laborales en el ámbito de la programación. </p>
			</div>
		</div>

		<div class="row_content"  id="pers3">
			<div class="conocenosCard">
				<h2>Eric Heresi Medina</h2>
        <img src = "../img/eric.jpg">
	   			<p class="burbuja" id="btitulo"><i>eheresi@ucm.es</i></p>
				<p class="burbuja" id="btexto">Programador especialicado en php, estudiante de ingeniería informática en la universidad complutense de Madrid. Se unió al proyecto para facilitar a las startups una fácil contratación de personal.</p>
			</div>
		</div>

		<div class="row_content"  id="pers4">
			<div class="conocenosCard">
				<h2>Jennifer Marmolejos Urbaz</h2>
        <img src = "../img/jeni.jpg">
	   			<p class="burbuja" id="btitulo"><i>jenmarmo@ucm.es</i></p>
				<p class="burbuja" id="btexto">Alumna de Ingenieria Informática,me encanta programar por libre en lenguajes como Swift o Python, resolver problemas de algoritmia es mi pasión!! </p>
			</div>
		</div>

		<div class="row_content"  id="pers5">
			<div class="conocenosCard">
				<h2>Cristian Molina Muñoz</h2>
        <img src = "../img/cris.jpg">
	   			<p class="burbuja" id="btitulo"><i>crismo04@ucm.es</i></p>
				<p class="burbuja" id="btexto">Programador y diseñador CSS, nacido en Soria en 1996, estudiante de ingeniería informática en la universidad complutense de Madrid. Abandonó su pequeño pueblo para venir a cumplir su sueño de crear una página web que pueda ayudar a la gente</p>
			</div>
		</div>

		<div class="row_content"  id="pers6">
			<div class="conocenosCard">
				<h2>Daniel Piña Miguelsanz</h2>
        <img src = "../img/piña.jpg">
	   			<p class="burbuja" id="btitulo"><i>danpina@ucm.es</i></p>
				<p class="burbuja" id="btexto">Estusiasta del emprendimiento y estudiante de ingenieria informática. Trabajando duro y aprendiendo día a día para construir mi camino, centrándome en lo que de verdad me importa en el recorrido.</p>
			</div>
		</div>

		<div class="row_content" id="pers7">
			<div class="conocenosCard">
				<h2>Antonio Rodríguez Hurtado</h2>
        <img src = "../img/toni.jpg">
	   			<p class="burbuja" id="btitulo"><i>antrod03@ucm.es</i></p>
				<p class="burbuja" id="btexto">Programador especializado en páginas webs, estudiante de ingeniería informática en la universidad complutense de Madrid. Se unió al proyecto para intentar dejar huella creando accesos a los nuevos emprendedores</p>
			</div>
		</div>

    <div class="rowC"> <!--Row titulo-->
      <div class="titulo">Si tienes alguna pregunta</div>
    </div>

      <div class="row"> <!--/Row Formulario contacto-->
        <body>
        	<form action="" method="post" class="form-consulta"> <!-- /ProyectoStartOn/logica/tratadoContacto.php -->
        		<label>Nombre y apellido: <span>*</span>
        			<input type="text" name="nombre" placeholder="Nombre y apellido" class="campo-form" required>
        		</label>

        		<label>Email: <span>*</span>
        			<input type="email" name="email" placeholder="Email" class="campo-form" required>
        		</label>

        		<label>Consulta:
        			<textarea name="consulta" class="campo-form"></textarea>
        		</label>

        		<input type="submit" value="Enviar" class="btn-form">
        	</form>
        </body>
      </div>
  </div>
  </body>
      		<?php require("common/footer.php")?>
</html>
