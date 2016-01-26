<!DOCTYPE html>
<html lang="en">
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
    <header>
        <div style="margin-right: 10%" class="text-lg text-right"><span class="text-bold">TU</span> DIRECCION <span class="text-bold">IP</span> es: <span class=""><?php $ip= gethostbyname(gethostbyaddr($_SERVER['REMOTE_ADDR']) );
                echo $ip ;?></span></div>
        <br/><br/>

    </header>
    <div id="contentV2">
        <!-- BEGIN 404 MESSAGE -->
        <section id="print_area">
            <div class="text-center" style="margin-top: -50px; position: relative">
                <h2 style="position: relative">Atención a Usuarios
                    <br/><span style="" class="text-bold">Levantar reporte o Solicitud</span>
                </h2>
            </div>
            <div class="section-body contain-lg">
                <div class="row" style="">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3>Tu solicitud ha sido levantada con los siguientes datos:</h3>
                        <form class="form">
                            <div class="form-group col-lg-12">
                                <style>#folio{font-size: 75px;}</style>
                                <h4><span>Folio: </span></h4><div id="folio"></div>
                            </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <input type="text" name="areas" id="unidad" class="form-control" disabled/>
                                <label for="unidad">Unidad</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="areas" id="area" class="form-control" disabled/>
                                <label for="area">Area</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="tipo" id="tipo" class="form-control" disabled/>
                                <label for="tipo">Tipo</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="user_report" id="user_report" class="form-control" disabled/>
                                <label for="tipo">Persona que reporta</label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <input type="text" name="marca" id="marca" class="form-control" disabled/>
                                <label for="marca">Marca</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="modelo" id="modelo" class="form-control" disabled/>
                                <label for="modelo">Modelo</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="serie" id="Nserie" class="form-control" disabled/>
                                <label for="serie">Número de serie</label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <input type="text" name="fecha" id="fecha" class="form-control" disabled/>
                                <label for="unidad">Fecha</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="IP" id="ip" class="form-control" disabled/>
                                <label for="IP">Dirección IP</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="problema" id="problema" class="form-control" disabled />
                                <label for="tipo">Descripción del problema</label>
                                <br/>
                            </div>
                        </div>
                        </form>
                    </div><!--end .col-lg-12 -->
                    <h2><u>Conserva tu folio para consultar el status de tu equipo</u></h2>
                </div><!--end .row -->
            </div><!--end .section-body -->
        </section>
        <div class="container text-right" style="margin-bottom: 30px;">
            <div class="col-lg-12 hidden-xs">
                <a href="javascript:void(0)" id="imprimir" class="btn btn-raised ink-reaction btn-primary-dark">Imprimir Folio</a>
                <a href="login" class="btn btn-raised ink-reaction btn-default-dark">Regresar</a>
            </div>

        </div>
        <!-- END 404 MESSAGE -->

    </div><!--end #content-->
    <!-- END CONTENT -->

</div><!--end #base-->
<!-- END BASE -->

<!-- BEGIN JAVASCRIPT -->
<script src="<?=$this->contextPath?>/web/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/libs/PrintArea/jquery.PrintArea.js"></script>
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
<script src="<?=$this->contextPath?>/web/assets/js/app/confirmacion/main.js"></script>



</body>
</html>
