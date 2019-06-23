<?php
namespace es\ucm\fdi\aw;

class SA_Usuario 
{

  const CIFRADO = '67a74306b06d0c01624fe0d0249a570f4d093747';
  private static $instance = null;
  //Evitamos asi la contruccion de la clase
  private function __construct() {  }
  //Para acceder a la instancia de la clase
  public static function getInstance() {
    if (self::$instance == null) {
      self::$instance = new SA_Usuario();
    }
    return self::$instance;
  }

  /**Esta lista solo se genera cuando se ha iniciado sesion
  @return lista: contiene una lista de todos los elementos de la lista de usuarios sin filtros*/
	function getAllElements(){
	 $userDAO = DAO_Usuario::getInstance();
	 return 	$userDAO->getAllElements();
	}

	/**@param id: posible id de un usuario
    @return error: si el id del usuario es incorrecto
    @return id: si el usuario existe en la base de datos
    */
	function getElement($id){
	 $userDAO = DAO_Usuario::getInstance();
	 $res = $userDAO->getElementById($id);
    if($res  == null) {
		  return "Error";
		}
    else{
		  return $res;
    }
  }

  function existEmail($email){
    $userDAO = DAO_Usuario::getInstance();
    $res = $userDAO->getElementByEmail($email); 
    if($res  == null) {
        return false;
    }
    else{
       return true;
    }
  }

  /**Esta funcion se encarga de crear un elemento a partir de un transfer
   * @param transfer: contiene un transfer con posibles datos de un usuario
     @return error: si la creacion del usuario esta incorrecta
     @return .php: pagina del usuario
  */
  function createElement($transfer) {
		$userDAO = DAO_Usuario::getInstance();
    //Recibimos la lista de los elementos que tenemos en la base de datos
    if($userDAO->getElementByEmail($transfer->getEmail()) == NULL) {
      $elements = $userDAO->getAllElements();
      $size = sizeof($elements);
      //Generamos el id del nuevo usuario a partir del tamaño de la lista
      $transfer->setId_Usuario($this->generateId($elements[$size-1]->getId_Usuario()));
      //Añadimos el elemento a la base de datos a traves del DAO
			$prueba = $userDAO->createElement($transfer);
		  return $transfer;
    }
    return null;
  }

  /**Esta funcion se encarga de logear un usuario a traves del numero del tamaño
    @param size: contiene un entero positivo
    @return size + 1: devuelve un numero posterior al pasado por parametro*/
  function generateId($size) {
    return $size +1 ;
  }

  /**Esta funcion se encarga de actualiar los campos de un usuario,
   * no puedes acceder a esta funcion si el usuario no ha iniciado sesion
    @param transfer: contiene un transfer de usuario
    @return errores: devuelve los errores cometidos en la ejecucion de las comprobaciones de la funcion
    @return .php: si el codigo es correcto se genera el perfil de usuario o si la verificación no ha sido incorrecta se carga la pagina principal*/
	function updateElement($transfer){
    //Se comprueba que el id del posible usuario no esta vacio
		if (empty($transfer->getId_Usuario())) {
			return "Error";
		}
		//Realizamos la conexion
		$userDAO = DAO_Usuario::getInstance();
    //Comprobamos si el identificador del usuario existe en nuestra base de datos
		if ($userDAO->getElementById($transfer->getId_Usuario())) {
			//Modificamos los diferentes campos de la base de datos que no esten incorrectos
    	if (!empty($transfer->getNombre())) {
    		$userDAO->updateElement($transfer->getId_Usuario(),"Nombre" ,$transfer->getNombre());
      }
      if (!empty($transfer->getApellido())) {
    		$userDAO->updateElement($transfer->getId_Usuario(),"Apellidos" ,$transfer->getApellido());
      }
			if (!empty($transfer->getPassword()) && $transfer->getPassword() != self::CIFRADO) {
				$userDAO->updateElement($transfer->getId_Usuario(),"password",$transfer->getPassword());
			}
			if (!empty($transfer->getEmail())) {
				$userDAO->updateElement($transfer->getId_Usuario(),"email" ,$transfer->getEmail());
			}
			if (!empty($transfer->getLocalizacion())) {
				$userDAO->updateElement($transfer->getId_Usuario(),"Localizacion" ,$transfer->getLocalizacion());
			}
		  if (!empty($transfer->getExperiencia())) {
				$userDAO->updateElement($transfer->getId_Usuario(),"Experiencia" ,$transfer->getExperiencia());
			}
			if (!empty($transfer->getPasiones())) {
				$userDAO->updateElement($transfer->getId_Usuario(),"Pasiones" ,$transfer->getPasiones());
			}
			if (!empty($transfer->getCartaPresentacion())) {
    		$userDAO->updateElement($transfer->getId_Usuario(),"cartaPresentacion" ,$transfer->getCartaPresentacion());
			}
      if (!empty($transfer->getImagenPerfil())) {
    		$userDAO->updateElement($transfer->getId_Usuario(),"Img_Perfil" ,$transfer->getImagenPerfil());
			}
			if (!empty($transfer->getOficio())) {
				$userDAO->updateElement($transfer->getId_Usuario(),"Oficio" ,$transfer->getOficio());
			}
      if (!empty($transfer->getCurriculum())) {
        $userDAO->updateElement($transfer->getId_Usuario(),"Curriculum" ,$transfer->getCurriculum());
      }
      return "perfUser.php";
		}
  }

  /**Esta funcion se encarga de logear un usuario a traves del id
  @param transfer: contiene un transfer con posibles datos de un usuario
  @return transfer: si el codigo es correcto se devuelve el transfer del usuario
  */
  function login($transfer) {
    $userDAO = DAO_Usuario::getInstance();
    //Devuelve un transfer que debe contenir el valor de un gmail, puede devolver un objeto nulo
    $userObject = $userDAO->getElementByEmail($transfer->getEmail());
    //Se comprueba que la contraseña que recibimos en el transfer coincicide con el valor hasheado del transfer recibido por el DAO
    $password = $transfer->getPassword();
    if($userObject == null || $userObject->getEmail() == "0" || $password !== $userObject->getPassword()){
      return null;
    }
    else{
      return $userObject;
    }
  }

 /**Esta funcion se encarga de eliminar un usuario de la base de datos
  @param transfer: contiene un transfer de usuario
  @return errores: devuelve un numero posterior al pasado por parametro
  @return .php: si el codigo es correcto se genera el perfil de usuario o si la verificación no ha sido incorrecta se carga la pagina principal*/
	function deleteElement($id){
		$userDAO = DAO_Usuario::getInstance();
		if ($userDAO->deleteElement($id)) {
			return "logout.php";
		}
		else {
				return "Error";
		}
  }

  function getAllElementsById($id) {
    $userDAO = DAO_Usuario::getInstance();
    return 	$userDAO->getAllElements();
  }
}
?>