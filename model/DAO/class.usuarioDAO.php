<?php

/**
 * conjunto de funciones para la tabla ces_usuario
 */
class usuarioDAO extends dataSource implements IUsuario {

  /**
   * funcion para hacer borrado logico o permanente
   * @param type $usu_id
   * @param type $logico
   * @return integer
   */
  public function delete($usu_id, $logico = true) {

    if ($logico === true) {
      $sql = 'UPDATE ces_usuario SET usu_delete_at = now() WHERE usu_id = :id';
    } else {
      $sql = 'DELETE ces_usuario WHERE usu_id = :id';
    }

    $params = array(
        ':id' =>(integer) $usu_id
    );
    return $this->execute($sql, $params);
  }

  /**
   * funcion para insertar nuevo usuario
   * @param \usuario $usuario
   * @return integer
   */
  public function insert(\usuario $usuario) {
    $sql = 'INSERT INTO ces_usuario (usu_cedula, usu_nombre,usu_celular, usu_correo, usu_usuario, usu_contrasena, rol_id, usu_create_at) VALUES (:cedula, :nombre, :celular, :correo, :user, :pass, :rol_id, now())';
    $params = array(
        ':cedula' => $usuario->getCedula(),
//            ':foto' => $usuario->getFoto(),
        ':nombre' => $usuario->getNombre(),
        ':celular' => $usuario->getCelular(),
        ':correo' => $usuario->getCorreo(),
        ':user' => $usuario->getUsuario(),
        ':pass' => $usuario->getContrasena(),
        ':rol_id' => $usuario->getRol_id(),
    );
    return $this->execute($sql, $params);
  }

  /**
   * funcion para seleccionar todos los usuarios
   * @return array of stdClass
   */
  public function select() {
    $sql = 'select c.usu_id ,c.usu_cedula,c.usu_nombre,c.usu_celular,c.usu_correo,c.usu_usuario,r.rol_nombre
from ces_usuario as c inner join ces_rol as r on c.rol_id=r.rol_id WHERE usu_delete_at IS NULL';
    return $this->query($sql);
  }

  /**
   * funcion para seleccionar uduarios por id
   * @param type $id
   * @return array of stdClass
   */
  public function selectById($id) {
    $sql = 'SELECT usu_cedula, usu_foto, usu_nombre, usu_celular, usu_correo, usu_usuario, usu_contrasena, rol_id FROM usuario WHERE usu_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->query($sql, $params);
  }

  /**
   * funcion para actulizar usuarios
   * @param \usuario $usuario
   * @return integer
   */
  public function update(\usuario $usuario) {
//    $sql = 'UPDATE usuario SET usu_cedula = :cedula, usu_foto = :foto, usu_nombre = :nombre, usu_celular = :celular, usu_correo = :correo , usu_contrasena = :pass WHERE usu_id = :id';
    $sql = 'UPDATE ces_usuario SET usu_cedula = :cedula, usu_nombre = :nombre, usu_celular = :celular, usu_correo = :correo , usu_contrasena = :pass, rol_id = :rol WHERE usu_usuario = :user';
    $params = array(
        ':cedula' => $usuario->getCedula(),
//        ':foto' => $usuario->getFoto(),
        ':nombre' => $usuario->getNombre(),
        ':celular' => $usuario->getCelular(),
        ':correo' => $usuario->getCorreo(),
//        ':contrasena' => $usuario->getContrasena(),
        ':user' => $usuario->getUsuario(),
        ':pass' => $usuario->getContrasena(),
//        ':id' => $usuario->getId()
    );
    return $this->execute($sql, $params);
  }

}
