angular.module('IMPERIUM').controller('menuPrincipalController', ['$scope', '$localStorage', '$sessionStorage', function ($scope, $localStorage, $sessionStorage) {
    $scope.nombre = $sessionStorage.usuario.usu_nombre;
  }]);
