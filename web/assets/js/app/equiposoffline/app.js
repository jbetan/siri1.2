/**
 * Created by Brayan on 12/07/2015.
 */
(function(){
    var app= angular.module("equipos-module",["equiposoffline-provider","unidades-module","tipo-module","marca-module","modelo-module","area-module", 'ui.bootstrap']);
    app.controller("EquiposController",function($scope, equiposoffline){

        $scope.unidad_n="";
        $scope.marc = "";
        $scope.model="";
        $scope.n_Serie="";

        var vm = this;
        vm.ip= {data:undefined};
        vm.submit = function() {
            if($scope.submit == undefined) {
                $scope.submit = $("#formequiposip").validate({
                    submitHandler: function (form) {
                        var q = equiposoffline.buscarip($(form).serialize()).then(function(data){
                            //vm.ip.data=data;
                            $scope.unidad_n = data.data.NAME;
                            $scope.marc = data.data.SMANUFACTURER;
                            $scope.model = data.data.SMODEL;
                            $scope.n_Serie = data.data.ASSETTAG;
                            //service.ip.data= data.data;
                            //console.log(service.ip);
                        });
                        console.log(vm.ip);
                        console.log("si llega");
                        return false;
                    }
                });
            }
            $("#datosForm").validate({
                submitHandler: function (form) {
                    console.log(vm.equipo.data);
                    equiposoffline.guardarReporte(vm.equipo.data).success(function (data) { //<- guardar reporte,
                    });
                }
            });

        };
        //otro validate para el siguiente modulo del autocomplete

        vm.init=function(){
            setTimeout(function () {
                window.materialadmin.App.initialize();
                window.materialadmin.AppCard.initialize();
                window.materialadmin.AppForm.initialize();
                vm.submit();
            }, 100);
        };
    });
    app.controller("form2Controller",function($scope, equiposoffline){
        var vm = this;
        vm.equipo= {data:undefined};
        vm.submit = function() {
            $("#datosFormAutocomplete").validate({
                submitHandler: function (form) {
                    console.log(vm.equipo.data);
                    equiposoffline.guardarReporteAutocomplete(vm.equipo.data).success(function (data) { //<- guardar reporte,
                    });
                }            });
        };

    });
    app.controller("formsController", function(equiposoffline){
        var vm = this;
        vm.consulta= {data:{}};
        vm.consulta.data = equiposoffline.res.data;
        this.tab = 0;
        this.selectTab = function(setTab) {
            this.tab = setTab;
            console.info("funcion buscar");
            equiposoffline.consultaip(function(data) {
            });
            vm.consulta.data= equiposoffline.res.data;
            console.log('APP',vm.consulta);
            };
        vm.submit = function() {
            $("#datosForm").validate({
                submitHandler: function (form) {
                    console.log(vm.consulta.data);
                    equiposoffline.guardarReporteAutocomplete(vm.consulta.data).success(function (data) { //<- guardar reporte,
                    });
                    if(vm.consulta.data == ""){
                        console.log("no entra");
                    }else{
                        $('#Enviar').click(function(){
                            $("#contentV2").load('confirmacion');
                        });

                    }
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

        this.isSelected = function(checkTab) {
            return this.tab === checkTab;
        };
    });
})();