<?php
	require_once "../includes/config.php";
	include_once "../logica/SA_Usuario.php";
	include_once "../logica/SA_Empresa.php";
 ?>

 <?php
if(isset($_SESSION['login']) /*&& $_SESSION['login'] == true*/){
 		if(isset($_SESSION['id_usuario'])){
 			$id= $_SESSION['id_usuario'];
 			$SA= SA_Usuario::getInstance();
 		}else{
 			$id= $_SESSION['id_empresa'];
 			$SA= SA_Empresa::getInstance();
 		}
 	}

 	$dir= $SA->deleteElement($id);
 	if($dir !== "Error"){
 		header('Location: '.$dir);
 	}else{
 		header('Location: ../index.php');
 	}
  ?>
