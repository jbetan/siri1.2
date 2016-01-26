
(function() {
    var app = angular.module("activos-Module", []);
    app.controller("ActivosController", function($compile, $scope, $http){
        var vm = this;
        vm.reportes = {data:undefined};
        vm.posts=[];
        

getReportes();


        function getReportes () {
            console.info("funcion cargar datos");
            $promese = $http.get("edicionController?getReporte=1");
            $promese.then(function(data) {
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


        $scope.formVisibility=false;
        $scope.ShowForm=function(){

            $scope.formVisibility=true;
            console.log($scope.formVisibility);
        }


    });
})();