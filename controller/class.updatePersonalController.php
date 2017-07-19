<?php

class updatePersonal extends controllerExtended {

  public function main(\request $request) {
    try {

      $this->loadTablePersonal();

      $personal = new personal();
      $personal->setNombre($request->getParam('nombre'));
      $personal->setIdentificacion($request->getParam('identificacionP'));
      $personal->setIdentificacionAprendiz($request->getParam('nis'));
      $personal->setIdTipoPersona($request->getParam('cargo'));
      $personal->setGenero($request->getParam('genero'));
//      $personal->setFoto('per_foto');
      $personal->setApellidos($request->getParam('apellido'));
      $personal->setFicha($request->getParam('ficha'));
      $personal->setCelFamiliar($request->getParam('cel_familiar'));
      $personal->setId($request->getParam('id'));

      $flag = false;
      if ($request->hasFile('foto')) {
        $foto = $request->getFile('foto');
        $dirFile = $this->getConfig()->getDirUploads() . $request->getParam('fotoNombre');
        move_uploaded_file($foto['tmp_name'], $dirFile);
        $personal->setFoto($request->getParam('fotoNombre'));
        $flag = true;
      } else {
        $personal->setFoto($request->getParam('foto'));
        $flag = true;
      }

       if ($flag === true) {
        $personalDAO = new personalDAOExt($this->getConfig());
        $row = $personalDAO->update($personal);
//        $row = $personalDAO->selectById($request->getParam('identificacionP'));

        $answer = array(
            'code' => ($row > 0) ? 200 : 500,
            'answer' => $row
        );
        $this->setParam('rsp', $answer);
        $this->setView('imprimirJson');
      } else {
        $answer = array(
            'code' => 500,
            'datos' => 'La imagen no pudo ser guardada'
        );
        $this->setParam('rsp', $answer);
        $this->setView('imprimirJson');
      }
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

//      if ($request->getParam('accion') === 'update') {
//
//                    $personal = new registroContactos();
//                    $personal->setId($request->getParam('id'));
//                    $personal->setNombre($request->getParam('nombre'));
//                    $personal->setApellido($request->getParam('apellido'));
//                    $personal->setTelefono($request->getParam('telefono'));
//                    $personal->setCorreo($request->getParam('correo'));
//
//                    $flag = false;
//                    if ($request->hasFile('foto')) {
//                        $foto = $request->getFile('foto');
//                        $dirFile = $this->getConfig()->getDirUploads() . $request->getParam('fotoNombre');
//                        move_uploaded_file($foto['tmp_name'], $dirFile);
//                        $personal->setFoto($request->getParam('fotoNombre'));
//                        $flag = true;
//                    } else {
//                        $personal->setFoto($request->getParam('foto'));
//                        $flag = true;
//                    }
//
//                    if ($flag === true) {
//
//                        $registroContantosDao = new registroContactosDAO($this->getConfig());
//                        $row = $registroContantosDao->update($personal);
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
}
