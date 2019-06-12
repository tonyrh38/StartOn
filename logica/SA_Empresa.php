<?php
//session_start();
require("DAO_Empresa.php");
require("TransferEmpresa.php");
require_once("SA_Interface.php");

class SA_Empresa implements SA_Interface {

    const CIFRADO = '67a74306b06d0c01624fe0d0249a570f4d093747';

    private static $instance = null;
    //Evitamos asi la contruccion de la clase
    private function __construct() {  }
    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new SA_Empresa();
        }
        return self::$instance;
      }

     /**Para acceder a esta funcion se debe estar iniciado sesion
     @return lista: contiene una lista de todos los elementos de la lista de usuarios sin filtros o null*/
	function getAllElements(){
	  $empDAO = DAO_Empresa::getInstance();
		return $empDAO->getAllElements();
	}

	/**@param id: posible id de una empresa
       @return error: si el id de la empresa es incorrecto
       @return id: si el usuario existe en la base de datos
    */
	function getElement($id){
	  $empDAO = DAO_Empresa::getInstance();
		return $empDAO->getElementById($id);
  }

    /**Esta funcion se encarga de crear un elemento a partir de un transfer
     * @param transfer: contiene un transfer con posibles datos de una empresa
       @return error: si la creacion de la empresa esta incorrecta
       @return .php: pagina de la empresa
    */
    function createElement($transfer) {
		//comprobamos si algun campo esta vacio y notificamos el error si lo estae, estos campos son obligatorios para crear un nuevo elemento
    //comprobamos si algun campo esta vacio y notificamos el error si lo estae, estos campos son obligatorios para crear un nuevo elemento
			if (empty($transfer->getNombre()) || empty($transfer->getEmail()) || empty($transfer->getPassword()) || $transfer->getPassword() == self::CIFRADO) {
			     return "Error";
			}

			//Si el tamaño del array es 0 significa que no tenemos errores en la lista

			$empDAO = DAO_Empresa::getInstance();
			    //Recibimos la lista de los elementos que tenemos en la base de datos
		  if($empDAO->getElementByEmail($transfer->getEmail()) == NULL) {
        $elements = $empDAO->getAllElements();
        $size = sizeof($elements);

            //Generamos el id del nuevo usuario a partir del tamaño de la lista
        $transfer->setId_Empresa($this->generateId($elements[$size-1]->getId_Empresa()));
		     //Hasheamos la contraseña para evitar fallos de seguridad
		    $transfer->setPassword($transfer->getPassword());
		    //Añadimos el elemento a la base de datos a traves del DAO
				$prueba = $empDAO->createElement($transfer);
        $_SESSION['id_empresa'] =$transfer->getId_Empresa();
        $_SESSION['login'] = true;
        $_SESSION['nombre'] = $transfer->getNombre();
    		return "perfEmp.php";
        }
        return "Error";
      }

        /**Esta funcion se encarga de logear un usuario a traves del numero del tamaño
          @param size: contiene un entero positivo
          @return size + 1: devuelve un numero posterior al pasado por parametro*/
        function generateId($size) {
            return $size + 1;
        }

        /**Esta funcion se encarga de actualiar los campos de una emprea, no puedes acceder a esta funcion
         * si el usuario no ha iniciado sescion
          @param transfer: contiene un transfer de empresa
          @return errores: devuelve los errores cometidos en la ejecucion de las comprobaciones de la funcion
          @return .php: si el codigo es correcto se genera el perfil de usuario o si la verificación no ha sido incorrecta se carga la pagina principal*/
	    function updateElement($transfer) {

		    //Se comprueba que el id del posible empresario no esta vacio
  			if (empty($transfer->getId_Empresa())) {
  				return "Error";
  			}

			//Realizamos la conexion
			$empDAO = DAO_Empresa::getInstance();
            //Comprobamos si el identificador de la empresa existe en nuestra base de datos
			if ($empDAO->getElementById($transfer->getId_Empresa())) {
                //Modificamos los diferentes campos de la base de datos que no esten incorrectos
    				if (!empty($transfer->getNombre())) {
    						$empDAO->updateElement($transfer->getId_Empresa(),"Nombre" ,$transfer->getNombre());
            }
						if (!empty($transfer->getPassword()) && $transfer->getPassword() != self::CIFRADO) {
					        $empDAO->updateElement($transfer->getId_Empresa(),"password",$transfer->getPassword());
						}
						if (!empty($transfer->getEmail())) {
					        $empDAO->updateElement($transfer->getId_Empresa(),"email" ,$transfer->getEmail());
						}
						if (!empty($transfer->getLocalizacion())) {
					        $empDAO->updateElement($transfer->getId_Empresa(),"Localizacion" ,$transfer->getLocalizacion());
						}
            if (!empty($transfer->getSector())) {
                $empDAO->updateElement($transfer->getId_Empresa(),"Sector" ,$transfer->getSector());
            }
            if (!empty($transfer->getOficio())) {
                $empDAO->updateElement($transfer->getId_Empresa(),"Oficio" ,$transfer->getOficio());
            }
						if (!empty($transfer->getFase())) {
					        $empDAO->updateElement($transfer->getId_Empresa(),"Fase" ,$transfer->getFase());
						}
	          if (!empty($transfer->getImagenPerfil())) {
    						$empDAO->updateElement($transfer->getId_Empresa(),"Img_Empresa" ,$transfer->getImagenPerfil());
						}
						if (!empty($transfer->getCartaPresentacion())) {
					        $empDAO->updateElement($transfer->getId_Empresa(),"cartaPresentacion" ,$transfer->getCartaPresentacion());
						}
						if (!empty($transfer->getBuscamos())) {
					        $empDAO->updateElement($transfer->getId_Empresa(),"buscamos" ,$transfer->getBuscamos());
						}
						if (!empty($transfer->getOfrecemos())) {
        					$empDAO->updateElement($transfer->getId_Empresa(),"ofrecemos" ,$transfer->getOfrecemos());
						}
            $codEmpresa = $transfer->getId_Empresa();
        	  return "perfEmp.php";
	    	}
		    else {
				return "Error";
		    }
	  }

	  /**Esta funcion se encarga de eliminar una empresa de la base de datos
      @param transfer: contiene un transfer de emoresa
      @return errores: devuelve los errores cometidos en la ejecucion de las comprobaciones de la funcion
      @return .php: si el codigo es correcto se genera el perfil de usuario o si
      la verificación no ha sido incorrecta se carga la pagina principal*/
	  function deleteElement($id) {
      $empDAO = DAO_Empresa::getInstance();
                //Comprobamos si el id del posible empresa esta en la base de datos
				if ($empDAO->getElementById($id) != NULL) {
				    //Eliminamos el usuario y si no ha producico error redirigimos al inicio
					if ($empDAO->deleteElement($id)) { //FALSE
						return "logout.php";
					}
          else { 	//Si no se ha podido eliminar se comunica al empresa
						 return "Error";
					}
				}
		//comprobamos si algun campo esta vacio y notificamos el error
			/*if (empty($id)) {
				return "Error";
			}
			//si no hay ningun error...

			$empDAO = DAO_Empresa::getInstance();
                //Comprobamos si el id del posible empresa esta en la base de datos
				if ($empDAO->getElementById($id) != NULL) {
				    //Eliminamos el usuario y si no ha producico error redirigimos al inicio
					if ($empDAO->deleteElement($id)) {
						return "logout.php";
					}
					//Si no se ha podido eliminar se comunica al empresa
          else {
						 return "Error";
					}
				}
				//Si ha pasado un id incorrecto se comunica a la empresa
				else {
					 return "Error";
				}*/

	}

	 /**Esta funcion se encarga de logear una empresa a traves del id
    @param transfer: contiene un transfer con posibles datos de una empresa
    @return errores: devuelve los errores cometidos en la ejecucion de las
    comprobaciones de la funcion
    @return .php: si el codigo es correcto se genera el perfil de usuario
    o si la verificación no ha sido incorrecta se carga la pagina principal*/
    function login($transfer) {
    		//comprobamos si algun campo esta vacio y notificamos el error
    		if(empty($transfer->getPassword()) || empty($transfer->getEmail())) {
    		   return "Error";
    		}

    		//y si no hay ningun error...

    			$empDAO = DAO_Empresa::getInstance();
    			//Devuelve un transfer que debe contenir el valor de un gmail, puede devolver un objeto nulo
    			$empObject = $empDAO->getElementByEmail($transfer->getEmail());

          //Se comprueba que la contraseña que recibimos en el transfer coincicide con el valor hasheado del transfer recibido por el DAO
          $password = $transfer->getPassword();
    			if($empObject == null || $password !== $empObject->getPassword()){
            $_SESSION['success'] = "error";
            $_SESSION['login'] = false;
    				return "../index.php";
    			}
    			else{
    				$_SESSION['id_empresa'] =$empObject->getId_Empresa();
    				$_SESSION['login'] = true;
            $_SESSION['nombre'] = $empObject->getNombre();
    				return "perfEmp.php";
    			}

    	}
        /*TODO: relaciones de las empresas con los usuarios y eventos**/
    	public function elementRelation($transfer) {}

        function actualizarNumLikes($id, $valor){
          $empDAO = DAO_Empresa::getInstance();
         return $empDAO->actualizarNumLikes($id, $valor);
        }

        public function getTopTres(){
          $empDAO = DAO_Empresa::getInstance();
         return $empDAO->getTopTres();
        }
        public function getAllElementsById($id) {
          $eveDAO = DAO_Empresa::getInstance();
          return $eveDAO->getAllElementsById($id);
        }
}
?>
