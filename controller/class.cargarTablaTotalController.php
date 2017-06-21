<?php

class cargarTablaTotal extends controllerExtended{
  
  public function main(\request $request) {
    try {
      $this->loadTableTotal();
      
      
      $fecini = $request->getParam('fechInicio');
      $fecfin = $request->getParam('fechFin');
            
      $personalDAO = new personalDAOExt($this->getConfig());
      $respuesta1 = $personalDAO->reporteTotal($fecini,$fecfin);
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
  private function loadTableTotal(){
    require $this->getConfig()->getPath() . 'model/table/table.personal.php';
    require $this->getConfig()->getPath() . 'model/interface/interface.personal.php';
    require $this->getConfig()->getPath() . 'model/DAO/class.personalDAO.php';
    require $this->getConfig()->getPath() . 'model/extended/class.personalDAOExt.php';
  }
}


//cargarTablaIdentificacion