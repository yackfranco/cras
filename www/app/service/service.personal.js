angular.module('IMPERIUM').service('personalServices', ['$http', 'serverUrl', function($http, serverUrl){
    
    this.createEquipo = function (data) {
      return $http.post(serverUrl + 'createPersonal', $.param(data));
    };
    
//    this.getPersonal = $http.get(serverUrl + 'getPersonal');
}]);