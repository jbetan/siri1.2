
(function() {
    var app = angular.module("home-Module", ['ngSanitize']);
    app.controller("HomeController", function($compile, $scope, $http){
       
       	var vm = this;
		vm.avisos = {data:undefined};


	//Llamada a los datos de los avisos
		getReportes();
        function getReportes () {
            console.info("funcion cargar datos");
            $promese = $http.get("avisosController?get_avisos=1");
            $promese.then(function(data) {
                vm.avisos.data = data.data;                 
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