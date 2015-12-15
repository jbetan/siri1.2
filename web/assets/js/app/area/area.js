/**
 * Created by Brayan on 16/07/2015.
 */
(function(){
    var app = angular.module("area-module", []);
    app.controller("AreaController", function($scope, $http){
        //(Es el inciso 1)
        getListaMarca();
        function getListaMarca(){
            $http.get("CatalogoArea").success(function(data){
                //este dato es el que usaras en el typeahead
                //Inciso 2
                $scope.area= data;

            });
        };
    });
})();