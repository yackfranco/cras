<?php

class registroPersonalDAO extends dataSource implements IregistroPersonal {

  public function delete($id) {
    $sql = 'DELETE FROM ces_registro_personal WHERE reg_per_id = :id';
    $params = array(
        ':id' => $id
    );
    return $this->execute($sql, $params);
  }

  public function insert(\registroPersonal $rePersonal) {
    $sql = 'INSERT INTO ces_registro_personal (reg_per_entrada,reg_per_salida) VALUES (:entrada, :salida)';
    $params = array(
        ':entrada' => $rePersonal->getEntrada(),
        ':salida' => $rePersonal->getSalida()
    );
    return $this->execute($sql, $params);
  }

  public function select() {
    $sql = 'SELECT reg_per_id, per_id, reg_per_entrada, reg_per_salida FROM ces_registro_personal';
    return $this->query($sql);
  }

  public function selectById($id) {
    
    $sql = 'SELECT reg_per_id FROM ces_registro_personal WHERE reg_per_id = :id';
    $params = array(
        ':id' => $id
  );
     return $this->query($sql, $params);
  }

  public function update(\registroPersonal $rePersonal) {
    
     $sql = 'UPDATE ces_registro_personal SET reg_per_entrada = :entrada, reg_per_salida = :salida WHERE reg_per_id = :id';
    $params = array(
        
        ':entrada' => $rePersonal->getEntrada(),
        ':salida' => $rePersonal->getSalida()
        
    );
    return $this->execute($sql, $params);
  }

}
