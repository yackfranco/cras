<?php

class personalDAOExt extends personalDAO {

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
    $sql = 'SELECT per_id,per_identificacion,per_identificacion_aprendiz,per_foto,per_nombre,per_apellidos,per_ficha FROM ces_personal WHERE per_identificacion = :identi1 OR per_identificacion_aprendiz= :identi2';
    $params = array(
        ':identi1' => (string) $identificacion,
        ':identi2' => (int) $identificacion
    );
    return $this->query($sql, $params);
  }

}
