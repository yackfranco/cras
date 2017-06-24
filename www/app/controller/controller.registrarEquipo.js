angular.module('IMPERIUM').controller('registrarEquipoController', ['$scope', 'registrarEquipoServices', '$sessionStorage','$location', function ($scope, registroEquipoServices, $sessionStorage,$location) {
//location.reload("true");
    $scope.equipo = {};
    if ($sessionStorage.idPersona && $sessionStorage.regPerId) {
      $id = $sessionStorage.idPersona;
      $scope.equipo.idPersona = $id;
      $scope.equipo.regPerId = $sessionStorage.regPerId;
    }

    $scope.guardarEquipo = function () {
      registroEquipoServices.createEquipo($scope.equipo).then(function succesCallback(response) {
        $sessionStorage.datosPersona.accion = "cargarRegistros";
        console.log(response.data);
        if (response.data.code == 200) {
          $scope.equipo = {};
          $location.path("/ces");
        } else if (response.data.code == 500) {
          console.log(response.data);
        } else {

        }
                
      }, function errorCallback(response) {
        console.log(response);
      });
    };


  }]);