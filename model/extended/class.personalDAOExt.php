<?php

class usuarioDAOExt extends usuarioDAO {

  public function search($user, $password) {
    $sql = 'SELECT id, usuario FROM usuario WHERE usuario = :user AND contrasena = :pass';
    $params = array(
        ':user' => $user,
        ':pass' => $password
    );
    return $this->query($sql, $params);
  }

//  public function buscarAprendiz(integer $nis) {
//    $sql = 'SELECT count(per_id) FROM ces_personal WHERE per_identificacion_aprendiz = :nis';
//    $params = array(
//        ':nis' => $nis
//    );
//    return $this->execute($sql, $params);
//  }

}
