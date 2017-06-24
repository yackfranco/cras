angular.module('IMPERIUM').controller('cesController', ['$scope', 'cesServices', '$location', '$timeout', 'rolAdmin', '$sessionStorage', '$interval', '$filter', function ($scope, cesServices, $location, $timeout, rolAdmin, $sessionStorage, $interval, $filter) {

    //inicializacion de variables
    $scope.focus = true;
    $scope.alertaEntrada = false;
    $scope.alertaSalida = false;
    $scope.RegistroEquipo = false;
    $tiempo = 1000;
    $scope.ShowFoto = false;
    $tablaPc = false;
    $reg_per_id = "";
    $scope.Hora = $filter('date')(new Date(), 'yyyy-MM-dd HH:mm:ss');
    $scope.btnRegistrarEquipo = true;
    $scope.objeto = "";
    $idPersona = 0;
    $scope.mostrarTabla = false;
    $scope.btnSalida = true;


    //se llama la funcion del reloj actualizable
    $interval(callAtInterval, 1000);


    $scope.entradaEquipo = function (x) {
      x.reg_per_id = $reg_per_id;
      x.per_id = $idPersona;
      x.accion = "Entrada";
      cesServices.cesPc(x).then(function successCallback(respuesta) {
        if (respuesta.data.accion == "ObjetoEntro") {
          traerTablaEquipos();
          $('#modalEquipo').modal('hide');
        }
//        console.log(respuesta);
      }, function errorCallback(respuesta) {

      });
    }


    //funcion del reloj
    function callAtInterval() {
      $h = $filter('date')(new Date(), 'yyyy-MM-dd HH:mm:ss');
      $scope.Hora = $h;
    }

//llena la tabla de CES de equipos
    function traerTablaEquipos() {
      cesServices.cesPc({per_id: $idPersona, accion: 'llenarTabla'}).then(function successCallback(respuesta) {
        if (respuesta.data.accion == "llenarTabla") {
          $scope.mostrarTabla = true;
          $scope.tabla = respuesta.data.objeto;
        } else {
          $scope.mostrarTabla = false;
        }

      }, function errorCallback(respuesta) {

      });
    }

//llena los datos de la persona cuando viene del modulo registrarEquipo
    if ($sessionStorage.datosPersona) {

      $scope.ShowFoto = true;
      $scope.nombre = $sessionStorage.datosPersona.nombre;
      $scope.horaE = $sessionStorage.datosPersona.he;
      $scope.ficha = $sessionStorage.datosPersona.ficha;
      $scope.horaS = $sessionStorage.datosPersona.hs;
      $scope.foto = $sessionStorage.datosPersona.foto;
      $scope.identificacion2 = $sessionStorage.datosPersona.id;
      $idPersona = $sessionStorage.idPersona;
      $scope.btnSalida = false;
      traerTablaEquipos();
      $scope.btnRegistrarEquipo = false;
      delete $sessionStorage.idPersona;
      $reg_per_id = $sessionStorage.regPerId;
      delete $sessionStorage.regPerId;
      delete $sessionStorage.datosPersona;

    }


    //funcion que realiza el control de entrada y salida del personal
    $scope.consultarDocumento = function () {
      cesServices.validarExistencia({id: $scope.identificacion}).then(function successCallback(respuesta) {
        $scope.identificacion2 = $scope.identificacion;
        $scope.identificacion = "";
        if (respuesta.data.accion == 'inserto') {

          //Entrada
          $idPersona = respuesta.data.persona[0].per_id;
          $tiempo = 1000;
          $scope.nombre = (respuesta.data.persona[0].per_nombre) + " " + (respuesta.data.persona[0].per_apellidos);
          $scope.horaE = moment(respuesta.data.ultimoRegistro[0].reg_per_entrada, 'YYYY-MM-DD H:mm:ss').format('H:mm:ss');
          $scope.ficha = respuesta.data.persona[0].per_ficha
          $scope.horaS = "";
          $scope.alertaEntrada = true;
          $scope.alertaSalida = false;
          $reg_per_id = respuesta.data.ultimoRegistro[0].reg_per_id;
          $scope.ShowFoto = true;
          if (respuesta.data.persona[0].per_foto) {
            $scope.foto = "app/pictures/" + respuesta.data.persona[0].per_foto;
          } else {
            $scope.foto = "app/pictures/userDefault.png";
          }
          $scope.btnRegistrarEquipo = false;
          $scope.btnSalida = false;

        } else if (respuesta.data.accion == 'actualizo') {

          //Salida
          $idPersona = respuesta.data.persona[0].per_id;
          $tiempo = 1000;
          $scope.nombre = (respuesta.data.persona[0].per_nombre) + " " + (respuesta.data.persona[0].per_apellidos);
          $scope.horaE = moment(respuesta.data.ultimoRegistro[0].reg_per_entrada, 'YYYY-MM-DD H:mm:ss').format('HH:mm:ss');
          $scope.horaS = moment(respuesta.data.ultimoRegistro[0].reg_per_salida, 'YYYY-MM-DD H:mm:ss').format('HH:mm:ss');
          $scope.ficha = respuesta.data.persona[0].per_ficha;
          $reg_per_id = respuesta.data.ultimoRegistro[0].reg_per_id;
          $scope.ShowFoto = true;
          if (respuesta.data.persona[0].per_foto) {
            $scope.foto = "app/pictures/" + respuesta.data.persona[0].per_foto;
          } else {
            $scope.foto = "app/pictures/userDefault.png";
          }
          $scope.alertaEntrada = false;
          $scope.alertaSalida = true;
          $scope.btnRegistrarEquipo = true;
          $scope.btnSalida = true;

        } else {

          //la persona no existe
          $sessionStorage.savePersonFromCes = true;
          $scope.alertaEntrada = false;
          $scope.alertaSalida = false;
          $location.path("/registroPersonal");
          $scope.ShowFoto = false;

        }
        traerTablaEquipos();
        $timeout(function () {
          $scope.alertaEntrada = false;
          $scope.alertaSalida = false;
        }, $tiempo);

      }, function errorCallback(answer) {
        console.error(answer);
      });
    };


    //pregunta la cual se hace para realizar el control despues de guardar una persona
    if ($sessionStorage.registroCreado) {
      $scope.identificacion = $sessionStorage.registroCreado;
      delete $sessionStorage.registroCreado;
      $scope.consultarDocumento();
    }


    $scope.salidaPc = function (x) {
      cesServices.cesPc({accion: 'Salida', id: x.reg_equi_id}).then(function successCallback(respuesta) {
        if (respuesta.data.accion == "ObjetoSalio") {
          traerTablaEquipos();
        }
      }, function errorCallback(respuesta) {
        console.error(answer);
      });
    }


//funcion que muestra el campo para realizar el control de entrada y salida de equipo
    $scope.registrarEquipo = function () {
      $scope.RegistroEquipo = true;
    }


//funcion que realiza el control de entrada y salida de los equipos
    $scope.registrarPc = function () {
      cesServices.cesPc({serial: $scope.registroEquipo, reg_per_id: $reg_per_id, accion: 'ces'}).then(function successCallback(respuesta) {
        //se pregunta que si el pc existe
        if (respuesta.data.accion == "noExistePc") {
          $scope.nuevoObjeto();
        } else if (respuesta.data.accion == "bienesEntrar") {
          $('#modalEquipo').modal('show');
          $scope.objeto = respuesta.data.objeto;
        }
      }, function errorCallback(respuesta) {
        console.error(respuesta);
      });
    }

//funcion que sale de la pagina
    $scope.salir = function () {
      if ($sessionStorage.usuario.rol_id == rolAdmin) {
        $location.path("/menuPrincipal");
      } else {
        $location.path("/logout");
      }
    }


    $scope.nuevoObjeto = function () {
      $sessionStorage.datosPersona = {accion: "guardarObjeto", nombre: $scope.nombre, id: $scope.identificacion2, he: $scope.horaE, hs: $scope.horaS, ficha: $scope.ficha, foto: $scope.foto, per_id: $idPersona};
      $sessionStorage.idPersona = $idPersona;
      $sessionStorage.regPerId = $reg_per_id;
      $('#modalEquipo').modal('hide');
      $location.path("/registrarEquipo");
    }
  }]);
