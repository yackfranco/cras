<?php

class createPersonal extends controllerExtended {

  public function main(\request $request) {

//    print_r($request->getFile('datos')['name']['foto']);
//    exit();

    $ext = "";
    $this->loadTablePersonal();
    
    echo '<pre>';
    print_r($request->getFile('foto'));
    echo '</pre>';
//    exit();


    $foto = $request->getFile('foto');
    
    switch ($foto['type']) {
      case 'image/png':
        $ext = ".png";
        break;
      case 'image/jpeg':
        $ext = ".jpeg";
        break;
      case 'image/gif':
        $ext = ".gif";
        break;
    }

    $nombreEncFoto = hash('md5', $foto['name'] . (date('Y-M-l H:i:s:u')) . $request->getParam('identificacionP')) . $ext;
    $dirfoto = $this->getConfig()->getDirUploads() . $nombreEncFoto;
//     echo $request->getFile('datos')['tmp_name']['foto'];
    move_uploaded_file($foto['tmp_name'],$dirfoto);
//    print_r($request->getParam(['datos'])) ;
    print_r($request->getParam('nombre'));
//    exit();

    $personal = new personal();
    $personal->setNombre($request->getParam('nombre'));    
    $personal->setIdentificacion($request->getParam('identificacionP'));
    $personal->setIdentificacionAprendiz($request->getParam('nis'));
    $personal->setIdTipoPersona($request->getParam('cargo'));
    $personal->setGenero($request->getParam('genero'));
    $personal->setFoto($nombreEncFoto);
    $personal->setApellidos($request->getParam('apellido'));
    $personal->setFicha($request->getParam('ficha'));
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
