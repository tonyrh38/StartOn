<?php 
  require_once __DIR__.'/../includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/css.css">
  <meta charset="utf-8">
	<title>Start On</title>
</head>
<body>
  <?php require("common/header.php")?>
	<div class="container">
    <div class="row">
      <div class="titulo">
        Preguntas frecuentes (FAQ)
      </div>
    </div>
    <div class="row">
      <div class="ayudaCard">
        <h3>¿Donde selecciono que tipo de startup soy?</h3>
        <div>
          Tras el primer login en nuestra página podrás editar tu perfil y añadir el sector en el que opera tu startup.
        </div>
      </div>
    </div>
    <div class="row">
      <div class="ayudaCard">
        <h3>¿Necesito algún requisito para registrar mi startup?</h3>
        <div>
          ¡Para nada! Cualquier startup, sea cual sea su nivel de desarrollo, puede formar parte de nuestra plataforma. Desde una idea y su pequeño proyecto, hasta un unicornio como Uber.
        </div>
      </div>
    </div>
    <div class="row">
      <div class="ayudaCard">
        <h3>¿Tengo que estar buscando empleo para registrarme como usuario?</h3>
        <div>
          No, no es necesario. Si quieres conocer el panorama del emprendimiento a tus alrededores y contactar con ellos estás invitado.
        </div>
      </div>
    </div>
    <div class="row">
      <div class="ayudaCard">
        <h3>¿La plataforma es gratis?</h3>
        <div>
          Actualmente el servicio es completamente gratis, con un posible desarrollo a plataforma freemium.
        </div>
      </div>
    </div>
    <div class="row">
      <div class="ayudaCard"> <!--Row titulo-->
        <h3>¿Puedo contactar con una startup de la plataforma?</h3>
        <div>
          El contacto se tiene que realizar por correo ya que por ahora no disponemos de sistema de mensajeria, en el futuro tendrás la opción de añadirla a tu lista de favoritas.
        </div>
      </div>
    </div>
    <div class="row">
      <div class="ayudaCard">
        <h3>¿Puedo cambiar mi usuario para que sea una startup?</h3>
        <div>
          Actualmente no existe esta posibilidad ya que al principio del registro se hace la selección entre startup y usuario.
        </div>
      </div>
    </div>
    <div class="row">
      <div class="titulo">
        ¿Buscas otra cosa? ¡Escríbenos!
      </div>
    </div>
    <div class="row">
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
    <div class="row">
      <div class="ayudaCard">
          <a href="politicaprivacidad.php">Política de privacidad.</a>
      </div>
    </div>
  </div>
	<?php require("common/footer.php")?>
</body>
</html>
