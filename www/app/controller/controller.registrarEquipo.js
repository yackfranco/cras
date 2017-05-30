angular.module('IMPERIUM').controller('registrarEquipoController', ['$scope', 'registrarEquipoServices', function ($scope, registroEquipoServices) {

    $scope.equipo = {};

    $scope.guardarEquipo = function () {
      registroEquipoServices.createEquipo($scope.equipo).then(function succesCallback(response) {
        console.log(response.data);
        if (console.data.code == 200) {
          $scope.equipo = {};

        } else if (console.data.code == 500) {
          console.log(response.data);
        } else {

        }
      }, function errorCallback(response) {
        console.log(response);
      });
    };


  }]);