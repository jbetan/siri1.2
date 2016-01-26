<!doctype html>
<html lang="en" ng-app="activos-Module">
<head>
  <meta charset="utf-8">
  <title>Consulta tu Reporte</title>

	 <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>

    <link type="text/css" rel="stylesheet" href="./web/assets/css/theme-default/bootstrap.css?1422792965" />
    <link type="text/css" rel="stylesheet" href="./web/assets/css/theme-default/materialadmin.css?1425466319" />
    <link type="text/css" rel="stylesheet" href="./web/assets/css/theme-default/font-awesome.min.css?1422529194" />
    <link type="text/css" rel="stylesheet" href="./web/assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
    <!-- END STYLESHEETS -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="./web/assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="./web/assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
	
	<!-- librerias manuales-->
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/materialadmin.css" />
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/font-awesome.css" />
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/material-design-iconic-font.css" />
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/libs/rickshaw/rickshaw.css" />
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/libs/morris/morris.core.css" />
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/libs/DataTables/jquery.dataTables.css" />
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css" />
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css" />
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/libs/wizard/wizard.css" />
	<link type="text/css" rel="stylesheet" href="web/assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css" />
	
</head>
<body class="row">                 
   

	
	
	<div class="section-body col-lg-12"  ng-controller="ActivosController as activos">

    

    <div class="card-head card-head-sm collapsed style-primary-light text-center" data-toggle="collapse" data-parent="#accordion1-2" data-target="#">
        <header><strong> Atención a usuarios
                Consultar reporte o solicitud
                {{5+5}} </strong></header>
        <div class="tools">
            <a class="btn btn-icon-toggle"></a>
        </div>
    </div>
    </br>
    <div id="accordion1-2" >
        <div class="col-sm-6">
            <label class="buscarLibros"> Ingresa el FOLIO, número de SERIE de tu equipo o tu NOMBRE:</label>
            <input ng-model="folioBuscado" placeholder="Irvin Franco" class="form-control" type="text"> <span class=" form-control-feedback" ></span>

            <div class="form-control-line "> </div>

            <br>

            <!-- filtro -->
        </div >
        <div class="col-sm-3">
        <button ng-click="ShowForm()" ng-hide="formVisibility"  class="btn btn-block btn-raised btn-info text-xxxl" style="width:210px" > <i class="fa fa-search "></i> buscar</button>
        </div>
        <div class="col-sm-3">
            <a href="consultareporte" class="btn btn-block btn-raised btn-success text-xxxl" style="width:210px" > <i class="fa fa-search "></i> buscar otra vez</a>
        </div>
            <!-- <div >
            <label class="buscarLibros">INGRESA TU NOMBRE:</label>
            <input ng-model="folioBuscado2"  class="form-control" type="text"> <span class="fa fa-search form-control-feedback"></span>
            <div class="form-control-line "> </div>
            <br>

            <!-- filtro -->
        </div>
        <div ng-show="formVisibility">
        <table   class="col-md-12 table no-margin table-hover    " >
            <thead class="style-default-dark">
            <tr >
                <td style="width: 200px;"></td>
                <td>FOLIO <i class="fa fa-tag"></i>
                </td>
                <td>ESTATUS <i class="fa fa-heartbeat"></i>
                </td>
                <td>TIPO <i class="fa fa-laptop"></i></td>
                <td>RESPONSABLE<i class="fa fa-user"></i>
                </td>
                <td></td>
            </tr>
            </thead>

            <tr class="text-lg"  ng-repeat-start="reporte in activos.reportes.data | filter:folioBuscado | filter:folioBuscado2 "><!--Aqui empieza el ng-repeat-start -->

                <!--inicia Listo-->
                <!--
                <td ng-if="reporte.status == 'Listo'" class="success">
                <button ng-if="reporte.post.expanded" ng-click="reporte.post.expanded = false" class="btn ink-reaction btn-raised btn-primary"><i class="fa fa-minus-circle  fa-2x"></i></button>
                <button  class="btn ink-reaction btn-raised btn-primary" type="button"  ng-if="!reporte.post.expanded" ng-click="reporte.post.expanded = true"><i class="fa fa-plus-circle fa-2x"></i> </button>
                </td>
                <td ng-if="reporte.status == 'Listo'" class="success text-ultra-bold text-xxl ">{{reporte.folio}}</td>
                <td ng-if="reporte.status == 'Listo'" class="success">{{reporte.status}}</td>
                <td ng-if="reporte.status == 'Listo'" class="success">{{reporte.descripcion}}</td>
                <td ng-if="reporte.status == 'Listo'" class="success">{{reporte.nombre}}</td>

                <!--termina Listo-->

                <!--inicia Garantia-->
                <h3>
                    <td ng-if="reporte.status == 'Garantia'" class="danger">
                        <button ng-if="reporte.post.expanded" ng-click="reporte.post.expanded = false" class="btn ink-reaction btn-raised btn-primary"><i class="fa fa-minus-circle fa-2x"></i>
                        </button>
                        <button  class="btn ink-reaction btn-raised btn-primary" type="button"  ng-if="!reporte.post.expanded" ng-click="reporte.post.expanded = true"><i class="fa fa-plus-circle fa-2x"></i>
                        </button>
                    </td>
                    <td ng-if="reporte.status == 'Garantia'" class="danger text-ultra-bold text-xxl">{{reporte.folio}}</td>
                    <td ng-if="reporte.status == 'Garantia'" class="danger"> {{reporte.status}}</td>
                    <td ng-if="reporte.status == 'Garantia'" class="danger"> {{reporte.descripcion}}</td>
                    <td ng-if="reporte.status == 'Garantia'" class="danger"> {{reporte.nombre}}</td>
                    <!--termina Garantia-->

                    <!--inicia reparacion-->
                    <td ng-if="reporte.status == 'En reparacion'" class="warning">
                        <button ng-if="reporte.post.expanded" ng-click="reporte.post.expanded = false" class="btn ink-reaction btn-raised btn-primary"><i class="fa fa-minus-circle  fa-2x"></i></button>
                        <button  class="btn ink-reaction btn-raised btn-primary" type="button"  ng-if="!reporte.post.expanded" ng-click="reporte.post.expanded = true"><i class="fa fa-plus-circle fa-2x"></i></button>
                    </td>
                    <td ng-if="reporte.status == 'En reparacion'" class="warning text-ultra-bold text-xxl">{{reporte.folio}}</td>
                    <td ng-if="reporte.status == 'En reparacion'" class="warning"> {{reporte.status}}</td>
                    <td ng-if="reporte.status == 'En reparacion'" class="warning"> {{reporte.descripcion}}</td>
                    <td ng-if="reporte.status == 'En reparacion'" class="warning"> {{reporte.nombre}}</td>
                    <!--termina reparacion-->

                      <!--inicia entregado-->
                    <td ng-if="reporte.status == 'Entregado'" class="info">
                        <button ng-if="reporte.post.expanded" ng-click="reporte.post.expanded = false" class="btn ink-reaction btn-raised btn-primary"><i class="fa fa-minus-circle  fa-2x"></i></button>
                        <button  class="btn ink-reaction btn-raised btn-primary" type="button"  ng-if="!reporte.post.expanded" ng-click="reporte.post.expanded = true"><i class="fa fa-plus-circle fa-2x"></i></button>
                    </td>
                    <td ng-if="reporte.status == 'Entregado'" class="info text-ultra-bold text-xxl">{{reporte.folio}}</td>
                    <td ng-if="reporte.status == 'Entregado'" class="info"> {{reporte.status}}</td>
                    <td ng-if="reporte.status == 'Entregado'" class="info"> {{reporte.descripcion}}</td>
                    <td ng-if="reporte.status == 'Entregado'" class="info"> {{reporte.nombre}}</td>
                    <!--termina entregado-->

                    <!--inicia nuevo-->
                    <td ng-if="reporte.status == 'nuevo'" class="alert alert-accent">
                        <button ng-if="reporte.post.expanded" ng-click="reporte.post.expanded = false" class="btn ink-reaction btn-raised btn-primary"><i class="fa fa-minus-circle  fa-2x"></i></button>
                        <button  class="btn ink-reaction btn-raised btn-primary" type="button"  ng-if="!reporte.post.expanded" ng-click="reporte.post.expanded = true"><i class="fa fa-plus-circle fa-2x"></i></button>
                    </td>
                    <td ng-if="reporte.status == 'nuevo'" class="alert alert-accent text-ultra-bold text-xxl">{{reporte.folio}}</td>
                    <td ng-if="reporte.status == 'nuevo'" class="alert alert-accent"> {{reporte.status}}</td>
                    <td ng-if="reporte.status == 'nuevo'" class="alert alert-accent"> {{reporte.descripcion}}</td>
                    <td ng-if="reporte.status == 'nuevo'" class="alert alert-accent"> {{reporte.nombre}}</td>
                    <!--termina nuevo-->
                </h3>
                <!--inicia entregado-->

                <!--inicia Listo-->
                <td ng-if="reporte.status == 'Listo'" class="success">
                    <button ng-if="reporte.post.expanded" ng-click="reporte.post.expanded = false" class="btn ink-reaction btn-raised btn-primary"><i class="fa fa-minus-circle  fa-2x"></i></button>
                    <button  class="btn ink-reaction btn-raised btn-primary" type="button"  ng-if="!reporte.post.expanded" ng-click="reporte.post.expanded = true"><i class="fa fa-plus-circle fa-2x"></i> </button>
                </td>
                <td ng-if="reporte.status == 'Listo'" class="success text-ultra-bold text-xxl ">{{reporte.folio}}</td>
                <td ng-if="reporte.status == 'Listo'" class="success">{{reporte.status}}</td>
                <td ng-if="reporte.status == 'Listo'" class="success">{{reporte.descripcion}}</td>
                <td ng-if="reporte.status == 'Listo'" class="success">{{reporte.nombre}}</td>
                <!--termina Listo-->

                <!--
                <td ng-if="reporte.status == 'Entregado'" class="">
                    <button ng-if="reporte.post.expanded" ng-click="reporte.post.expanded = false" class="btn ink-reaction btn-raised btn-primary"><i class="fa fa-minus-circle  fa-2x"></i></button>
                    <button  class="btn ink-reaction btn-raised btn-primary" type="button"  ng-if="!reporte.post.expanded" ng-click="reporte.post.expanded = true"><i class="fa fa-plus-circle fa-2x"></i></button>
                </td>
                <td ng-if="reporte.status == 'Entregado'" class="active text-ultra-bold text-xxl">{{reporte.folio}}</td>
                <td ng-if="reporte.status == 'Entregado'" class="active"> {{reporte.status}}</td>
                <td ng-if="reporte.status == 'Entregado'" class="active"> {{reporte.descripcion}}</td>
                <td ng-if="reporte.status == 'Entregado'" class="active"> {{reporte.nombre}}</td>
                <!--termina entregado-->

            </tr> <!--Aqui termina el ng-repeat-start -->



            <tr ng-if="reporte.post.expanded" ng-repeat-end>
                <td colspan="1"> <div class="col-sm-1">
                    <div class="btn-group open">



                    </div>
                </div>
                </td>

                <td  colspan="1" >

                    <strong>Unidad:</strong> {{reporte.unidad}} <br/>
                    <strong>Fecha de Recepción:</strong> {{reporte.finicio}}  <br/>
                    <strong>Persona </strong> {{reporte.personaquereporta}}
                </td>
                <td>

                    <strong>Prioridad </strong> {{reporte.prioridad}}</br>

                    <strong class=" style-dange">Problema
                    </strong> {{reporte.problema}} <br/>
                    <strong>Área:</strong> {{reporte.area}} <br>


                </td>
                <td>

                    <strong>Marca:</strong>{{reporte.marca}} <br/>
                    <strong>Modelo:</strong> {{reporte.modelo}}<br/>
                    <strong>Serie:</strong> {{reporte.serie}}
                </td>
                <td>


                    <strong>Fecha Inicio:</strong> {{reporte.finicio}} <br/>
                    <strong>Fecha Término:</strong> {{reporte.ftermino}}

                </td>


                <td colspan="2">   </td>
            </tr>






        </table>
    </div>
        <br>
        <br>
        <div class="col-sm-3">


            <a class="btn btn-block btn-raised btn-primary-light text-xxxl" style="width: 310px" href="login"> <i class="fa fa-arrow-circle-o-left "></i> Regresar</a>
    </div>

    {{reporte.status}}
    





    </div> <!-- cierra el angular  -->
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  <!-- Agregamos angular para que funcione  -->
  
        <script src="./web/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
        <script src="./web/assets/js/libs/jquery-ui/jquery-ui.min.js"></script>

        <script src="./web/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="./web/assets/js/libs/bootstrap/bootstrap.min.js"></script>
        <script src="./web/assets/js/libs/spin.js/spin.min.js"></script>
        <script src="./web/assets/js/libs/autosize/jquery.autosize.min.js"></script>
        <script src="./web/assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
        <script src="./web/assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
        <script src="./web/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
        <script src="./web/assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="./web/assets/js/libs/jquery-validation/dist/localization/messages_es.min.js"></script>
        <script src="./web/assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
        <script src="./web/assets/js/core/source/App.js"></script>
        <script src="./web/assets/js/core/source/AppNavigation.js"></script>
        <script src="./web/assets/js/core/source/AppCard.js"></script>
        <script src="./web/assets/js/core/source/AppForm.js"></script>
        <script src="./web/assets/js/core/source/AppNavSearch.js"></script>
        <script src="./web/assets/js/core/source/AppVendor.js"></script>
        <script src="./web/assets/js/core/demo/Demo.js"></script>
        <script src="./web/assets/js/core/angular/angular.min.js"></script>
        <script src="./web/assets/js/core/angular/angular-route.min.js"></script>
        <script src="./web/assets/js/core/angular/angular-resource.min.js"></script>
        <script src="./web/assets/js/core/angular/angular-datatables.min.js"></script>
        <script src="./web/assets/css/theme-default/libs/ui-bootstrap/ui-bootstrap-tpls-0.13.0.js"></script>
        
  
  <!-- Importamos los archivos extras que vamos a usar -->
  <script src="./web/login/app.js"></script>
</body>
</html>