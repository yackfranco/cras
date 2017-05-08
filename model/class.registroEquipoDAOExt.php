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

}
