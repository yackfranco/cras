angular.module('IMPERIUM').controller('registroPersonalController', ['$scope', 'personalServices', function ($scope, personalServices) {

    $scope.personal = {};
    $scope.success = true;
    $scope.warning = true;
    $scope.danger = true;
    $scope.disabledCelularFamilia = false;

    $scope.crudPersonal = function () {
      personalServices.createPersonal($scope.personal).then(function succesCallback(response) {
        console.log(response.data);
        if (response.data.code == 200) {
          $scope.personal = {};
          $scope.success = false;
          $scope.warning = true;
          $scope.danger = true;
        } else if (response.data.code == 500) {
          console.log(response.data);
          $scope.success = true;
          $scope.warning = false;
          $scope.danger = true;
        } else {
          $scope.success = true;
          $scope.warning = true;
          $scope.danger = false;
          $scope.disabledCelularFamilia = true;
        }


      }, function errorCallback(response) {
        console.log(response);
      });
    };
    
    $scope.habilitar = function () {
      $scope.disabledCelularFamilia = false;
    };


  }]);


