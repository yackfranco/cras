<?php

class registroEquipoDAOExt extends registroEquipoDAO {

  public function search($id) {
    $sql = 'SELECT reg_equip_id, equi_id, reg_per_id, fecha_entrada, fecha_salida FROM ces_registro_equipo WHERE fecha_entrada=:entrada AND fecha_salida=:salida';
    $params = array(
        ':id' => $id,
        ':entrada' => $reEquipo->getEntrada(),
        ':salida' => $reEquipo->getSalida(),
    );
    return $this->query($sql, $params);
  }

  public function searchForPerson($per_id) {
    $sql = 'SELECT e.equi_tipo,e.equi_serial,e.equi_marca, e.equi_observacion, r.reg_equi_id,'
            . 'r.equi_id, r.reg_per_id, r.fecha_entrada, r.fecha_salida,per_id'
            . ' FROM ces_equipo as e inner join ces_registro_equipo as r on e.equi_id = r.equi_id '
            . 'WHERE r.fecha_entrada IS NOT NULL AND r.fecha_salida IS NULL AND r.per_id=:per_id';
    $params = array(
        ':per_id' =>(integer) $per_id,
    );
    return $this->query($sql, $params);
  }

}
