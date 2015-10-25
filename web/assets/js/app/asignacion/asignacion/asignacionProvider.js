(function() {
    var app = angular.module("asignacion-provider", []);
    app.factory("AsignacionService", function($http) {
        var service = {};
        service.reporte = {data:{}};
        service.usuario = {data:{}};
        service.claseP = {data:{}};

        service.guardarReporte = function (data, callback){
            console.log('providerReporte',data);
            $http({
                url:"asignacionController?saveReporte=1",
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

        service.findReporteById = function(id, callback){
            console.log("provider");
            $promese = $http.get("asignacionController?buscarReporte=1&id="+id);
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

        service.findUsuariosByOtro = function(callback){
            console.log("provider");
            $promese = $http.get("asignacionController?buscarUsuarioOtro=1");
            $promese.then(function(data) {
                //console.log("provider User");
               // console.log(data.data);
                service.usuario.data = data.data;
            });
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;
        };

        service.findUsuariosByTipo = function(tipo, callback){
            //console.log("provider");
            $promese = $http.get("asignacionController?buscarUsuarioTipo=1&tipo="+tipo);
            $promese.then(function(data) {
                //console.log("provider User");
                console.log(data.data);
               // console.log("provider despues del log");
                service.usuario.data = data.data;
            });
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;
        };

        service.findClase = function(callback){
            console.log("provider");
            $promese = $http.get("asignacionController?buscarClase=1");
            $promese.then(function(data) {
                //console.log("provider User");
                // console.log(data.data);
                service.claseP.data = data.data;
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


