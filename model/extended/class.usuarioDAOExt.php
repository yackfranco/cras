<?php

class usuarioDAOExt extends usuarioDAO {

  public function search($usuario, $contrasena) {
    $sql = 'SELECT rol_id, usu_id, usu_cedula, usu_foto, usu_nombre, usu_celular, usu_correo, usu_usuario FROM ces_usuario WHERE usu_usuario = :user AND usu_contrasena = :pass';
    $params = array(
        ':user' => $usuario,
        ':pass' => $contrasena,
    );
    
    return $this->query($sql, $params);
  }

}
