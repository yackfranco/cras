<?php

/**
 * Manager class de la tabla equipo
 */
class equipo {

    /**
     *Llave principal y autoincrementable de la tabla equipo
     * @var integer 
     */
    private $id;
    /**
     *Tipo de equipo(Portatil, Pc, Tablets)
     * @var String 
     */
    private $tipo;
    /**
     *Serial que tiene el equipo
     * @var String 
     */
    private $serial;
    /**
     *Marca del equipo
     * @var String
     */
    private $marca;
    /**
     *El codigo de barras
     * @var String
     */
    private $codBarras;
    /**
     *Observaciones las cuales identifican el equipo
     * @var String
     */
    private $observaciones;
    private $create_at;
    private $delete_at;
    private $update_at;
    
    /**
     * Obtiene el ID del registro del equipo
     * @return Integer
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Obtiene el tipo de equipo de la persona
     * @return String
     */
    public function getTipo() {
        return $this->tipo;
    }
    
    /**
     * Obtiene el serial unico del equipo
     * @return String
     */
    public function getSerial() {
        return $this->serial;
    }
    
    /**
     * Obtiene la marca del equipo 
     * @return String
     */
    public function getMarca() {
        return $this->marca;
    }
    
    /**
     * Obtiene el cod.Barras que se le da al equipo
     * @return String
     */
    public function getCodBarras() {
        return $this->codBarras;
    }
    
    /**
     * Obtiene las observaciones que permiten identificar el equipo
     * @return String
     */
    public function getObservaciones() {
        return $this->observaciones;
    }
    
    /**
     * Obtiene la fecha cuando se creo el registro
     * @return String
     */
    public function getCreate_at() {
        return $this->create_at;
    }
    
    /**
     * Obtiene la fecha del momento en que se elimina el registro
     * @return String
     */
    public function getDelete_at() {
        return $this->delete_at;
    }
    
    /**
     * Obtiene la fecha del momento en que se actualiza el registro
     * @return String
     */
    public function getUpdate_at() {
        return $this->update_at;
    }
    
    /**
     * Setea el Id del equipo
     * @param Integer $id
     */
    public function setId(integer $id) {
        $this->id = $id;
    }
    
    /**
     * Setea el tipo del equipo que se registra
     * @param String $tipo      
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    /**
     * Setea el serial unico del equipo
     * @param String $serial
     */
    public function setSerial($serial) {
        $this->serial = $serial;
    }
    
    /**
     *  Setea la marca del equipo
     * @param String $marca
     */
    public function setMarca($marca) {
        $this->marca = $marca;
    }
    
    /**
     * Setea el cod Barras del equipo
     * @param String $codBarras
     */
    public function setCodBarras($codBarras) {
        $this->codBarras = $codBarras;
    }
    
    /**
     * Setea las observaciones del equipo que ayuda a identificarlo
     * @param String $observaciones
     */
    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
    
    /**
     * Setea la fecha del momento en que se crea el registro del equipo
     * @param String $create_at
     */
    public function setCreate_at($create_at) {
        $this->create_at = $create_at;
    }
    
    /**
     * Setea la fecha del momento en que se borra el registro del equipo
     * @param String $delete_at
     */
    public function setDelete_at($delete_at) {
        $this->delete_at = $delete_at;
    }
    
    /**
     * Setea la fecha del momento en que se actualiza el registro del erquipo
     * @param String $update_at
     */
    public function setUpdate_at($update_at) {
        $this->update_at = $update_at;
    }


    
}