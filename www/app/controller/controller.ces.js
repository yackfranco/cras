angular.module('IMPERIUM').controller('cesController', ['$scope', 'getDataCesService', function ($scope, getDataService) {
    $scope.persona = {};
    $scope.consultarDocumento = function () {
      console.log($scope.identificacion);



      getDataService.getInfoPeople($scope.datos).then(function successCallback(answer) {
        console.log(answer);
        if (answer.data.codigo === 200)
        {
          $scope.usuarioErroneo = false;
          console.log("todo bien");
          $sessionStorage.usuario = answer.data.usuario[0];
        } else
        {
          $scope.datos = {};
          $scope.usuarioErroneo = true;
        }
      }, function errorCallback(answer) {
        console.log(answer);
      });
    };
  }]);