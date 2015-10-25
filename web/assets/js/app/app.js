/**
 * Created by Renan on 06/05/2015.
 */
(function(){
    var app = angular.module("appRecibos", [
        "menu-directives",
        "ngResource",
        "ngRoute",
        "datatables",
        'ui.bootstrap',
        'unidades-module',
        'admin-Module',//apartir de aqui emmpieza mis depencias de app
        'user-Module',
        'equip-Module',
        'auto-module',
        'entrega-Module',
        "edicion-Module",
        "asigmacion-Module",
        "Asignar-Module"
    ]);

    app.config(function($routeProvider) {
        $routeProvider
            .when("/proveedores", {
                templateUrl: 'proveedoresForm',
                controller: function($compile, $scope, DTOptionsBuilder, DTColumnBuilder, $resource){
                    var vm = this;
                    vm.dtOptions = DTOptionsBuilder.newOptions()
                        .withOption('ajax', {
                            // Either you specify the AjaxDataProp here
                            // dataSrc: 'data',
                            url: 'php/org/rra/contrarecibos/cfe/controller/ProveedoresController.php',
                            type: 'POST'
                        })
                        // or here
                        .withDataProp('data')
                        .withOption('serverSide', true)
                        .withOption('createdRow', createdRow)
                        .withPaginationType('full_numbers')// Active ColVis plugin
                        .withColVis()
                        // Add a state change function
                        .withColVisStateChange(function(iColumn, bVisible){
                            console.log('The column', iColumn, ' has changed its status to', bVisible);
                        })
                        // Exclude the last column from the list
                        .withColVisOption('aiExclude', [2]);


                    vm.dtColumns = [
                        DTColumnBuilder.newColumn('id').withTitle('ID'),
                        DTColumnBuilder.newColumn('acreedor').withTitle('Acreedor'),
                        DTColumnBuilder.newColumn('nombre').withTitle('Nombre'),
                        DTColumnBuilder.newColumn('rfc').withTitle('RFC'),
                        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
                            .renderWith(actionsHtml)
                    ];
                    vm.edit = function(id) {
                        vm.message = 'You are trying to edit the row with ID: ' + id;
                        // Edit some data and call server to make changes...
                        // Then reload the data so that DT is refreshed
                        vm.dtOptions.reloadData();
                    };
                    vm.deleteRow = function(id) {
                        vm.message = 'You are trying to remove the row with ID: ' + id;
                        // Delete some data and call server to make changes...
                        // Then reload the data so that DT is refreshed
                        vm.dtOptions.reloadData();
                    };
                    function createdRow(row, data, dataIndex) {
                        // Recompiling so we can bind Angular directive to the DT
                        $compile(angular.element(row).contents())($scope);
                    }
                    function actionsHtml(data, type, full, meta) {
                        return '<button class="btn btn-warning" ng-click="tableCase.edit(' + data.id + ')">' +
                            '   <i class="fa fa-edit"></i>' +
                            '</button>&nbsp;' +
                            '<button class="btn btn-danger" ng-click="tableCase.deleteRow(' + data.id + ')">' +
                            '   <i class="fa fa-trash-o"></i>' +
                            '</button>';
                    }
                    setTimeout(function() {
                        //var card = $('#proveedoresCardForm');
                        window.materialadmin.App.initialize();
                        window.materialadmin.AppCard.initialize();
                        window.materialadmin.AppForm.initialize();
                        //window.materialadmin.AppCard.toggleCardCollapse(card);
                    }, 1000);
                },
                controllerAs: "tableCase"
            })

            .when("/login", {
                templateUrl: "templates/login.html",
                controller: "loginController"
            })
            .when("/dataTable", {
                templateUrl: "proveedoresForm",
                controller: "proveedoresController"
            })
            .when("/menu4", {
                templateUrl: "menu4",
                controller: ""
            })
            
            .when("/reporte", {
                templateUrl: "reporte",
                controller: ""
            })

            .when("/tecnicos", {
                templateUrl: "tecnicos",
                controller: ""
            })

          
            //Administrador
            .when("/usuarios", {
                templateUrl: "usuarios",
                controller: "UserController"
            })

            .when("/unidades", {
                templateUrl: "unidades",
                controller: "AdminController"
            })
            .when("/equipos", {
                templateUrl: "equipos",
                controller: "equipoController"
            })


            //Control de Reportes
            .when("/activos", {
                templateUrl: "activos",
                controller: ""
            })

            .when("/edicion", {
                templateUrl: "edicion",
                controller: "EdicionController"
            })
            .when("/entrega", {
                templateUrl: "entrega",
                controller: "EntregaController"
            })

            //Asigancion de Reportes
            .when("/nueServ", {
                templateUrl: "nueServ",
                controller: ""
            })

            .when("/asignacion", {
                templateUrl: "asignacion",
                controller: "AsignacionController"
            })
            //*********************Aqui termino mi parte

            //este es digamos, al igual que en un switch el default, en caso que
            //no hayamos concretado que nos redirija a la página principal
            .otherwise({reditrectTo: "/dataTable"});
    });
})();

