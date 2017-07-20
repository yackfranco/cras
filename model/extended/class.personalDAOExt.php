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

  public function reportesPorId($id, $fi, $ff) {
    $sql = 'select 
            p.per_id,p.per_identificacion,
            p.per_identificacion_aprendiz,
            p.tip_id,p.per_foto, 
            p.per_nombre,
            p.per_apellidos,
            p.per_genero,
            p.per_ficha,
            p.per_celfamiliar,
            r.reg_per_id,
            r.reg_per_entrada,
            r.reg_per_salida 
            from ces_personal as p inner join ces_registro_personal as r ON p.per_id = r.per_id 
            WHERE (reg_per_entrada BETWEEN :fechaInicial AND :fechaFinal)AND p.per_identificacion = :id
            group by p.per_id,r.reg_per_id';
    $params = array(
        ':id' => $id,
        ':fechaInicial' => $fi,
        ':fechaFinal' => $ff
    );
    return $this->query($sql, $params);
  }

  public function reporteTotal($fecini, $fecfin) {
    $sql = 'select
            p.per_identificacion,
            p.per_foto, 
            p.per_nombre,
            p.per_apellidos,
            p.per_ficha,
            r.reg_per_entrada,
            r.reg_per_salida 
            from ces_personal as p inner join ces_registro_personal as r ON p.per_id = r.per_id 
            WHERE (reg_per_entrada BETWEEN :fechaInicial AND :fechaFinal)
            group by p.per_id,r.reg_per_id';
    $params = array(
        ':fechaInicial' => $fecini,
        ':fechaFinal' => $fecfin
    );


    return $this->query($sql, $params);
  }

  public function searchPersonal($Personal) {
    $sql = 'SELECT FROM ces_personal WHERE per_identificacion = :ident';
    $params = array(
        ':ident' => $Personal
    );

    return $this->query($sql, $params);
  }

}
