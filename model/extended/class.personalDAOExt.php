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

  public function searchForIdentification($identificacion) {
    $sql = 'SELECT per_id,per_identificacion,per_identificacion_aprendiz,per_foto,per_nombre,per_apellidos,per_ficha, WHERE per_identificacion = :identi OR per_identificacion_aprendiz= :identi';
    $params = array(
        ':identi' => $identificacion
    );
    return $this->query($sql, $params);
  }

}
