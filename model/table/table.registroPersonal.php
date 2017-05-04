<?php

class registroPersonal{
  
  
  private $perId;
  private $id;
  private $entrada;
  private $salida;
  
  public function getPerId() {
    return $this->perId;
  }

  public function getId() {
    return $this->id;
  }

  public function getEntrada() {
    return $this->entrada;
  }

  public function getSalida() {
    return $this->salida;
  }

  public function setPerId($perId) {
    $this->perId = $perId;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setEntrada($entrada) {
    $this->entrada = $entrada;
  }

  public function setSalida($salida) {
    $this->salida = $salida;
  }


  
  
}



