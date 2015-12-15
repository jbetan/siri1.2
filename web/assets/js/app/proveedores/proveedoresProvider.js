/**
 * Created by Renan on 02/06/2015.
 */
(function() {
    var app = angular.module("proveedores-provider", []);
    app.factory("ProveedoresService", function($http) {
        var service = {};
        service.proveedor = {data:{}};
        service.proveedores = {data:{}};

        service.findProveedorById = function(idProveedor, callback) {
            $promese = $http.get("findProveedorById?id="+idProveedor);

            //Esta funcion se invocado cuando no hay errores con los datos
            $promese.then(function(data) {
                service.proveedor.data = data.data;
            });
            //Esta función se invocará cuando finalice la petición HTTP.
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;
        };

        service.saveProveedor = function(data, callaback){
            $http({
                url:"saveProveedor?save=1",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}, //Codifica el arreglo para poder pasarlo por url
                async: true,
                method: 'POST'

            }).success(function(data) {
                if(typeof (callaback) != "undefined") {
                    callaback(data);
                }
            });
        };

        service.delete = function(id, callaback){
            $http({
                url:"saveProveedor?delete="+id,
                async: true,
                method: 'GET'
            }).success(function(data) {
                if(typeof (callaback) != "undefined") {
                    callaback(data);
                }
            });
        };

        service.findProveedores = function(value, callback) {
            $promese = $http.get("findProveedorById?getList=1&value="+value);

            $promese.then(function(data) {
                service.proveedores.data = data.data;
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