angular.module('IMPERIUM').service('cesServices', ['$http', 'serverUrl', function ($http, serverUrl) {

    this.cesPc = function (data) {
      return $http.post(serverUrl + 'cesPc', $.param(data));
    };


    this.validarEntrada = function (data) {
      return $http.post(serverUrl + 'validarEntrada', $.param(data));
    };

    this.getInfoPeople = function (data) {
      return $http.post(serverUrl + 'getDataCes', $.param(data));
    };

    this.insertarEntrada = function (data) {
      return $http.post(serverUrl + 'insertarEntrada', $.param(data));
    };

    this.actualizarSalida = function (data) {
      return $http.post(serverUrl + 'actualizarSalida', $.param(data));
    };

    this.validarExistencia = function (data) {
      return $http.post(serverUrl + 'validarExistencia', $.param(data));
    };

  }]);