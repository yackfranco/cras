<?php

class validarExistencia extends controllerExtended {

  public function main(\request $request) {

    $this->loadTablePersonal();

    $PersonalDaoExt = new personalDAOExt($this->getConfig());
    $registroPersonal = new registroPersonalDAOExt($this->getConfig());


    $row = $PersonalDaoExt->searchForIdentification($request->getParam('id'));

    //se pregunta si la persona existe en la BD
    if (count($row) > 0) {
      //insertar o actualizar
      //se trae el registro de la entrada esta llena y la salida esta vacia de acuerdo a la persona
      $validacion = $registroPersonal->validarEntrada($row[0]->per_id);

      if (count($validacion) > 0) {
        //update
        $update = $registroPersonal->update($validacion[0]->reg_per_id);

        $ultimoRegistro = $registroPersonal->validarEntrada2($validacion[0]->per_id);
        $answer = array(
            'accion' => 'actualizo',
            'persona' => $row,
            'ultimoRegistro' => $ultimoRegistro
        );
      } else {
        //insert
        $insert = $registroPersonal->insert($row[0]->per_id);
        $ultimoRegistro = $registroPersonal->validarEntrada2($row[0]->per_id);
        $answer = array(
            'accion' => 'inserto',
            'persona' => $row,
            'ultimoRegistro' => $ultimoRegistro
        );
      }
    } else {
      //mandarlo al Registrar Personal
      $answer = array(
          'accion' => 'noExistePersona',
           'persona' => $row
      );
    }







    $this->setParam('rsp', $answer);
    $this->setView('imprimirJson');



  }

  private function loadTablePersonal() {
    require $this->getConfig()->getPath() . 'model/table/table.personal.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.personal.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.personalDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.personalDAOExt.php';
    require $this->getConfig()->getPath() . 'model/table/table.registroPersonal.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.registroPersonal.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.registroPersonalDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.registroPersonalDAOExt.php';
  }

}
