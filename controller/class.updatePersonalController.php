<?php

class updatePersonal extends controllerExtended {

  public function main(\request $request) {
    try {

//      print_r($request);
//      exit();
      $this->loadTablePersonal();
      $personal = new personal();
      $personal->setNombre($request->getParam('nombre'));
      $personal->setIdentificacion($request->getParam('identificacionP'));
      $personal->setIdentificacionAprendiz($request->getParam('nis'));
      $personal->setIdTipoPersona($request->getParam('cargo'));
      $personal->setGenero($request->getParam('genero'));
      $personal->setFoto('a');
      $personal->setApellidos($request->getParam('apellido'));
      $personal->setFicha($request->getParam('ficha'));
      $personal->setCelFamiliar($request->getParam('cel_familiar'));
      $personal->setId($request->getParam('id'));

      $personalDAO = new personalDAOExt($this->getConfig());
      $personalDAO->update($personal);
      $row = $personalDAO->select();
      $answer = array(
          'code' => ($row > 0) ? 200 : 500, 
          'answer' => $row
      );
      $this->setParam('rsp', $answer);
      $this->setView('imprimirJson');
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }

  private function loadTablePersonal() {
    require $this->getConfig()->getPath() . 'model/table/table.personal.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.personal.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.personalDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.personalDAOExt.php';
  }

}
