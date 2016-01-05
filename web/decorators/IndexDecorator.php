<!DOCTYPE html>
<html lang="en" ng-app="appRecibos">
    <head>
        <title><?=$this->title?></title>

        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">
        <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
        <!-- END META -->

        <!-- BEGIN STYLESHEETS -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/bootstrap.css?1422792965" />
        <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/materialadmin.css?1425466319" />
        <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/font-awesome.min.css?1422529194" />
        <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
        <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/libs/rickshaw/rickshaw.css?1422792967" />
        <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/libs/morris/morris.core.css?1420463396" />
        <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989" />
        <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990" />
        <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990" />
        <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/libs/wizard/wizard.css?1425466601" />

        <link type="text/css" rel="stylesheet" href="<?=$this->contextPath?>/web/assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858" />



        <!-- END STYLESHEETS -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="<?=$this->contextPath?>/web/assets/js/libs/utils/html5shiv.js?1403934957"></script>
        <script type="text/javascript" src="<?=$this->contextPath?>/web/assets/js/libs/utils/respond.min.js?1403934956"></script>
        <![endif]-->
    </head>
    <body class="menubar-hoverable header-fixed ">
    <!-- BEGIN HEADER-->
        <header id="header" >
            <div class="headerbar">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="headerbar-left">
                    <ul class="header-nav header-nav-options">
                        <li class="header-nav-brand" >
                            <div class="brand-holder">
                                <a href="<?=$this->contextPath?>/">
        							<span class="text-lg text-bold text-primary">SIRI 2.0</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                </div>


                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="headerbar-right">          
                    <ul class="header-nav header-nav-profile">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                                <img src="<?=$this->contextPath?>/web/assets/img/avatar1.jpg?1403934956" alt="" />
        								<!-- Nombre y Perfil de usuario -->
                                                <?php
                                                session_start();
                                                    echo '<span class="profile-info">';
                                                        echo $_SESSION["imss"]["nombre"];
                                                        echo '<small>'.$_SESSION["imss"]["niv_usuario"].'</small>';
                                                        echo date("d") . " del " . date("M") . " de " . date("Y")."<br>";
                                                    echo '</span> <br/>';

                                                session_write_close();
                                                ?>
                            </a>
                            <ul class="dropdown-menu animation-dock">
                                <li class="dropdown-header">Config</li>
                                
                                <li class="divider"></li>
                                
                                <li><a href="<?=$this->contextPath?>/salir"><i class="fa fa-fw fa-power-off text-danger"></i> Salir</a></li>
                            </ul><!--end .dropdown-menu -->
                        </li><!--end .dropdown -->
                    </ul><!--end .header-nav-profile -->
                </div><!--end #header-navbar-collapse -->

            </div>
        </header>
    <!-- END HEADER-->
    
    <!-- BEGIN BASE-->
        <div id="base">
            <!-- BEGIN CONTENT-->
            <div id="content" style="padding-top: 42px;" >
                <section class="style-default-bright" ng-view> </section>                
        	</div>
        	<!-- END CONTENT -->

       
        	<!-- BEGIN MENUBAR-->
        	<div id="menubar" class="menubar-inverse ">
        		<div class="menubar-fixed-panel">
        			<div>
        				<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
        					<i class="fa fa-bars"></i>
        				</a>
        			</div>
        			<div class="expanded">
        				<a href="<?=$this->contextPath?>/">
        					<span class="text-lg text-bold text-primary ">ADMIN&nbsp;CONTRARECIBOS</span>
        				</a>
        			</div>
        		</div>
        		<div class="menubar-scroll-panel">
        			<!-- BEGIN MAIN MENU -->
                    <menu-usuario menu="menuUsuario" type="<?=$_SESSION['imss']['tipo']?>" path="<?=$this->contextPath?>"></menu-usuario>
                        <!--<?php// include_once($this->_absPath."/template/menu/MenuSide".$this->opcionMenu.".php"); ?>
                        <!--end .main-menu -->
        			    <!-- END MAIN MENU -->

        			<div class="menubar-foot-panel">
        				<small class="no-linebreak hidden-folded">
        					<span class="opacity-75">IMSS &copy; <?=date("Y")?></span> <strong>SIRI 2.0</strong>
        				</small>
        			</div>
        		</div><!--end .menubar-scroll-panel-->
        	</div><!--end #menubar-->
        	<!-- END MENUBAR -->
        </div><!--end #base-->
    <!-- END BASE -->

    <!-- BEGIN JAVASCRIPT -->

        <script src="<?=$this->contextPath?>/web/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/libs/jquery-ui/jquery-ui.min.js"></script>

        <script src="<?=$this->contextPath?>/web/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/libs/bootstrap/bootstrap.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/libs/spin.js/spin.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/libs/autosize/jquery.autosize.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/libs/jquery-validation/dist/localization/messages_es.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/core/source/App.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/core/source/AppNavigation.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/core/source/AppCard.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/core/source/AppForm.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/core/source/AppNavSearch.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/core/source/AppVendor.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/core/demo/Demo.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular.min.js"></script>        
        <script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular-route.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular-resource.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular-datatables.min.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/core/angular/angular-sanitize.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/css/theme-default/libs/ui-bootstrap/ui-bootstrap-tpls-0.13.0.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/app.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/unidades/unidades.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/menu/menu.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/asignar/app.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/asignar/asignarProvider.js"></script>

 

        <!-- BEGIN JAVASCRIPT DEL ADMINISTRADOR -->
        <script src="<?=$this->contextPath?>/web/assets/js/app/admin/app.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/admin/adminProvider.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/admin/user/app.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/admin/user/userProvider.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/admin/equipo/app.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/admin/equipo/equipoProvider.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/autoComplete.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/admin/avisos/app.js"></script>
        <!--<script src="<?=$this->contextPath?>/web/assets/js/app/admin/equipo/autoComplete.js"></script> -->
        <!-- END JAVASCRIPT DEL ADMINISTRADOR -->

        <!-- BEGIN JAVASCRIPT DEL Control -->
        <script src="<?=$this->contextPath?>/web/assets/js/app/control/entrega/app.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/control/entrega/entregaProvider.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/control/edicion/app.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/control/edicion/edicionProvider.js"></script>
        <!--//activos-->
        <script src="<?=$this->contextPath?>/web/assets/js/app/control/activos/app.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/control/activos/activosProvider.js"></script>
        <!-- END JAVASCRIPT DEL Control -->

        <!-- BEGIN JAVASCRIPT DEL Asignacion -->
        <script src="<?=$this->contextPath?>/web/assets/js/app/asignacion/asignacion/app.js"></script>

        <script src="<?=$this->contextPath?>/web/assets/js/app/asignacion/asignacion/asignacionProvider.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/asignacion/nueServ/app.js"></script>
        <script src="<?=$this->contextPath?>/web/assets/js/app/home/app.js"></script>
        <!-- END JAVASCRIPT DEL Asignacion -->

         <!-- BEGIN CKEditor -->
       <script src="<?=$this->contextPath?>/web/assets/js/libs/ckeditor/ckeditor.js"></script>
        <!-- END CKEditor -->


    <!-- END JAVASCRIPT -->

	</body> </html>


<!--

-->