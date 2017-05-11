angular.module('IMPERIUM').service('securityService', ['$http', function($http){
    this.validateUserAndPassword = function (data) {
      return $http.post('http://localhost/cras/www/server.php/login', $.param(data));
    };
}]);