angular.module('IMPERIUM').
        controller('reportesController', ['$scope', '$sessionStorage','$location', function ($scope, $sessionStorage,$location) {

            $scope.reporteId = {};

            $scope.reporteIndentificacion = function () {
              $sessionStorage.reporte = $scope.reporteId;
              $location.path("/reporteIdentificacion");
            };


          }]);