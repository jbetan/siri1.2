<!DOCTYPE html>
<html lang="en" ng-app="page-module">
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
<body class="menubar-hoverable header-fixed ">

<!-- BEGIN BASE-->
<div id="base">
    <header class="col-lg-12">
        <div style="float: right;margin-right: 10%" class="text-lg"><span class="text-bold">TU</span> DIRECCION <span class="text-bold">IP</span> es: <span class="text-lg">
                <?php
                $ip= gethostbyname(gethostbyaddr($_SERVER['REMOTE_ADDR']) );
                echo $ip ;

                ?>
            </span></div>
        <br/><br/>
        <div class="text-center"><h1>Atención a Usuarios <br/> <span class="text-bold">Levantar reporte o Solicitud</span></h1></div>
    </header>
    <!-- BEGIN CONTENT-->
    <div id="contentV2">

        <!-- BEGIN 404 MESSAGE -->
        <section class="col-lg-12">

            <div class="section-body contain-lg">

                <div class="col-lg-12" style="">
                    <div class="col-lg-12">
                        <div class="col-lg-12 text-right"><a href="login" class="btn btn-raised ink-reaction btn-primary-dark"><b><</b> Regresar</a></div>
                        <br/><br/>
                        <!--Equipos de Computo

                        href = equipoReporte-->

                        <div class="col-lg-4" ng-controller="pageController as page">
                            <a href="javascript:void(0)" id="equiposRep" ng-click="page.click()"><div class="col-lg-12 text-center btn btn-raised ink-reaction" style="border:2px #2b323a solid; height:400px;width: 100%; background-color: rgb(43, 50, 58);color:white;">
                                <div id="bas2">
                                    <!-- BEGIN CONTENT-->
                                    <div id="content">
                                        <!-- BEGIN 404 MESSAGE -->
                                        <section>
                                            <div class="section-body contain-lg">
                                                <div class="row">
                                                    <div class="col-lg-12 text-center">
                                                        <h1><span class="text-xl text-light">
                                                                E<span style="text-transform: lowercase">quipos</span> <span style="text-transform: lowercase"><br/>de<br/></span> <span style="text-transform: lowercase">cómputo</span>
                                                            </span>
                                                        </h1>
                                                    </div><!--end .col -->
                                                </div><!--end .row -->
                                            </div><!--end .section-body -->
                                        </section><!-- END 404 MESSAGE -->
                                    </div><!--end #content-->
                                </div><!--end #base-->
                            </div></a>
                        </div>


                        <!--Impresorasd-->
                        <div class="col-lg-4">
                            <a href="#">
                                <div class="col-lg-12 text-center btn btn-raised ink-reaction" style="border:2px #9c27b0 solid; height:400px;width: 100%; background-color: rgb(156, 39, 176);color:white;">
                                    <div id="bas2">
                                        <!-- BEGIN CONTENT-->
                                        <div id="content">
                                            <!-- BEGIN 404 MESSAGE -->
                                            <section>
                                                <div class="section-body contain-lg">
                                                    <div class="row">
                                                        <div class="col-lg-12 text-center">
                                                            <h1 style="margin-top: 95px;">
                                                                <span class="text-light" style="font-size: 55px">
                                                                    I<span style="text-transform: lowercase">mpresoras</span>
                                                                </span>
                                                            </h1>
                                                        </div><!--end .col -->
                                                    </div><!--end .row -->
                                                </div><!--end .section-body -->
                                            </section>
                                            <!-- END 404 MESSAGE -->
                                        </div><!--end #content-->
                                        <!-- END CONTENT -->
                                    </div><!--end #base-->
                                </div>
                             </a>
                        </div>

                        <!--Cuentas/Correo-->
                        <div class="col-lg-4">
                            <a href="#"><div class="col-lg-12 text-center btn btn-raised ink-reaction" style="border:2px #0a9ea8 solid; height:400px; width: 100%; background-color: rgb(10, 158, 168);color:white;">
                                    <div id="bas2">
                                        <!-- BEGIN CONTENT-->
                                        <div id="content">
                                            <!-- BEGIN 404 MESSAGE -->
                                            <section>
                                                <div class="section-body contain-lg">
                                                    <div class="row">
                                                        <div class="col-lg-12 text-center">
                                                            <h1 style="margin-top: 50px;">
                                                                <span class="text-xl text-light ">
                                                                    C<span style="text-transform: lowercase">uentas</span> /<br/> C<span style="text-transform: lowercase">orreos</span>
                                                                </span>
                                                            </h1>
                                                        </div><!--end .col -->
                                                    </div><!--end .row -->
                                                </div><!--end .section-body -->
                                            </section>
                                            <!-- END 404 MESSAGE -->
                                        </div><!--end #content-->
                                        <!-- END CONTENT -->
                                    </div><!--end #base-->
                            </div></a>
                        </div>

                        
                    </div><!--end .col -->
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

<script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular-route.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular-resource.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular-datatables.min.js"></script>
<script src="<?=$this->contextPath?>/web/assets/css/theme-default/libs/ui-bootstrap/ui-bootstrap-tpls-0.13.0.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/page/app.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/page/pageProvider.js"></script>

<!-- END JAVASCRIPT -->

</body>
</html>
