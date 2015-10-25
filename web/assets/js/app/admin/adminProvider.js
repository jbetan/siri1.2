(function() {
    var app = angular.module("admin-provider", []);
    app.factory("AdminService", function($http) {
        var service = {};


        service.unidad = {data:{}};
        service.unidades = {data:{}};


        //*****************Unidades****************************
        service.guardarUnidades = function (data, callback){
            console.log('providerUnidades',data);
            $http({
                url:"admin?saveUnidades=1",
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

        service.findUnidadesById = function(idUnidad, callback){
            $promese = $http.get("admin?editarUnidad=1&id="+idUnidad);
            $promese.then(function(data) {
                console.info('Provider',data.data);
                service.unidad.data = data.data;
                console.info('Provider 2',service.unidad.data);
            });
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;
        };

        service.deleteUnidad = function(id, callaback){
            $http({
                url:"admin?eliminarUnidad=1&id="+id,
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