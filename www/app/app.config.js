angular.module('IMPERIUM').constant('rolAdmin', 1);
angular.module('IMPERIUM').constant('rolCelador', 2);

angular.module('IMPERIUM').config(['$middlewareProvider',
  function middlewareProviderConfig($middlewareProvider) {
    $middlewareProvider.map({
      'comprobarSession': ['$localStorage', '$sessionStorage', function comprobarSession($localStorage, $sessionStorage) {
          middlewareComprobarSession(this, $localStorage, $sessionStorage);
        }],
      'comprobarPermisoDeAdmnistracion': ['$localStorage', '$sessionStorage', 'rolAdmin', function comprobarPermisoDeAdmnistracion($localStorage, $sessionStorage, rolAdmin) {
          middlewareComprobarPermisoDeAdmnistracion(this, $localStorage, $sessionStorage, rolAdmin);
        }],
      'comprobarPermisoDeCelador': ['$localStorage', '$sessionStorage', 'rolCelador', function comprobarPermisoDeCelador($localStorage, $sessionStorage, rolCelador) {
          middlewareComprobarPermisoDeCelador(this, $localStorage, $sessionStorage, rolCelador);
        }]
    });
  }]);

angular.module('IMPERIUM').config(['$routeProvider', '$httpProvider', function config($routeProvider, $httpProvider) {
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
    $routeProvider.
            when('/', {
              controller: 'loginController',
              templateUrl: 'app/template/login.html'
            }).
            when('/ces', {
              controller: 'cesController',
              templateUrl: 'app/template/ces.html',
              middleware: ['comprobarSession']
            }).
            when('/copyRight', {
              controller: 'copyrightController',
              templateUrl: 'app/template/copyRight.html'
            }).
            when('/menuPrincipal', {
              controller: 'menuPrincipalController',
              templateUrl: 'app/template/menuPrincipal.html',
              middleware: ['comprobarSession', 'comprobarPermisoDeAdmnistracion']
            }).
            when('/reportes', {
              controller: 'reportesController',
              templateUrl: 'app/template/reportes.html',
              middleware: ['comprobarSession', 'comprobarPermisoDeAdmnistracion']
            }).
            when('/registrarEquipo', {
              controller: 'registrarEquipoController',
              templateUrl: 'app/template/registroEquipo.html',
              middleware: ['comprobarSession']
            }).
            when('/registroPersonal', {
              controller: 'registroPersonalController',
              templateUrl: 'app/template/registroPersonal.html',
              middleware: ['comprobarSession']
            }).
            when('/logout', {
              controller: 'logoutController',
              template: '<p>Cerrando sesión...</p>',
              middleware: ['comprobarSession']
            }).
            otherwise('/');
  }]);
