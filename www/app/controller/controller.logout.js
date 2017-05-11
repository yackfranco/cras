angular.module('IMPERIUM').controller('logoutController', ['$scope', '$localStorage', '$sessionStorage', '$location', function ($scope, $localStorage, $sessionStorage, $location) {
    delete $sessionStorage.usuario;
    $location.path('/');
  }]);