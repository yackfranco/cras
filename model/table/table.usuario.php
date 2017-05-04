<?php

class usuario {
  
  private $id;
  private $usuario;
  private $contrasena;
  
  function getId() {
      return $this->id;
  }

  function getUsuario() {
      return $this->usuario;
  }

  function getContrasena() {
      return $this->contrasena;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setUsuario($usuario) {
      $this->usuario = $usuario;
  }

  function setContrasena($contrasena) {
      $this->contrasena = $contrasena;
  }

 

}