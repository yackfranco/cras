
angular.module('IMPERIUM').controller('registroPersonalController', ['$scope', 'personalServices', '$location', '$sessionStorage', 'urlUploads','$timeout', function ($scope, personalServices, $location, $sessionStorage, urlUploads, $timeout) {

    $scope.personal = {};
//    $scope.modeloSoloLetras = '^[a-zA-Z ]+$';
    $scope.urlUploads = urlUploads;
    $scope.success = true;
    $scope.warning = true;
    $scope.danger = true;
    $scope.disabledCelularFamilia = false;
//    $scope.masculino = masculino;
//    $scope.femenino = femenino;
    $scope.modal = {};
    $scope.mostrarTabla = false;
    $scope.personalGuardado = false;
    $scope.personalRepetido = false;
    $scope.mensajeError = "";




    $scope.crudPersonal = function () {
      if ($scope.formulario.foto.$valid && $scope.personal.foto) {
        personalServices.createPersonal($scope.personal).then(function (respuesta) {
//          console.log(resp);
//          console.log("Guardado");

          $scope.personalGuardado = true;

          if (respuesta.data.codigo == 350) {
            switch (respuesta.data.accion) {

              case 'VPersonal':
                $scope.mensajeError = "La Identificaciòn ya existe";
                break;

            }
            $scope.personalRepetido = true;
            $timeout(function () {
              $scope.personalRepetido = false;
            }, 3000);
            if ($sessionStorage.savePersonFromCes) {
              delete $sessionStorage.savePersonFromCes;
              $sessionStorage.registroCreado = $scope.personal.identificacionP;
              $location.path("/ces");
            }

//          console.log("El usuario Existe");
          }

        }, function (respuesta) {
        }, function (evt) {
          var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
        });
      }

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


    $scope.editar = function (x) {
      console.log(x);

      $scope.modal.nombre = x.per_nombre;
      $scope.modal.cedula = x.per_identificacion;
      $scope.modal.apellido = x.per_apellidos;
      $scope.modal.identificacionP = x.per_identificacion;
      $scope.modal.genero = x.per_genero;
      $scope.modal.nis = x.per_identificacion_aprendiz;
      $scope.modal.ficha = x.per_ficha;
      $scope.modal.cel_familiar = x.per_celfamiliar;
      $scope.modal.id = x.per_id;
      $scope.modal.foto = x.per_foto;
      $scope.modal.cargo = x.tip_id;

    };

    $scope.guardarPersonalEditado = function () {
      console.log('response');

      personalServices.updatePersonal($scope.modal).then(function successCallback(response) {
        $scope.contactoEditado = false;
        $scope.edit = {};
        if (response.data.code == 500) {
        } else {
          $('#modalEditar').modal('hide');
          $scope.tablaP = response.data.answer;
        }
      }, function errorCallback(response) {
        console.error(response);
      });

    }


    $scope.buscar = function () {
      console.log($scope.textoBuscar);
      personalServices.searchPersonal({id: $scope.textoBuscar}).then(function successCallback(response) {

        $scope.mostrarTabla = true;
        if (response.data.codigo == 200) {
          $scope.tablaP = response.data.usuario;
          $('#modalBuscar').modal('hide');
          console.log(response.data);
        } else {
          $scope.mostrarTabla = false;
          $('#modalBuscar').modal('hide');
        }
        $scope.textoBuscar = "";


      }, function errorCallback(response) {
        console.error(response);
      });
    };

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






