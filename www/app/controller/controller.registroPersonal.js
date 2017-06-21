
angular.module('IMPERIUM').controller('registroPersonalController', ['$scope', 'personalServices', '$location','$sessionStorage',function ($scope, personalServices, $location,$sessionStorage) {

    $scope.personal = {};
    $scope.success = true;
    $scope.warning = true;
    $scope.danger = true;
    $scope.disabledCelularFamilia = false;
//    $scope.masculino = masculino;
//    $scope.femenino = femenino;
    $scope.modal = {};
    $scope.mostrarTabla = false;



    $scope.crudPersonal = function () {
      if ($scope.formulario.foto.$valid && $scope.personal.foto) {
        personalServices.createPersonal($scope.personal).then(function (resp) {
          console.log("Guardado");
//          console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
        }, function (resp) {
//          console.log('Error status: ' + resp.status);
        }, function (evt) {
          var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
//          console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
        });
        
        if($sessionStorage.savePersonFromCes){
          delete $sessionStorage.savePersonFromCes;
          $sessionStorage.registroCreado = $scope.personal.identificacionP;
          $location.path("/ces");
        }
      }
//      $scope.personal.genero;
//      personalServices.createPersonal($scope.personal).then(function succesCallback(response) {
//        console.log(response.data);
//        if (response.data.code == 200) {
//          $scope.personal = {};
//          $scope.success = false;
//          $scope.warning = true;
//          $scope.danger = true;
//        } else if (response.data.code == 500) {
//          console.log(response.data);
//          $scope.success = true;
//          $scope.warning = false;
//          $scope.danger = true;
//          cargarTablaP();
//        } else {
//          $scope.success = true;
//          $scope.warning = true;
//          `+++++¡`;
//          $scope.danger = false;
//          $scope.disabledCelularFamilia = true;
//        }
//
//
//      }, function errorCallback(response) {
//        console.log(response);
//      });
    };

    $scope.habilitar = function () {
      $scope.disabledCelularFamilia = false;


    };

    function cargarTablaP() {
      personalServices.cargarTablaP.then(function successCallback(respTablaP) {
        console.log(respTablaP);
        $scope.tablaP = respTablaP.data.personal;
      }, function errorCallback(respTablaP) {
        console.log(respTablaP);
      });
    }


    $scope.editar = function (x, $des = true) {
//      console.log(x.tip_tipo_persona);
      if ($des) {

        $scope.modal.nombre = x.per_nombre;
        $scope.modal.cedula = x.per_identificacion;
        $scope.modal.apellido = x.per_apellidos;
        $scope.modal.identificacionP = x.per_identificacion;
        $scope.modal.genero = x.per_genero;
        $scope.modal.nis = x.per_identificacion_aprendiz;
        if (x.tip_tipo_persona == "aprendiz")
        {
          $scope.modal.cargo = 1;
//          $scope.cargo="aprendiz";
        } else {
          $scope.modal.cargo = 2;
//          $scope.cargo="instructor";
        }
//        $scope.modal.cargo = x.tip_tipo_persona;
        $scope.modal.ficha = x.per_ficha;
        $scope.modal.cel_familiar = x.per_celfamiliar;
        $scope.modal.id = x.per_id;

      } else {
//        console.log( $scope.modal);
        personalServices.updatePersonal($scope.modal).then(function successCallback(response) {
//          console.log(response);
          $scope.contactoEditado = false;
          $scope.edit = {};
          if (response.data.code == 500) {
          } else {
//            console.log(response);
//            $scope.contactoEditado = true;
//            $scope.edit = '';
            $('#modalEditar').modal('hide');
            $scope.tablaP = response.data.answer;
          }
        }, function errorCallback(response) {
          console.error(response);
        });
    }
    };

    $scope.buscar = function () {
      console.log($scope.textoBuscar);
      personalServices.searchPersonal({id: $scope.textoBuscar}).then(function successCallback(response) {
        console.log(response);
        $scope.mostrarTabla = true;
        if (response.data.codigo == 200) {
          $scope.tablaP = response.data.usuario;
          $('#modalBuscar').modal('hide');
        } else {
          $scope.mostrarTabla = false;
          $('#modalBuscar').modal('hide');
        }
        $scope.textoBuscar = "";

      }, function errorCallback(response) {
        console.error(response);
      });
    }

    $scope.eliminarP = function (x) {
      $('#modalEliminar').modal('toggle');
      $scope.nombre = x.per_nombre;
//      console.log(x.usu_id);
      $scope.ideliminar = x.per_id;
    };

    $scope.submitEliminarPersonal = function () {
      personalServices.deletePersonal({id: $scope.ideliminar}).then(function successCallback(respuesta) {
//        console.log(respuesta);
        if (respuesta.data.codigo = 200) {
          $('#modalEliminar').modal('hide');
          location.reload(true);
        } else {
          console.error("Error");
        }
//          $scope.mostrarTabla = false;
//        } else {
//          $('#modalEliminar').modal('hide');
//          $scope.mostrarTabla = false;
//        }
//        $scope.tabla = respuesta.data.usuario;

//        $('#modalEliminar').modal('hide');
//        location.reload(true);
      }, function errorCallback(respuesta) {
//        console.log(respuesta);
      });
    };

//    cargarTablaP();

  }]);






