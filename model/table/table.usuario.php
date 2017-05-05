<?php

class usuario {

    /**
     *Llave Principal y campo autoincrementable de la tabla Usuario	
     * @var integer 
     */
    private $id;
    
    /**
     * Numero de Identificacion del Personal (C.C / T.I)	
     * @var string 
     */
    private $cedula;
    
    /**
     * Foto del usuario	
     * @var string 
     */
    private $foto;
    
    /**
     * Nombre completo del usuario	
     * @var string 
     */
    private $nombre;
    
    /**
     * Numero del celular del usuario (Opcional)	
     * @var string
     */
    private $celular;
    
    /**
     * Direccion del correo electronico para el contacto	
     * @var string 
     */
    private $correo;
    
    /**
     * Nombre del usuario con el cual se hara el ingreso al aplicativo
     * @var string 
     */
    private $usuario;
    
    /**
     * Se utliza para el ingreso a la aplicación y verificar el usuario		
     * @var string
     */
    private $contrasena;
    
    /**
     * se divide en 2 (admin-Invitado) el admin puede agregar los invitados y controlar la base de datos, el invitado solo puede controlar la aplicación	
     * @var integer
     */
    private $rol_id;
    
    /**
     * se utiliza para saber cuando se creo el usuario	
     * @var string 
     */
    private $create_at;
    
    /**
     * se utiliza para saber cuando se hace un update en el usuario	
     * @var string 
     */
    private $update_at;
    
    /**
     * se utiliza para saber cuando se elimina el usuario	
     * @var string
     */
    private $delete_at;
    
    
    /**
     * Obtiene el ID del registro
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Obtiene la CEDULA del registro
     * @return string
     */
    public function getCedula() {
        return $this->cedula;
    }

    /**
     * Obtiene la FOTO del registro
     * @return string
     */
    public function getFoto() {
        return $this->foto;
    }

    /**
     * Obtiene el NOMBRE del registro
     * @return string
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Obtiene el CELULAR del registro
     * @return string
     */
    public function getCelular() {
        return $this->celular;
    }

    /**
     * Obtiene el CORREO del registro
     * @return string
     */
    public function getCorreo() {
        return $this->correo;
    }

    /**
     * Obtiene el USUARIO del registro
     * @return string
     */
    public function getUsuario() {
        return $this->usuario;
    }

    /**
     * Obtiene la CONTRASENA del registro
     * @return string
     */
    public function getContrasena() {
        return $this->contrasena;
    }

    /**
     * Obtiene el ROL del registro
     * @return integer
     */
    public function getRol_id() {
        return $this->rol_id;
    }

    /**
     * Obtiene el CREATE_AT del registro
     * @return string
     */
    public function getCreateAt() {
        return $this->create_at;
    }

    /**
     * Obtiene el UPDATE_AT del registro
     * @return string
     */
    public function getUpdateAt() {
        return $this->update_at;
    }

    /**
     * Obtiene el DELETE_AT del registro
     * @return string
     */
    public function getDeleteAt() {
        return $this->delete_at;
    }

    /**
     * Setea el ID del registro
     * @param integer $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Setea la CEDULA del registro
     * @param string $cedula
     */
    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    /**
     * Setea la FOTO del registro
     * @param string $foto
     */
    public function setFoto($foto) {
        $this->foto = $foto;
    }

    /**
     * Setea el NOMBRE del registro
     * @param string $nombre
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /**
     * Setea el CELULAR del registro
     * @param string $celular
     */
    public function setCelular($celular) {
        $this->celular = $celular;
    }

    /**
     * Setea el CORREO del registro
     * @param string $correo
     */
    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    /**
     * Setea el USUARIO del registro
     * @param string $usuario
     */
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    /**
     * Setea el CONTRASENA del registro
     * @param string $contrasena
     */
    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    /**
     * Setea el ROL_ID del registro
     * @param integer $rol_id
     */
    public function setRol_id($rol_id) {
        $this->rol_id = $rol_id;
    }

    /**
     * Setea el CREATE_AT del registro
     * @param string $create_at
     */
    public function setCreate_at($create_at) {
        $this->create_at = $create_at;
    }

    /**
     * Setea el UPDATE_AT del registro
     * @param string $update_at
     */
    public function setUpdate_at($update_at) {
        $this->update_at = $update_at;
    }

    /**
     * Setea el DELETE_AT del registro
     * @param string $delete_at
     */
    public function setDelete_at($delete_at) {
        $this->delete_at = $delete_at;
    }



}
