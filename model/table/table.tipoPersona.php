<?php
/**
 * Manager Class de la tabla tipo persona
 */
class tipoPersona {
 /**
  *Llave Principal y campo autoincrementable de la tabla tipo de persona
  * @var integer $id
  */ 
  private $id;
/**
 *Que tipo de persona es
 * @var string 
 */
  private $tipoPersona;
/**
 * Obtiene el ID del registro
 * @return integer
 */  
  public function getId() {
      return $this->id;
  }
/**
 * Obtiene el tipoPersona del registro
 * @return string
 */
  public function getTipoPersona() {
      return $this->tipoPersona;
  }
/**
 * Setea el ID del registro
 * @param integer
 */
  public function setId($id) {
      $this->id = $id;
  }
/**
 * Setea el tipoPersona del registro
 * @param  srting
 */
  public function setTipoPersona($tipoPersona) {
      $this->tipoPersona = $tipoPersona;
  }



}