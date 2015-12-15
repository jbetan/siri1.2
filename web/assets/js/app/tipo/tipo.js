/**
 * Created by Brayan on 16/07/2015.
 */
(function(){
    var app = angular.module("tipo-module", []);
    app.controller("TipoController", function($scope, $http){
        //(Es el inciso 1)
        getListaTipo();
        function getListaTipo(){
            $http.get("CatalogoTipo").success(function(data){
                //este dato es el que usaras en el typeahead
                //Inciso 2
                $scope.tipo= data;

            });
        };
    });
})();