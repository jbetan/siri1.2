<!DOCTYPE html>
<html lang="en" ng-app="equipos-module">
<head>
    <title><?=$this->title?></title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/bootstrap.css?1422792965" />
    <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/materialadmin.css?1425466319" />
    <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/font-awesome.min.css?1422529194" />
    <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?= $this->contextPath?>/web/assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="<?= $this->contextPath?>/web/assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>
<body class="menubar-hoverable header-fixed " >
<!-- BEGIN BASE--><?php
$_SESSION["VISIT_user"] = $_SERVER['REMOTE_ADDR']
?>
<div id="base">
       <!-- BEGIN CONTENT-->
    <div id="contentV2">

        <!-- BEGIN 404 MESSAGE -->
        <section>
            <div class="section-body contain-lg" ng-controller="EquiposController as equipos">

                <div class="row" style="">
                    <div class="col-lg-12">
                        <p>Tu solicitud ha sido levantada con los siguientes datos:</p>
                        <form class="form">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" name="folio" class="form-control"/>
                                <label for="folio">Folio</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="areas" class="form-control"/>
                                <label for="unidad">Unidad</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="areas" class="form-control"/>
                                <label for="area">Area</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="tipo" class="form-control"/>
                                <label for="tipo">Tipo</label>
                            </div>
                        </div>
                        <div class="col-sm-3" style="margin-top: 6%;">
                            <div class="form-group">
                                <input type="text" name="marca" class="form-control"/>
                                <label for="marca">Marca</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="modelo" class="form-control"/>
                                <label for="modelo">Modelo</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="serie" class="form-control"/>
                                <label for="serie">Número de serie</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="date" name="fecha" class="form-control"/>
                                <label for="unidad">Fecha</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="IP" class="form-control"/>
                                <label for="IP">Dirección IP</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="problema" id="" class="form-control" />
                                <label for="tipo">Descripción del problema</label>
                                <br/>
                                <div class="text-center"><a href="equipoReporte" class="btn btn-raised ink-reaction btn-default-dark">Regresar</a></div>
                            </div>
                        </div>
                        </form>
                    </div><!--end .col-lg-12 -->
                    <h2><u>Conserva tu folio para consultar el status de tu equipo</u></h2>
                </div><!--end .row -->
            </div><!--end .section-body -->
        </section>
        <!-- END 404 MESSAGE -->

    </div><!--end #content-->
    <!-- END CONTENT -->

</div><!--end #base-->
<!-- END BASE -->

<!-- BEGIN JAVASCRIPT -->
<script src="<?=$this->contextPath?>/web/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/spin.js/spin.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/jquery-validation/dist/localization/messages_es.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/App.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/AppNavigation.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/AppOffcanvas.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/AppCard.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/AppForm.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/AppNavSearch.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/source/AppVendor.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/demo/Demo.js"></script>
<!-- END JAVASCRIPT -->
<script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular-route.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular-resource.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular-datatables.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/css/theme-default/libs/ui-bootstrap/ui-bootstrap-tpls-0.13.0.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/app.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/unidades/unidades.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/tipo/tipo.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/modelo/modelo.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/marca/marca.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/area/area.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/menu/menu.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/equiposoffline/app.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/equiposoffline/provider.js"></script>


</body>
</html>
