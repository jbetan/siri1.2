/**
 * Created by Renan on 06/05/2015.
 */
(function(){
    var app = angular.module("appRecibos", [
        "menu-directives",
        "ngResource",
        "ngRoute",
        "datatables",
        'ui.bootstrap',
        'unidades-module',
        'admin-Module',//apartir de aqui emmpieza mis depencias de app
        'user-Module',
        'equip-Module',
        'auto-module',
        'entrega-Module',
        "edicion-Module",
        "activos-Module",
        "asigmacion-Module",
        "aviso-module",
        "home-Module",
        "nuevosReportes-Module",
        "Asignar-Module"
    ]);

    //Llamamos las configuraciones
    app.run(function ($rootScope, $http) {
       
        
        $promese = $http.get("configController?get_data_user=1");
        $promese.then(function(data) {            
          
            $rootScope.global_user_id      = data.data.acceso.id_usuario;
            $rootScope.global_name_user    = data.data.acceso.nombre;
            $rootScope.global_user_tipo    = data.data.acceso.tipo; 
            $rootScope.global_user_matri   = data.data.acceso.matricula;
            $rootScope.global_user_nivel   = data.data.acceso.niv_usuario; 
            $rootScope.global_user_category= data.data.acceso.nivel;                           
            $rootScope.global_user_user    = data.data.acceso.user_name;
            $rootScope.global_user_permiso = data.data.acceso.permiso;

        });

        
        

    });

  
    app.config(function($routeProvider) {
        $routeProvider
           
            .when("/login", {
                templateUrl: "templates/login.html",
                controller: "loginController"
            })
            .when("/dataTable", {
                templateUrl: "proveedoresForm",
                controller: "proveedoresController"
            })
            .when("/menu4", {
                templateUrl: "menu4",
                controller: ""
            })
            
            .when("/reporte", {
                templateUrl: "reporte",
                controller: ""
            })

            .when("/tecnicos", {
                templateUrl: "tecnicos",
                controller: ""
            })

          
            //Administrador
            .when("/usuarios", {
                templateUrl: "usuarios",
                controller: "UserController"
            })

            .when("/unidades", {
                templateUrl: "unidades",
                controller: "AdminController"
            })
            .when("/equipos", {
                templateUrl: "equipos",
                controller: "equipoController"
            })


            //Control de Reportes
            .when("/activos", {
                templateUrl: "activos",
                controller: "ActivosController"
            })

            .when('/edicion/:folio_ed', {
                templateUrl: "edicion",
                controller: "EdicionController"
            })
            .when('/entrega/:folio', {
                templateUrl: "entrega",
                controller: "EntregaController"
            })

            //Asignacion de Reportes
            .when("/nueServ", {
                templateUrl: "nueServ",
                controller: "nuevosRepController"
            })

            .when("/asignacion/:folio", {
                templateUrl: "asignacion",
                controller: "AsignacionController"
            })

            .when("/home", {
                templateUrl: "home",
                controller: "HomeController"
            })

            .when("/avisos", {
                templateUrl: "avisos",
                controller: "AvisosController"
            })

           
            //*********************Aqui termino mi parte

            //este es digamos, al igual que en un switch el default, en caso que
            //no hayamos concretado que nos redirija a la página principal
            .otherwise({redirectTo: "/home"});
    });

    
    
})();

