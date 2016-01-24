/**
 * Created by Brayan on 07/11/2015.
 */
(function(){
    var app= angular.module("page-module",["pageOcs-provider"]);
    app.controller("pageController", function(ipOcs, $scope){


        var vm = this;
        vm.ip={data:{}};
        vm.ip.data= ipOcs.ipComparada.data;
        vm.click = function(){
            ipOcs.CompararIP(function(data, callback){
                vm.ip.data= ipOcs.ipComparada.data;
                console.log("trajo dato del page-provider", vm.ip);
                console.log(vm.ip.data);
                if(vm.ip.data == "false"){
                    location.href=('equipo_Reporte');
                    console.log("No esta en OCS");
                }else{
                    location.href=("");
                    console.log("Si esta en OCS");
                }
            });

        };

    });
})();
