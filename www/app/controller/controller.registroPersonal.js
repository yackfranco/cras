angular.module('IMPERIUM').controller('registroPersonalController', ['$scope', 'personalServices', '$location', function ($scope, personalServices, $location) {

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

//      $scope.personal.genero;
      personalServices.createPersonal($scope.personal).then(function succesCallback(response) {
        console.log(response.data);
        if (response.data.code == 200) {
          $scope.personal = {};
          $scope.success = false;
          $scope.warning = true;
          $scope.danger = true;
        } else if (response.data.code == 500) {
          console.log(response.data);
          $scope.success = true;
          $scope.warning = false;
          $scope.danger = true;
          cargarTablaP();
        } else {
          $scope.success = true;
          $scope.warning = true;
          `+++++¡`;
          $scope.danger = false;
          $scope.disabledCelularFamilia = true;
        }


      }, function errorCallback(response) {
        console.log(response);
      });
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
      if ($des) {

        $scope.modal.nombre = x.per_nombre;
        $scope.modal.cedula = x.per_identificacion;
        $scope.modal.apellido = x.per_apellidos;
        $scope.modal.identificacionP = x.per_identificacion;
        $scope.modal.genero = x.genero;
        $scope.modal.nis = x.per_identificacion_aprendiz;
        $scope.modal.cargo = x.tip_id;
        $scope.modal.ficha = x.per_ficha;
        $scope.modal.cel_familiar = x.per_celfamiliar;
        $scope.modal.id = x.per_id;

      } else {

        personalServices.updatePersonal($scope.modal).then(function successCallback(response) {
          console.log(response);
          $scope.contactoEditado = false;
          $scope.edit = {};
          if (response.data.code == 500) {
          } else {
            $scope.contactoEditado = true;
            $scope.edit = '';
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
        $scope.textoBuscar="";

      }, function errorCallback(response) {
        console.error(response);
      });
    }
//    cargarTablaP();

  }]);






