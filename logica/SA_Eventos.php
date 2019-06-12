<?php
//session_start();
require("DAO_Eventos.php");
require("TransferEventos.php");
require_once("SA_Interface.php");

class SA_Eventos implements SA_Interface {

    const CIFRADO = '67a74306b06d0c01624fe0d0249a570f4d093747';

    private static $instance = null;
    //Evitamos asi la contruccion de la clase
    private function __construct() {  }
    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new SA_Eventos();
        }
        return self::$instance;
      }

     /**Para acceder a esta funcion se debe estar iniciado sesion
     @return lista: contiene una lista de todos los elementos de la lista de usuarios sin filtros o null*/
	function getAllElements(){
	  $empDAO = DAO_Eventos::getInstance();
		return $empDAO->getAllElements();
	}

	/**@param id: posible id de una empresa
       @return error: si el id de la empresa es incorrecto
       @return id: si el usuario existe en la base de datos
    */
	function getElement($id){
	  $eveDAO = DAO_Eventos::getInstance();
		return $eveDAO->getElementById($id);
  }


    function createElement($transfer) {
    //comprobamos si algun campo esta vacio y notificamos el error si lo estae, estos campos son obligatorios para crear un nuevo elemento
    if (empty($transfer->getNombre()) || empty($transfer->getLocalizacion()) || empty($transfer->getFecha())) {
           return "Error";
    }
    //Si el tamaño del array es 0 significa que no tenemos errores en la lista
    $eventDAO = DAO_Eventos::getInstance();
    //Recibimos la lista de los elementos que tenemos en la base de datos
    if($eventDAO->getElementById($transfer->getNombre()) == NULL) {
      //Añadimos el elemento a la base de datos a traves del DAO
      $prueba = $eventDAO->createElement($transfer);
      return "listaEventos.php";
    }
    return "Error";
  }

	  /**Esta funcion se encarga de eliminar una empresa de la base de datos
      @param transfer: contiene un transfer de emoresa
      @return errores: devuelve los errores cometidos en la ejecucion de las comprobaciones de la funcion
      @return .php: si el codigo es correcto se genera el perfil de usuario o si
      la verificación no ha sido incorrecta se carga la pagina principal*/
   function deleteElement($id) {

      if (empty($id)) {
        return "Error";
      }
      //si no hay ningun error...

      $eventDAO = DAO_Eventos::getInstance();
                //Comprobamos si el id del posible empresa esta en la base de datos
        if ($eventDAO->getElementById($id) != NULL) {
            //Eliminamos el usuario y si no ha producico error redirigimos al inicio
          if ($eventDAO->deleteElement($id)) {
            return "listaEventos.php";
          }
          //Si no se ha podido eliminar se comunica al empresa
          else {
             return "Error";
          }
        }
        //Si ha pasado un id incorrecto se comunica a la empresa
        else {
           return "Error";
        }
    }

	 /**Esta funcion se encarga de logear una empresa a traves del id
    @param transfer: contiene un transfer con posibles datos de una empresa
    @return errores: devuelve los errores cometidos en la ejecucion de las
    comprobaciones de la funcion
    @return .php: si el codigo es correcto se genera el perfil de usuario
    o si la verificación no ha sido incorrecta se carga la pagina principal*/
    function login($transfer) {
      return false;
    }
        /*TODO: relaciones de las empresas con los usuarios y eventos**/
    function elementRelation($transfer) {}

    function updateElement($transfer) {

      if (empty($transfer->getNombre())) {
          return "Error";
        }
      //Realizamos la conexion
      $eventDAO = DAO_Eventos::getInstance();
            //Comprobamos si el identificador de la empresa existe en nuestra base de datos
      if ($eventDAO->getElementById($transfer->getNombre())) {
        //Modificamos los diferentes campos de la base de datos que no esten incorrectos
        if (!empty($transfer->getLocalizacion())) {
          $eventDAO->updateElement($transfer->getNombre(),"Localizacion" ,$transfer->getLocalizacion());
        }
        if (!empty($transfer->getPrecio())) {
          $eventDAO->updateElement($transfer->getNombre(),"Precio" ,$transfer->getPrecio());
        }
        if (!empty($transfer->getCantidad())) {
          $eventDAO->updateElement($transfer->getNombre(),"Cantidad" ,$transfer->getCantidad());
        }
        if (!empty($transfer->getFecha())) {
          $eventDAO->updateElement($transfer->getNombre(),"Fecha" ,$transfer->getFecha());
        }
        if (!empty($transfer->getImagenEvento())) {
          $eventDAO->updateElement($transfer->getNombre(),"Img_Evento" ,$transfer->getImagenEvento());
        }
        return "listaEventos.php";
        }
        else {
          return "Error";
        }
    }
    public function getAllElementsById($id) {
      $eveDAO = DAO_Eventos::getInstance();
  		return $eveDAO->getAllElementsById($id);
    }
    function linkUserEvent($id, $event){
      $eveDAO = DAO_Eventos::getInstance();
      $eveDAO->crearUnion($id,$event);
    }
    function unlinkUserEvent($id, $event){
      $eveDAO = DAO_Eventos::getInstance();
      $eveDAO->eliminarUnion($id,$event);
    }
    /**
    Esta funcion se encarga de indicar si el usuario ya se ha apuntado al evento.
    @param id: id del usuario.
    @param event: nombre del evento.
    @return: true si ya se encuentra apuntado; false en caso contrario.
    */
    function existsUserEvent($id,$event){
      $eveDAO = DAO_Eventos::getInstance();
      return $eveDAO->existeUnion($id,$event);
    }
    /**
    Esta funcion devuelve el número de plazas libres que quedan en el evento
    @param event: nombre del evento.
    @return: numero de plazas restantes.
    */
    function usersRemainingEvent($event){
      $eveDAO = DAO_Eventos::getInstance();
      $transfer = $eveDAO->getElementById($event);
      $total = $transfer->getCantidad();
      $apuntados = $eveDAO->numberUsersEvent($event);
      return $total - $apuntados;
    }
    function getEventEmpresa($event){
      $eveDAO = DAO_Eventos::getInstance();
      return $eveDAO->getEventEmpresa($event);
    }
}
?>
