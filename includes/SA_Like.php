<?php
namespace es\ucm\fdi\aw;

class SA_Like
{

    const CIFRADO = '67a74306b06d0c01624fe0d0249a570f4d093747';

    private static $instance = null;
    //Evitamos asi la contruccion de la clase
    private function __construct() {  }
    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new SA_Like();
        }
        return self::$instance;
      }

     /**Para acceder a esta funcion se debe estar iniciado sesion
     @return lista: contiene una lista de todos los elementos de la lista de usuarios sin filtros o null*/
	function getAllElements(){
	  $likeDAO = DAO_Like::getInstance();
		return $likeDAO->getAllElements();
	}

function getElementsByIdEmpresa($id_Empresa){
  $likeDAO = DAO_Like::getInstance();
  return $likeDAO->getElementsByIdEmpresa($id_Empresa);
}

function getElementsByIdUsuario($id_Usuario){
  $likeDAO = DAO_Like::getInstance();
  return $likeDAO->getElementsByIdUsuario($id_Usuario);
}

function getElementsByIds($id_Empresa, $id_Usuario){
  $likeDAO = DAO_Like::getInstance();
  return $likeDAO->getElementsByIds($id_Empresa, $id_Usuario);
}

function deleteLike($id_Empresa, $id_Usuario){
  if (empty($id_Empresa) || empty($id_Usuario)) {
    return "Error";
  }

  $likeDAO = DAO_Like::getInstance();
  return $likeDAO->deleteLike($id_Empresa, $id_Usuario);
}

function deleteElementByIdEmpresa($id_Empresa){
  if (empty($id_Empresa)) {
    return "Error";
  }
  $likeDAO = DAO_Like::getInstance();
  return $likeDAO->deleteElementByIdEmpresa($id_Empresa);
}

function deleteElementByIdUsuario($id_Usuario){
  $likeDAO = DAO_Like::getInstance();
  return $likeDAO->deleteElementByIdUsuario($id_Usuario);
}

function insertLike($idEmpresa, $iduser){
  $likeDAO = DAO_Like::getInstance();

  return $likeDAO->insertLike($idEmpresa, $iduser);
}

function createElement($transfer) {
//comprobamos si algun campo esta vacio y notificamos el error si lo estae, estos campos son obligatorios para crear un nuevo elemento
	if (empty($transfer->getId_Empresa()) || empty($transfer->getId_Usuario())) {
	     return "Error";
	}

	$likeDAO = DAO_Like::getInstance();
		$prueba = $empDAO->createElement($transfer);
    return true;
  }
}
?>
