<?php if(!isset($_SESSION['login'])) $_SESSION['login']=false ?>
	<div id="cabecera">
	<ul>
		<li><a href="../index.php"><img id='logo_cabecera' src="../img/Logo1.png"></a>
		<li><a href="listEmpresa.php">Startups</a>
		<li><a href="listUser.php">Usuarios</a>
		<li><a href="listaEventos.php">Eventos</a>
		<li><a href="conocenos.php">Conócenos</a>
		<li><a href="ayuda.php">Ayuda</a>
		<?php
			if(!$_SESSION['login'])
				echo '<li style="float:right"><a id="inicio_sesion" href="login.php">Inicia sesión</a>';
			else{
				echo '<li style="float:right"><a id="inicio_sesion" href="logout.php">Cerrar sesión</a>';
				if(isset($_SESSION['id_usuario']))
					echo '<li style="float:right"><a id="inicio_sesion" href="perfUser.php">Perfil</a>';
				else
					echo '<li style="float:right"><a id="inicio_sesion"  href="perfEmp.php">Perfil</a>';
			}
		?>
	</ul>
</div>
