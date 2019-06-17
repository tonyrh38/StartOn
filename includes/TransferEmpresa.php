<?php
class empresaTransfer {

	private $id_empresa;
	private $nombre;
	private $password;
	private $email;
	private $localizacion;
	private $fase;
	private $imagenPerfil;
	private $cartaPresentacion;
	private $buscamos;
	private $ofrecemos;
	private $sector;
	private $oficio;
	private $numLikes;

	function __construct($id_empresa, $nombre, $password, $email, $localizacion, $sector, $oficio,$fase,$imagenPerfil,$cartaPresentacion,$buscamos,$ofrecemos, $numLikes){
		$this->id_empresa = $id_empresa;
		$this->nombre = $nombre;
		$this->password = $password;
		$this->email = $email;
		$this->localizacion = $localizacion;
		$this->fase = $fase;
		$this->imagenPerfil = $imagenPerfil;
		$this->cartaPresentacion = $cartaPresentacion;
		$this->buscamos = $buscamos;
		$this->ofrecemos = $ofrecemos;
		$this->sector = $sector;
		$this->oficio = $oficio;
		$this->numLikes = $numLikes;
	}

	/**GETTER: devuelve los parametros privados*/

	/**@return $id_empresa: string value*/
	public function getId_Empresa() {
		return $this->id_empresa;
	}

	/**@return nombre: string value*/
	public function getNombre(){
		return $this->nombre;
	}

	/**@return email: string value*/
	public function getPassword(){
		return $this->password;
	}

	/**@return email: string value*/
	public function getEmail(){
		return $this->email;
	}

	/**@return localizacion: string value*/
	public function getLocalizacion(){
		return $this->localizacion;
	}

		/**@return fase: string value*/
	public function getFase(){
		return $this->fase;
	}

		/**@return imagenPerfil: url value*/
	public function getImagenPerfil(){
		if(($this->imagenPerfil)==null)
			return 'img/empresa.png';
		else
			return $this->imagenPerfil;
	}
	public function getCartaPresentacion(){
		return $this->cartaPresentacion;
	}
	public function getBuscamos(){
		return $this->buscamos;
	}
	public function getOfrecemos(){
		return $this->ofrecemos;
	}
	public function getSector(){
		return $this->sector;
	}
	public function getOficio(){
		return $this->oficio;
	}
	public function getNumLikes(){
		return $this->numLikes;
	}

/**SETTER: cambian los valores */

		/** set @param id_empresa : string value */
	public function setId_Empresa($id_empresa){
		$this->id_empresa = $id_empresa;
	}

		/** set @param nombre : string value */
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

		/** set @param password : string value */
	public function setPassword($password){
		$this->password = $password;
	}

	/** set @param email : string value */
	public function setEmail($email){
		$this->email = $email;
	}

	/** set @param localizacion : string value */
	public function setLocalizacion($localizacion){
		$this->contPelisVistas = $contPelisVistas;
	}

	/** set @param fase : string value */
	public function setFase($fase){
		$this->fase = $fase;
	}

	/** set @param imagenPerfil : string value */
	public function setImagenPerfil($imagenPerfil){
		$this->imagenPerfil = $imagenPerfil;
	}
	public function setCartaPresentacion($cartaPresentacion){
		$this->cartaPresentacion = $cartaPresentacion;
	}
	public function setBuscamos($buscamos){
		$this->buscamos = $buscamos;
	}
	public function setSector($sector){
		$this->sector = $sector;
	}
	public function setOfrecemos($ofrecemos){
		$this->ofrecemos = $ofrecemos;
	}
	public function setOficio($oficio){
		$this->oficio = $oficio;
	}
	public function setNumLikes($numLikes){
		$this->numLikes = $numLikes;
	}
}
?>
