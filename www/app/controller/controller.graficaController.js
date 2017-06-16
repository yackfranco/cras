angular.module('IMPERIUM').controller('graficaController', ['$scope', 'servidorService', '$timeout', function ($scope, servidorService, $timeout) {
    $scope.fechaInicio = '';
    $scope.fechaFin = '';
    $scope.labels = [];
    $scope.data = [[],[]];
    $scope.series = ['Entrada', 'Salida'];
    $scope.options = {
      elements: {
        line: {
          tension: 0
        }
      }
    };

    servidorService.obtenergra.then(function succesCallback(response) {
      console.log(response);
      
      angular.forEach(response.data.datos, function (value, key) {
        $scope.labels.push(value.fecha);
        $scope.data[0].push(value.cantidad_entradas);
        $scope.data[1].push(value.cantidad_salidas);
      });
      
    }, function errorCallback(response) {
      console.log(response);
    });



    

  }]);



