/**
 * Created by Renan on 06/05/2015.
 */
(function() {
    var app = angular.module("menu-directives", []);
    app.factory("menuService", ["$http", function($http){
        var service = {
            menu : {data:null}
        };
        service.getMenu = function() {
            $http.get("/siri1.2/menu?"+(new Date)).then(function(data) {
                service.menu.data = data.data;
            });
            return service.menu;
        }

        return service;
    }]);
    app.directive("menuUsuario", ["$location", "menuService", function($location, menuService){
        return {
            restrict: "E",
            templateUrl: function (elem, attr){
                return attr.path + "/" + attr.menu + "?path=" + attr.path;
            },
            controller: function(menuService, $location) {
                var menuScope = this;
                menuScope.menu = menuService.getMenu();
                setTimeout(function(){
                    navOut(window.materialadmin, jQuery);
                }, 500);

            },
            controllerAs: "menuCtrl"
        };
    }]);
})();