/**
 * Created by Brayan on 16/07/2015.
 */
(function(){
    var app = angular.module("modelo-module", []);
    app.controller("ModeloController", function($scope, $http){
        //(Es el inciso 1)
        getListaModelo();
        function getListaModelo(){
            $http.get("CatalogoModelo").success(function(data){
                //este dato es el que usaras en el typeahead
                //Inciso 2
                $scope.modelo= data;

            });
        };
    });
})();
