
(function() {
    var app = angular.module("nuevosReportes-Module", ["datatables", "asignacion-provider"]);
    app.controller("nuevosRepController",  function($compile, $scope, $http, $routeParams, AsignacionService,  DTOptionsBuilder, DTColumnBuilder){
        var vm = this;
        vm.rep = {data:undefined};
        

        getReportes();

        function getReportes () {
            console.info("funcion cargar datos");
            $promese = $http.get("asignacionController?getReportes=1");
            $promese.then(function(data) {
                vm.rep.data = data.data; //my json 13
            });
            return $promese;
        };
        vm.asig = asig;
         function asig(id) {
            console.log("paso",id);
         };

        
        vm.init = function() {
            setTimeout(function () {
                window.materialadmin.App.initialize();
                window.materialadmin.AppCard.initialize();
                window.materialadmin.AppForm.initialize();
         



            }, 100);
        }

    });
})();