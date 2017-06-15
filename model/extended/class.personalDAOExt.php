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

  public function reportesPorId($id, $fechaInicial, $fechaFinal) {
    $sql = 'select p.per_id,p.per_identificacion,p.per_identificacion_aprendiz,p.tip_id,p.per_foto, p.per_nombre,p.per_apellidos,p.per_genero,p.per_ficha,p.per_celfamiliar,r.reg_per_id,r.reg_per_entrada,r.reg_per_salida from ces_personal as p inner join ces_registro_personal as r ON p.per_id = r.per_id WHERE p.per_identificacion = :id AND r.reg_per_entrada = :fechaInicial AND r.reg_per_salida = :fechaFinal';
    $params = array(
        ':id' => (string) $id,
        ':fechaInicial' => (string) $fechaInicial,
        ':fechaFinal' => (string) $fechaFinal
    );
    return $this->query($sql, $params);
  }

}
