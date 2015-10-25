(function() {
    var app = angular.module("equip-provider", []);
    app.factory("EquipService", function($http) {
        var service = {};

        service.equipo = {data:{}};
        service.equipos = {data:{}};

        service.guardarEquipo = function (data, callback){
            console.log('providerEquipo',data);
            $http({
                url:"equipoController?saveEquipos=1",
                data:$.param(data),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                async: true,
                method: 'POST'
            }).success(function(data){
                if(typeof (callback) != "undefined") {
                    callback(data);
                }
            });
        };

        service.findEquipoById = function(id, callback){
            $promese = $http.get("equipoController?editarEquipos=1&id="+id);
            $promese.then(function(data) {
                service.equipo.data = data.data;
            });
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;
        };

        service.deleteEquipo = function(id, callaback){
            $http({
                url:"equipoController?eliminarEquipos=1&id="+id,
                async: true,
                method: 'GET'
            }).success(function(data) {
                if(typeof (callaback) != "undefined") {
                    callaback(data);
                }
            });
        };

        return service;
    });
})();
