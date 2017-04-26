angular.module('IMPERIUM').
        config(['$routeProvider',
            function config($routeProvider) {
                $routeProvider.
                        when('/', {
                            controller: 'login',
                            templateUrl: 'app/template/login.html'
                        }).
                        otherwise('/');
            }
        ]);
