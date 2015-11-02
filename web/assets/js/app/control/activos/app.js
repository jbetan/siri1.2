
(function() {
    var app = angular.module("activos-Module", ["activos-provider"]);
    app.controller("ActivosController", function($compile, $scope, EdicionService, $http){
        var vm = this;
        vm.reportes = {data:undefined};
        $scope.posts=[];
        getReportes();




        function getReportes () {
            console.info("funcion cargar datos");
            $promese = $http.get("edicionController?getReporte=1");
            $promese.then(function(data) {
                console.log('Actividades',data.data);
                vm.reportes.data = data.data; //my json 13
            });
            return $promese;
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