/**
 * Created by Brayan on 18/06/2015.
 */
(function(){
    var app = angular.module("unidades-module", []);
    app.controller("UnidadesController", function($scope, $http, equiposoffline){
        //(Es el inciso 1)
        getListaUnidades();
        function getListaUnidades(){
            $http.get("catalogoUnidad").success(function(data){
                //este dato es el que usaras en el typeahead
                //Inciso 2
                $scope.unidad= data;
                /*$.each($scope.unidad,function(index, value){
                    console.log("Llego el "+ index + "y el valor: "+ this.nombre);
                    $scope.nombre = [this.nombre];
                    //$("input[nombre='unidades']").val('hola');
                    console.log($scope.nombre);
                });*/
            });
        };
    });
})();