<?php if(!isset($_SESSION['login'])) $_SESSION['login']=false ?>
	<div id="cabecera">
	<ul>
		<li><a href="index.php"><img id='logo_cabecera' src="img/Logo1.png"></a>
		<li><a href="vista/listEmpresa.php">Startups</a>
		<li><a href="vista/listUser.php">Usuarios</a>
		<li><a href="vista/listaEventos.php">Eventos</a>
		<li><a href="vista/conocenos.php">Conócenos</a>
		<li><a href="vista/ayuda.php">Ayuda</a>
		<?php
			if(!$_SESSION['login'])
				echo '<li style="float:right"><a id="inicio_sesion" href="vista/login.php">Inicia sesión</a>';
			else{
				echo '<li style="float:right"><a id="inicio_sesion" href="vista/logout.php">Cerrar sesión</a>';
				if(isset($_SESSION['id_usuario']))
					echo '<li style="float:right"><a id="inicio_sesion" href="vista/perfUser.php">Perfil</a>';
				else
					echo '<li style="float:right"><a id="inicio_sesion"  href="vista/perfEmp.php">Perfil</a>';
			}
		?>
	</ul>
</div>
