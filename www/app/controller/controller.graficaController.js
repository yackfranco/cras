angular.module('IMPERIUM').controller('graficaController', ['$scope', '$timeout', function ($scope, $timeout) {
    $scope.fechaInicio = '';
    $scope.fechaFin = '';


    $scope.options = {
      elements: {
        line: {
          tension: 0
        }
      }
    };
    $scope.labels = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    $scope.series = ['Series A', 'Series B'];
    $scope.data = [
      [65, 59, 80, 81, 56, 55, 40,30,54,14,78,10],
      [28, 48, 40, 19, 83, 27, 90,87,21,13,84,12]
    ];

  }]);



