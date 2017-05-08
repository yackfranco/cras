<?php

class usuarioDAOExt extends usuarioDAO {

  public function search(\usuario $usuario) {
    $sql = 'SELECT usu_id, usu_cedula, usu_foto, usu_nombre, usu_celular, usu_correo, usu_usuario, FROM usuario WHERE usu_usuario = :user AND usu_contrasena = :pass';
    $params = array(
        ':cedula'=>$usuario->getCedula(),
            ':foto'=>$usuario->getFoto(),
            ':nombre'=>$usuario->getNombre(),
            ':celular'=>$usuario->getCelular(),
            ':correo'=>$usuario->getCorreo(),
            ':contrasena'=>$usuario->getContrasena(),
            ':user' => $usuario->getUsuario(),
            ':pass' => $usuario->getContrasena(),
    );
    return $this->query($sql, $params);
  }

}
