<?php

class registroPersonalDAOExt extends registroPersonalDAO {

  public function search($id) {
    $sql = 'SELECT reg_per_id, per_id,  reg_per_salida FROM ces_registro_personal WHERE reg_per_entrada=:entrada AND reg_per_salida=:salida ';
    $params = array(
        
        ':id' => $id,
        ':entrada' => $rePersonal->getEntrada(),
        ':salida' => $rePersonal->getSalida()
 
    );
     return $this->query($sql,$params);
  }
  
  public function validarEntrada($id){
    $sql = 'select reg_per_id from ces_registro_personal where reg_per_entrada is not null and reg_per_salida is null and per_id = :id';
    $params = array(
        ':id' => $id
    );
     return $this->query($sql,$params);
  }

}
