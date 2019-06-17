<?php
//session_start();
require("DAO_Comentario.php");
require("transferComentario.php");
require_once("SA_Interface.php");

class SA_Comentario{

    const CIFRADO = '67a74306b06d0c01624fe0d0249a570f4d093747';

    private static $instance = null;
    //Evitamos asi la contruccion de la clase
    private function __construct() {  }
    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new SA_Comentario();
        }
        return self::$instance;
      }

     /**Para acceder a esta funcion se debe estar iniciado sesion
     @return lista: contiene una lista de todos los elementos de la lista de usuarios sin filtros o null*/
	function getAllElements(){
	  $ComentarioDAO = DAO_Comentario::getInstance();
		return $ComentarioDAO->getAllElements();
	}

function getElementsByNombreEvento($NombreEvento){
  $ComentarioDAO = DAO_Comentario::getInstance();
  return $ComentarioDAO->getElementsByNombreEvento($NombreEvento);
}

function getElementsByIdUsuario($id_Usuario){
  $ComentarioDAO = DAO_Comentario::getInstance();
  return $ComentarioDAO->getElementsByIdUsuario($id_Usuario);
}

function getElementsByIds($NombreEvento, $id_Usuario){
  $ComentarioDAO = DAO_Comentario::getInstance();
  return $ComentarioDAO->getElementsByIds($NombreEvento, $id_Usuario);
}

function deleteElement($NombreEvento, $id_Usuario){
  if (empty($NombreEvento) || empty($id_Usuario)) {
    return "Error";
  }

  $ComentarioDAO = DAO_Comentario::getInstance();
  return $ComentarioDAO->deleteElement($NombreEvento, $id_Usuario);
}

function deleteElementByNombreEvento($NombreEvento){
  if (empty($NombreEvento)) {
    return "Error";
  }
  $ComentarioDAO = DAO_Comentario::getInstance();
  return $ComentarioDAO->deleteElementByNombreEvento($NombreEvento);
}

function deleteElementByIdUsuario($id_Usuario){
  $ComentarioDAO = DAO_Comentario::getInstance();
  return $ComentarioDAO->deleteElementByIdUsuario($id_Usuario);
}

    function createElement($transfer) {
		//comprobamos si algun campo esta vacio y notificamos el error si lo estae, estos campos son obligatorios para crear un nuevo elemento
			if (empty($transfer->getNombreEvento()) || empty($transfer->getId_Usuario())) {
			     return "Error";
			}

			$ComentarioDAO = DAO_Comentario::getInstance();
				$prueba = $ComentarioDAO->createElement($transfer);
        return true;
      }
}
?>
