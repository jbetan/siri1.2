(function() {
    var app = angular.module("user-provider", []);
    app.factory("UserService", function($http) {
        var service = {};

        service.usuario = {data:{}};
        service.usuarios = {data:{}};


        service.guardarUsuario = function (data, callback){
            console.info('Providrr', data);
            $http({
                url:"usuariosController?saveUsuarios=1",
                data:$.param(data),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                async: true,
                method: 'POST'
            }).success(function(data){
                console.log("exito Privider");
                if(typeof (callback) != "undefined") {
                    callback(data);
                }
            });
        };

        service.findUserById = function(id, callback){
            $promese = $http.get("usuariosController?editarUser=1&id="+id);
            $promese.then(function(data) {
                service.usuario.data = data.data;
            });
            $promese.success(function() {
                if(typeof (callback) != "undefined") {
                    callback();
                }
            });
            return $promese;
        };

        service.deleteUser = function(id, callaback){
            $http({
                url:"usuariosController?eliminarUser=1&id="+id,
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
