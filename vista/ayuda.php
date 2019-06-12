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
  	<div class="container">
      <div class="row"> <!--Row PREGUNTAS FRECUENTES-->
        <div class="titulo"> <!--Div Titulo-->
          Preguntas frecuentes (FAQ)
        </div>
      </div>

      <div class="ayudaCard"> <!--Row titulo-->
        <div>
          <p><b>¿Donde selecciono que tipo de startup soy?</b></p>
        </div>
        <div>
          <p>Tras el primer login en nuestra página podrás editar tu perfil y añadir el sector en el que opera tu startup.</p>
        </div>
      </div>

      <div class="ayudaCard"> <!--Row titulo-->
        <div>
        <p><b>¿Necesito algún requisito para registrar mi startup?</b></p>
        </div>
        <div>
          <p>¡Para nada! Cualquier startup, sea cual sea su nivel de desarrollo, puede formar parte de nuestra plataforma. Desde una idea y su pequeño proyecto, hasta un unicornio como Uber</p>
        </div>
      </div>

      <div class="ayudaCard"> <!--Row titulo-->
        <div>
        <p><b>¿Tengo que estar buscando empleo para registrarme como usuario?</b></p>
        </div>
        <div>
          <p>No, no es necesario. Si quieres conocer el panorama del emprendimiento a tus alrededores y contactar con ellos estás invitado.</p>
        </div>
      </div>

      <div class="ayudaCard"> <!--Row titulo-->
        <div>
        <p><b>¿La plataforma es gratis?</b></p>
        </div>
        <div>
          <p>Actualmente el servicio es completamente gratis, con un posible desarrollo a plataforma freemium.</p>
        </div>
      </div>


      <div class="ayudaCard"> <!--Row titulo-->
        <div>
        <p><b>¿Puedo contactar con una startup de la plataforma?</b></p>
        </div>
        <div>
          <p>El contacto se tiene que realizar por correo ya que por ahora no disponemos de sistema de mensajeria, en el futuro tendrás la opción de añadirla a tu lista de favoritas.</p>
        </div>
      </div>

      <div class="ayudaCard"> <!--Row titulo-->
        <div>
        <p><b>¿Puedo cambiar mi usuario para que sea una startup?</b></p>
        </div>
        <div>
          <p>Actualmente no existe esta posibilidad ya que al principio del registro se hace la selección entre startup y usuario.</p>
        </div>
      </div>


      <div class="row"> <!--Row BUSCAS OTRA COSA-->
        <div class="titulo"> <!--Div Titulo-->
          ¿Buscas otra cosa? ¡Escribenos!
        </div>
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
      <div class="ayudaCard"> <!--Row BUSCAS OTRA COSA-->
        <div class="card"> <!--Div Titulo-->
          <a href="politicaprivacidad.php">Política de privacidad.</a>
        </div>
      </div>

    </div>
  		<?php require("common/footer.php")?>
  </body>
</html>
