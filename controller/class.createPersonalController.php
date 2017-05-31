<?php

class createPersonal extends controllerExtended {
  
  public function main(\request $request) {
    $this->loadTablePersonal();
    
    $personal = new personal();
    $personal->setNombre($request->getParam('nombre'));
    $personal->setIdentificacion($request->getParam('identificacionP'));
    $personal->setIdentificacionAprendiz($request->getParam('nis'));
    $personal->setIdTipoPersona($request->getParam('cargo'));
    $personal->setGenero($request->getParam('genero'));
//    $personal->setFoto('a');
    $personal->setApellidos($request->getParam('apellido'));
    $personal->setCelFamiliar($request->getParam('ficha'));
    $personal->setCelFamiliar($request->getParam('celular_familia'));

    $personalDAO = new personalDAOExt($this->getConfig());
    $row = $personalDAO->insert($personal);

    $answer = array(
        'code' => ($row > 0) ? 200 : 500,
        'answer' => $row
    );
    
    $this->setParam('rsp', $answer);
    $this->setView('imprimirJson');
  }
  
  private function loadTablePersonal() {
    require $this->getConfig()->getPath() . 'model/table/table.personal.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.personal.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.personalDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.personalDAOExt.php';
  }

}
