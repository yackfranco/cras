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

  public function updatesincontra(\usuario $usuario) {
    $sql = 'UPDATE ces_usuario SET usu_cedula = :cedula, usu_nombre = :nombre, usu_celular = :celular, usu_correo = :correo, rol_id = :rol WHERE usu_usuario =:user';
    $params = array(
        ':cedula' => $usuario->getCedula(),
//        ':foto' => $usuario->getFoto(),
        ':nombre' => $usuario->getNombre(),
        ':celular' => $usuario->getCelular(),
        ':correo' => $usuario->getCorreo(),
//        ':contrasena' => $usuario->getContrasena(),
        ':user' => $usuario->getUsuario(),
        ':rol' => $usuario->getRol_id(),
//        ':pass' => $usuario->getContrasena()
//        ':id' => $usuario->getId()
    );
    return $this->execute($sql, $params);
  }

  public function searchUser($usuario) {
    $sql = 'SELECT FROM ces_usuario WHERE usu_usuario = :user';
    $params = array(
        ':user' => $usuario
    );

    return $this->query($sql, $params);
  }
  
    public function validarCedula($cedula) {
    $sql = 'SELECT FROM ces_usuario WHERE usu_cedula = :cedula';
    $params = array(
        ':cedula' => $cedula 
    );

    return $this->query($sql, $params);
  }

}
