<?php

class updatePersonal extends controllerExtended {

  public function main(\request $request) {
    try {
      
//      if ($request->getParam('accion') === 'update') {
//
//                    $contacto = new registroContactos();
//                    $contacto->setId($request->getParam('id'));
//                    $contacto->setNombre($request->getParam('nombre'));
//                    $contacto->setApellido($request->getParam('apellido'));
//                    $contacto->setTelefono($request->getParam('telefono'));
//                    $contacto->setCorreo($request->getParam('correo'));
//
//                    $flag = false;
//                    if ($request->hasFile('foto')) {
//                        $foto = $request->getFile('foto');
//                        $dirFile = $this->getConfig()->getDirUploads() . $request->getParam('fotoNombre');
//                        move_uploaded_file($foto['tmp_name'], $dirFile);
//                        $contacto->setFoto($request->getParam('fotoNombre'));
//                        $flag = true;
//                    } else {
//                        $contacto->setFoto($request->getParam('foto'));
//                        $flag = true;
//                    }
//
//                    if ($flag === true) {
//
//                        $registroContantosDao = new registroContactosDAO($this->getConfig());
//                        $row = $registroContantosDao->update($contacto);
//
//                        $answer = array(
//                            'code' => ($row > 0) ? 200 : 500,
//                            'row' => $row
//                        );
//                        $this->setParam('rsp', $answer);
//                        $this->setView('imprimirJson');
//                    } else {
//                        $answer = array(
//                            'code' => 500,
//                            'datos' => 'La imagen no pudo ser guardada'
//                        );
//                        $this->setParam('rsp', $answer);
//                        $this->setView('imprimirJson');
//                    }
//                }
      
      
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
      $row = $personalDAO->selectById($request->getParam('identificacionP'));
      
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
