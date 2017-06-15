<?php

class cargarTablaIdentificacion extends controllerExtended{
  
  public function main(\request $request) {
    try {
      $this->loadTableIdentificacion();
      
//      $id = $request->getParam('id');
//      $fi = $request->getParam('fi');
//      $ff = $request->getParam('ff');
      
      $id = '123';
      $fi = '2013-06-17 16:15:00';
      $ff = '2013-06-17 16:20:00';
      
      $personalDAO = new personalDAOExt($this->getConfig());
      $respuesta1 = $personalDAO->reportesPorId($id,$fi,$ff);
      $respuesta2 = array(
          'codigo' => (count($respuesta1) > 0) ? 200 : 500,
          'usuario' => $respuesta1
      );    
      
      $this->setParam('rsp', $respuesta2);
      $this->setView('imprimirJson');
    } catch (Exception $exc) {
      echo $exc->getMessage();
    }
  }
  private function loadTableIdentificacion(){
    require $this->getConfig()->getPath() . 'model/table/table.personal.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.personal.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.personalDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.personalDAOExt.php';
  }
}


//cargarTablaIdentificacion