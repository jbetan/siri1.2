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
        $scope.IP= "";

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
                            $scope.IP = data.data.IPADDRESS;
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
    app.controller("form2Controller",function($scope, equiposoffline, $http){
        var vm = this;
        vm.equipo= {data:{}};
        vm.equipo.data = equiposoffline.res.data;
        equiposoffline.consulta_solo_ip(function (data) {
            vm.equipo.data = equiposoffline.res.data;
            console.log('ip:', vm.equipo.data);
        });
        $("#otro2").css("display", "none");
        $(".problema_def").click(function(){
            $("#otro2").css("display", "none");
        });
        vm.click_Otro2 = function(){
            $("#otro2").css("display", "block");
        };
        vm.submit = function() {
            $("#datosFormAutocomplete").validate({
                submitHandler: function (form) {
                    $http({
                        url: "confirmacion?saveform2=1",
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                        async: true,
                        method: 'POST',
                        data: $.param(vm.equipo.data)
                    }).success(function (data) {
                        console.log("llega id del reporte",data.id);
                        var id= data;
                        if(data.Error == true ) {
                            alert("Rellena datos")

                        } else {
                            $('#myModal2').modal('show');
                            setTimeout(function(){
                                location.href=('confirmacion?id='+ id);
                                console.log(id);
                            },2000);
                        }
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

    });
    app.controller("formsController", function(equiposoffline, $scope, $http){

        $scope.title     	  = "";
        $scope.error     	  = "";
        $scope.errors    	  = {};
        $scope.form      	  = {};
        var vm = this;
        vm.consulta= {data:{}};
        vm.consulta.data = equiposoffline.res.data;

  /*      equiposoffline.DevuelveUltimoReporte(function(data){
            vm.consulta.data = equiposoffline.res.data;
            console.log("Aqui esta el ID_UNIDAD: ", vm.consulta);
        });*/

        $("#otro").css("display", "none");
        $('#form2').hide();
        $(".problema_def").click(function(){
            $("#otro").css("display", "none");
        });

        $('#form1').show(function(){
            equiposoffline.consultaip(function(data) {
                vm.consulta.data= equiposoffline.res.data;
                console.log('APP',vm.consulta);
            });
        });

        vm.click_Otro = function(){
            $("#otro").css("display", "block");
        };

        vm.selectTab1 = function() {
            $('#form1').show(function(){
                console.info("funcion buscar");
                equiposoffline.consultaip(function(data) {
                    vm.consulta.data= equiposoffline.res.data;
                    console.log('APP',vm.consulta);
                })
            });
            $('#form2').hide();
        };
        vm.selectTab2 = function(){
            $('#form2').show();
            $("#form1").hide();
        };
        vm.submit = function() {
            $("#datosForm").validate({
                submitHandler: function (form) {
                    $(this).attr("disabled", true);
                    $(this).addClass("disabled");
                    console.log("form: ",vm.consulta.data.unidad);
                    if(vm.consulta.data.unidad == undefined)
                    {
                        alert("selecciona un campo del autocomplete");
                        $("input[name='unidades']").css("border", "2px #EBCCD1 solid");
                        $("input[name='unidades']").next( "span" ).css( "display", "block" ).fadeOut(function(){
                                $("input[name='unidades']").click();
                            });



                        return false;
                    }

                    $http({
                        url: "confirmacion?save=1",
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                        async: true,
                        method: 'POST',
                        data: $.param(vm.consulta.data)
                    }).success(function (data) {
                        console.log("llega id del reporte",data.id);
                        var id= data;
                        if(data.Error == true ) {
                            alert("Rellena datos")

                        } else {
                            $('#myModal').modal('show');
                            setTimeout(function(){
                                location.href=('confirmacion?id='+ id);
                                console.log(id);
                            },2000);
                        }
                        //if(data = true){
                        //    console.log("es falso");
                        //}else{
                        //    console.log("si valido");
                        //}
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
    });
})();