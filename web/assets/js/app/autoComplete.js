/**
 * Created by J. Betancourt on 30/07/2015.
 */
var app = angular.module('auto-module', ['ui.bootstrap']);



app.controller('AutComFolioCtrl', function($scope, $http) {
    getFolio(); // Load all countries with capitals
    function getFolio(){
        $http.get("entregaController?getFolio=1").success(function(data){
            $scope.datos= data;
            console.warn(data);
        });
    };
});

app.controller('getFolio-Asignacion', function($scope, $http) {
    getFolio(); // Load all countries with capitals
    function getFolio(){
        $http.get("asignacionController?getFolio=1").success(function(data){
            $scope.datos= data;
            console.warn(data);
        });
    };
});


app.controller('getFolioAutoEdicion', function($scope, $http) {
    getFolio(); // Load all countries with capitals
    function getFolio(){
        $http.get("entregaController?getFolioAutoEdicion=1").success(function(data){
            $scope.datos= data;
            console.warn(data);
        });
    };
});




app.controller('AutoUsuario', function($scope, $http) {
    getFolio(); // Load all countries with capitals
    function getFolio(){
        $http.get("edicionController?getUsuarios=1").success(function(data){
            $scope.datos= data;
            console.warn(data);
        });
    };
});


app.controller('autocompleteController', function($scope, $http) {
    getCountries(); // Load all countries with capitals
    function getCountries(){
        $http.get("equipoController?getlista=1").success(function(data){
            $scope.datos= data;
            //console.log(data);
        });
    };
});

app.controller('AuComTipo', function($scope, $http) {
    getCountries(); // Load all countries with capitals
    function getCountries(){
        $http.get("equipoController?getTipo=1").success(function(data){
            $scope.datos= data;
            //console.log(data);
        });
    };
});

app.controller('AuComUnidades', function($scope, $http) {
    getCountries(); // Load all countries with capitals
    function getCountries(){
        $http.get("usuariosController?getUnidades=1").success(function(data){
            $scope.datos= data;
            //console.log(data);
        });
    };
});