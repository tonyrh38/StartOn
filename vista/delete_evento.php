<?php 
	require_once __DIR__.'/../includes/config.php';

	$id= $_SESSION['id_evento'];
	$SA= es\ucm\fdi\aw\SA_Eventos::getInstance();
	$dir= $SA->deleteElement($id);
	unset($_SESSION['id_evento']);
	if($dir !== "Error"){
		header('Location: '.$dir);
	}else{
		header('Location: ../index.php');
	}
 ?>