(function() {
    var app = angular.module("edicion-provider", []);
    app.factory("EdicionService", function($http) {
        var service = {};
        service.reporte = {data:{}};
        service.usuario = {data:{}};
        service.activitiesP = {data:{}};

        service.guardarReporte = function (data, callback){
            console.log('providerReporte',data);
            $http({
                url:"edicionController?saveReporte=1",
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

        service.findActivities = function ( callback){
            console.info('Obteniendo Actividades');
            $promese = $http.get("edicionController?buscarActividad=1");
            $promese.then(function(data) {
                console.log('Actividades',data.data);
                service.activitiesP.data = data.data;
            });
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;

        };

        service.findReporteById = function(id, callback){
            console.log("provider");
            $promese = $http.get("edicionController?buscarReporte=1&id="+id);
            $promese.then(function(data) {
                console.log("provider");
                console.log(data.data);
                service.reporte.data = data.data;
            });
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;
        };

        service.getUsuario = function(callback){
            console.log("provider");
            $promese = $http.get("edicionController?buscarUsuario=1");
            $promese.then(function(data) {
                console.log("provider User");
               console.log(data.data);
                service.usuario.data = data.data;
            });
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;
        };

        return service;
    });
})();


