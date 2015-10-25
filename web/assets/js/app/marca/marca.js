/**
 * Created by Brayan on 16/07/2015.
 */
(function(){
    var app = angular.module("marca-module", []);
    app.controller("marcaController", function($scope, $http){
        //(Es el inciso 1)
        getListaMarca();
        function getListaMarca(){
            $http.get("CatalogoMarca").success(function(data){
                //este dato es el que usaras en el typeahead
                //Inciso 2
                $scope.marca= data;

            });
        };
    });
})();