angular.module('IMPERIUM').controller('cesController', ['$scope', 'cesServices', function ($scope, cesServices) {

    $scope.consultarDocumento = function () {
      cesServices.validarExistencia({id: $scope.identificacion}).then(function successCallback(answer) {
        console.log(answer);
      }, function errorCallback(answer) {

      });
    }


  }]);
