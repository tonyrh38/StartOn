<?php
namespace es\ucm\fdi\aw;

class TransferEventos {

	private $nombre;
	private $Localizacion;
	private $precio;
	private $cantidad;
	private $fecha;
	private $Img_Evento;

	function __construct($nombre, $Localizacion ,$precio, $cantidad, $fecha,$Img_Evento){
		$this->nombre = $nombre;
		$this->Localizacion = $Localizacion;
		$this->precio = $precio;
		$this->cantidad = $cantidad;
		$this->fecha = $fecha;
		$this->Img_Evento = $Img_Evento;
	}

	/**GETTER: devuelve los parametros privados*/

	/**@return nombre: string value*/
	public function getNombre(){
		return $this->nombre;
	}

	/**@return nombre: string value*/
	public function getLocalizacion(){
		return $this->Localizacion;
	}
	/**@return precio: integer value*/
	public function getPrecio(){
		return $this->precio;
	}

/**@return cantidad: integer value*/
	public function getCantidad(){
		return $this->cantidad;
	}

/**@return fecha: date value*/
	public function getFecha(){
		return $this->fecha;
	}
/**@return imagenEvento: url value*/
	public function getImagenEvento(){
		return $this->Img_Evento;
	}

/**SETTER: cambian los valores */

/** set @param nombre : string value */
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

/** set @param precio : integer value */
	public function setPrecio($precio){
		$this->precio = $precio;
	}

/** set @param cantidad : integer value */
	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

/** set @param fecha : date value */
	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

/** set @param imagenEvebto : string value */
	public function setImagenEvento($Img_Evento){
		$this->Img_Evento = $Img_Evento;
	}

}
?>
