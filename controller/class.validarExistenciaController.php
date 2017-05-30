<?php

class validarExistencia extends controllerExtended {

  public function main(\request $request) {
    $this->loadTablePersonal();

    $PersonalDaoExt = new personalDAOExt($this->getConfig());
    $row = $PersonalDaoExt->searchForIdentification($request->getParam('id'));

    if (count($row) > 0) {

      $registroPersonal = new registroPersonalDAOExt($this->getConfig());
      $validacion = $registroPersonal->validarEntrada($row[0]->per_id);

      if (count($validacion) > 0) {

        $update = $registroPersonal->update($validacion[0]->reg_per_id);
        echo 'actualizo';
        $answer = array(
            'accion' => 'actualizar',
            'row' => $update
        );
        
      } else {

        $insert = $registroPersonal->insert($row[0]->per_id);
        echo 'inserto';

        $answer = array(
            'accion' => 'insertar',
            'row' => $insert
        );
      }
      
    } else {
      $answer = array(
          'accion' => 'insertPersonal',
          'row' => $row
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
