/**
 * Created by Brayan on 29/07/2015.
 */
(function(){
    var app= angular.module("Asignar-Module",["asignar-provider"]);
    app.controller("AsignarController", function(asignarservice, $scope){
        var vm = this;
        vm.asignar= {data:undefined};
        vm.submit = function(){
            $("#asignarForm").validate({
                submitHandler: function (form) {
                    console.log(vm.asignar.data);
                    asignarservice.guardarReporte(vm.asignar.data).success(function (data) { //<- guardar reporte,
                    });
                }
            });
        };
        vm.init=function(){
            setTimeout(function () {
                window.materialadmin.App.initialize();
                window.materialadmin.AppCard.initialize();
                window.materialadmin.AppForm.initialize();
                vm.submit();
            }, 100);
        };
        $scope.$watch("asigna.asignar.data.tipo",function(val, old){
            console.log(val, old);
        });
    });
})();