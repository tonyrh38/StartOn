<?php 
	require_once "../includes/config.php";
	include_once "../logica/SA_Eventos.php";
 ?>

 <?php 
 	$id= $_SESSION['evento_eliminar'];
	$SA= SA_Eventos::getInstance();
 	$dir= $SA->deleteElement($id); 	
 	if($dir !== "Error"){
 		header('Location: '.$dir);
 	}else{
 		header('Location: ../index.php');
 	}
  ?>