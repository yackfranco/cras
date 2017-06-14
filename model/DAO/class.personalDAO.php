<?php

/**
 * Manager Class de lo métodos pricipales de la tabla personal
 */
class personalDAO extends dataSource implements IPersonal {

  /**
   * Método para el borrado lógico o físico de un registro.
   * @param Integer $id
   * @param Boolean $logico
   * @return Integer
   */
  public function delete(int $id, bool $logico = true) {
    if ($logico)
      $sql = 'UPDATE FROM ces_personal SET ces_delete_at = now() WHERE per_id = :id';
    else
      $sql = 'DELETE FROM usuario WHERE id = :id';

    $params = array(
        ':id' => $id
    );
    return $this->execute($sql, $params);
  }

  /**
   * Metodo para insertar la persona en la BD
   * @param \personal $personal
   * @return Integer
   */
  public function insert(\personal $personal) {
    
    $sql = 'INSERT INTO ces_personal (per_identificacion,per_identificacion_aprendiz,tip_id,per_foto,per_nombre,per_apellidos,per_genero,per_ficha,per_celfamiliar,ces_create_at)
     VALUES (:identificacion,:identAprendiz,:idTipoPersonal,:foto,:nombre,:apellidos,:genero,:ficha,:celfamiliar,now())';
    $params = array(
        ':identificacion' => $personal->getIdentificacion(),
        ':identAprendiz' => $personal->getIdentificacionAprendiz(),
        ':idTipoPersonal' => $personal->getIdTipoPersona(),
        ':foto' => $personal->getFoto(),
        ':nombre' => $personal->getNombre(),
        ':apellidos' => $personal->getApellidos(),
        ':genero' => ($personal->getGenero() == 'true') ? 't' : 'f',
        ':ficha' => $personal->getFicha(),
        ':celfamiliar' => $personal->getCelFamiliar(),
    );
    return $this->execute($sql, $params);
  }

  /**
   * Metodo para seleccionar todos los datos de la tabla
   * @return array of stdClass
   */
  public function select() {
    $sql = 'SELECT p.per_id,p.per_identificacion,p.per_identificacion_aprendiz,t.tip_tipo_persona,p.per_foto,p.per_nombre,p.per_apellidos,p.per_genero,p.per_ficha,p.per_celfamiliar '
            . 'FROM ces_personal as p inner join ces_tipo_persona as t ON p.tip_id = t.tip_id';
    return $this->query($sql);
  }

  /**
   * Metodo para seleccionar un Registro buscado por el id
   * @param integer $id
   * @return array of stdClass
   */
  public function selectById(int $id) {
    $sql = 'SELECT per_identificacion,per_identificacion_aprendiz,id,per_foto,'
            . 'per_nombre,per_apellidos,per_genero,per_ficha,per_celfamiliar  FROM ces_personal WHERE per_id=:id';
    $params = array(
        ':id' => $id
    );
    return $this->query($sql, $params);
  }

  /**
   * Metodo para actualizar un registro por el id
   * @param \personal $personal
   * @return Integer
   */
  public function update(\personal $personal) {


    $sql = 'UPDATE ces_personal SET per_identificacion=:identificacion,per_identificacion_aprendiz=:identAprendiz,tip_id=:idTipoPersonal,per_foto=:foto,'
            . 'per_nombre=:nombre,per_apellidos=:apellidos,per_genero=:genero,per_ficha=:ficha,per_celfamiliar=:celfamiliar WHERE per_id=:id';
    $params = array(
        ':id' =>(integer) $personal->getId(),
        ':identificacion' => $personal->getIdentificacion(),
        ':identAprendiz' => $personal->getIdentificacionAprendiz(),
        ':idTipoPersonal' => $personal->getIdTipoPersona(),
        ':foto' => $personal->getFoto(),
        ':nombre' => $personal->getNombre(),
        ':apellidos' => $personal->getApellidos(),
        ':genero' => $personal->getGenero(),
        ':ficha' => $personal->getFicha(),
        ':celfamiliar' => $personal->getCelFamiliar(),
    );
    return $this->execute($sql, $params);
  }

}
