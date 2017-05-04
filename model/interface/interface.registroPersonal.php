<?php

/*
 Manager access tabala Registro Personal
 */
interface IregistroPersonal {
/*
 * 
 */
  public function select();

  public function selectById($id);

  public function insert(registroPersonal $rePersonal);

  public function update(registroPersonal $rePersonal);

  public function delete($id);
}
