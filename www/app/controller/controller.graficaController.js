angular.module('IMPERIUM').controller('graficaController', ['$scope', 'servidorService','$sessionStorage', '$timeout', '$filter', function ($scope, servidorService, $sessionStorage, $timeout, $filter) {
    
//    console.log($sessionStorage.reporte);
    
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
    
    $sessionStorage.reporte.fechaInicio = $filter('date')($sessionStorage.reporte.fechaInicio, 'yyyy-MM-dd') + ' 00:00:00';
    $sessionStorage.reporte.fechaFin = $filter('date')($sessionStorage.reporte.fechaFin, 'yyyy-MM-dd') + ' 23:59:59';

    servidorService.obtenergra($sessionStorage.reporte).then(function succesCallback(response) {
//      console.log(response);
      
      angular.forEach(response.data.datos, function (value, key) {
        $scope.labels.push(value.fecha);
        $scope.data[0].push(value.cantidad_entradas);
        $scope.data[1].push(value.cantidad_salidas);
      });
      
    }, function errorCallback(response) {
      console.log(response);
    });



    

  }]);



