<!DOCTYPE html>
<html lang="en" ng-app="appRecibos">
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
									<span class="text-lg text-bold text-primary">SIRI</span>
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
            <ul class="header-nav header-nav-options">
                <li class="dropdown hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                        <i class="fa fa-bell"></i><sup class="badge style-danger">4</sup>
                    </a>
                    <ul class="dropdown-menu animation-expand">
                        <li class="dropdown-header">Contrarecibos recientes</li>
                        <li>
                            <a class="alert alert-callout alert-warning" href="javascript:void(0);">
                                <strong>Alex Anistor</strong><br/>
                                <small>Testing functionality...</small>
                            </a>
                        </li>
                        <li>
                            <a class="alert alert-callout alert-info" href="javascript:void(0);">
                                <strong>Alicia Adell</strong><br/>
                                <small>Reviewing last changes...</small>
                            </a>
                        </li>
                        <li class="dropdown-header">Options</li>
                        <li><a href="<?=$this->contextPath?>/web/html/pages/login.html">View all messages <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                        <li><a href="<?=$this->contextPath?>/web/html/pages/login.html">Mark as read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
                <li class="dropdown hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                        <i class="fa fa-area-chart"></i>
                    </a>
                    <ul class="dropdown-menu animation-expand">
                        <li class="dropdown-header">Server load</li>
                        <li class="dropdown-progress">
                            <a href="javascript:void(0);">
                                <div class="dropdown-label">
                                    <span class="text-light">Server load <strong>Today</strong></span>
                                    <strong class="pull-right">93%</strong>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-danger" style="width: 93%"></div></div>
                            </a>
                        </li><!--end .dropdown-progress -->
                        <li class="dropdown-progress">
                            <a href="javascript:void(0);">
                                <div class="dropdown-label">
                                    <span class="text-light">Server load <strong>Yesterday</strong></span>
                                    <strong class="pull-right">30%</strong>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-success" style="width: 30%"></div></div>
                            </a>
                        </li><!--end .dropdown-progress -->
                        <li class="dropdown-progress">
                            <a href="javascript:void(0);">
                                <div class="dropdown-label">
                                    <span class="text-light">Server load <strong>Lastweek</strong></span>
                                    <strong class="pull-right">74%</strong>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-warning" style="width: 74%"></div></div>
                            </a>
                        </li><!--end .dropdown-progress -->
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-options -->
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                        <img src="<?=$this->contextPath?>/web/assets/img/avatar1.jpg?1403934956" alt="" />
								<span class="profile-info">
									Daniel Johnson
									<small>Administrator</small>
								</span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li class="dropdown-header">Config</li>
                        <li><a href="<?=$this->contextPath?>/web/html/pages/profile.html">Mi perfil</a></li>
                        <li class="divider"></li>
                        <li><a href="<?=$this->contextPath?>/web/html/pages/locked.html"><i class="fa fa-fw fa-lock"></i> Bloquear</a></li>
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
    <div id="content" >
        <section class="style-default-bright" ng-view>
            <div class="section-body" >
                <div class="row">

							<!-- BEGIN ALERT - REVENUE -->
							<div class="col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body no-padding">
										<div class="alert alert-callout alert-info no-margin">
											<strong class="pull-right text-success text-lg">0,38% <i class="md md-trending-up"></i></strong>
											<strong class="text-xl">$ 32,829</strong><br/>
											<span class="opacity-50">Revenue</span>
											<div class="stick-bottom-left-right">
												<div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
											</div>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ALERT - REVENUE -->

                    <!-- BEGIN ALERT - VISITS -->
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-warning no-margin">
                                    <strong class="pull-right text-warning text-lg">0,01% <i class="md md-swap-vert"></i></strong>
                                    <strong class="text-xl">432,901</strong><br/>
                                    <span class="opacity-50">Visits</span>
                                    <div class="stick-bottom-right">
                                        <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END ALERT - VISITS -->

                    <!-- BEGIN ALERT - BOUNCE RATES -->
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-danger no-margin">
                                    <strong class="pull-right text-danger text-lg">0,18% <i class="md md-trending-down"></i></strong>
                                    <strong class="text-xl">42.90%</strong><br/>
                                    <span class="opacity-50">Bounce rate</span>
                                    <div class="stick-bottom-left-right">
                                        <div class="progress progress-hairline no-margin">
                                            <div class="progress-bar progress-bar-danger" style="width:43%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END ALERT - BOUNCE RATES -->

                    <!-- BEGIN ALERT - TIME ON SITE -->
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body no-padding">
                                <div class="alert alert-callout alert-success no-margin">
                                    <h1 class="pull-right text-success"><i class="md md-timer"></i></h1>
                                    <strong class="text-xl">54 sec.</strong><br/>
                                    <span class="opacity-50">Avg. time on site</span>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END ALERT - TIME ON SITE -->

                </div><!--end .row -->
                <div class="row">

                    <!-- BEGIN SITE ACTIVITY -->
                    <div class="col-md-9">
                        <div class="card ">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-head">
                                        <header>Site activity</header>
                                    </div><!--end .card-head -->
                                    <div class="card-body height-8">
                                        <div id="flot-visitors-legend" class="flot-legend-horizontal stick-top-right no-y-padding"></div>
                                        <div id="flot-visitors" class="flot height-7" data-title="Activity entry" data-color="#7dd8d2,#0aa89e"></div>
                                    </div><!--end .card-body -->
                                </div><!--end .col -->
                                <div class="col-md-4">
                                    <div class="card-head">
                                        <header>Today's stats</header>
                                    </div>
                                    <div class="card-body height-8">
                                        <strong>214</strong> members
                                        <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                        <div class="progress progress-hairline">
                                            <div class="progress-bar progress-bar-primary-dark" style="width:43%"></div>
                                        </div>
                                        756 pageviews
                                        <span class="pull-right text-success text-sm">0,68% <i class="md md-trending-up"></i></span>
                                        <div class="progress progress-hairline">
                                            <div class="progress-bar progress-bar-primary-dark" style="width:11%"></div>
                                        </div>
                                        291 bounce rates
                                        <span class="pull-right text-danger text-sm">21,08% <i class="md md-trending-down"></i></span>
                                        <div class="progress progress-hairline">
                                            <div class="progress-bar progress-bar-danger" style="width:93%"></div>
                                        </div>
                                        32,301 visits
                                        <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                        <div class="progress progress-hairline">
                                            <div class="progress-bar progress-bar-primary-dark" style="width:63%"></div>
                                        </div>
                                        132 pages
                                        <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                        <div class="progress progress-hairline">
                                            <div class="progress-bar progress-bar-primary-dark" style="width:47%"></div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .col -->
                            </div><!--end .row -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END SITE ACTIVITY -->

                    <!-- BEGIN SERVER STATUS -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-head">
                                <header class="text-primary">Server status</header>
                            </div><!--end .card-head -->
                            <div class="card-body height-4">
                                <div class="pull-right text-center">
                                    <em class="text-primary">Temperature</em>
                                    <br/>
                                    <div id="serverStatusKnob" class="knob knob-shadow knob-primary knob-body-track size-2">
                                        <input type="text" class="dial" data-min="0" data-max="100" data-thickness=".09" value="50" data-readOnly=true>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                            <div class="card-body height-4 no-padding">
                                <div class="stick-bottom-left-right">
                                    <div id="rickshawGraph" class="height-4" data-color1="#0aa89e" data-color2="rgba(79, 89, 89, 0.2)"></div>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END SERVER STATUS -->

						</div><!--end .row -->
						<div class="row">

							<!-- BEGIN TODOS -->
							<div class="col-md-3">
								<div class="card ">
									<div class="card-head">
										<header>Todo's</header>
										<div class="tools">
											<a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
										</div>
									</div><!--end .card-head -->
									<div class="card-body no-padding height-9 scroll">
										<ul class="list" data-sortable="true">
											<li class="tile">
												<div class="checkbox checkbox-styled tile-text">
													<label>
														<input type="checkbox" checked>
														<span>Call clients for follow-up</span>
													</label>
												</div>
												<a class="btn btn-flat ink-reaction btn-default">
													<i class="md md-delete"></i>
												</a>
											</li>
											<li class="tile">
												<div class="checkbox checkbox-styled tile-text">
													<label>
														<input type="checkbox">
														<span>
															Schedule meeting
															<small>opportunity for new customers</small>
														</span>
													</label>
												</div>
												<a class="btn btn-flat ink-reaction btn-default">
													<i class="md md-delete"></i>
												</a>
											</li>
											<li class="tile">
												<div class="checkbox checkbox-styled tile-text">
													<label>
														<input type="checkbox">
														<span>
															Upload files to server
															<small>The files must be shared with all members of the board</small>
														</span>
													</label>
												</div>
												<a class="btn btn-flat ink-reaction btn-default">
													<i class="md md-delete"></i>
												</a>
											</li>
											<li class="tile">
												<div class="checkbox checkbox-styled tile-text">
													<label>
														<input type="checkbox">
														<span>Forward important tasks</span>
													</label>
												</div>
												<a class="btn btn-flat ink-reaction btn-default">
													<i class="md md-delete"></i>
												</a>
											</li>
											<li class="tile">
												<div class="checkbox checkbox-styled tile-text">
													<label>
														<input type="checkbox">
														<span>Forward important tasks</span>
													</label>
												</div>
												<a class="btn btn-flat ink-reaction btn-default">
													<i class="md md-delete"></i>
												</a>
											</li>
											<li class="tile">
												<div class="checkbox checkbox-styled tile-text">
													<label>
														<input type="checkbox">
														<span>Forward important tasks</span>
													</label>
												</div>
												<a class="btn btn-flat ink-reaction btn-default">
													<i class="md md-delete"></i>
												</a>
											</li>
										</ul>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END TODOS -->

							<!-- BEGIN REGISTRATION HISTORY -->
							<div class="col-md-6">
								<div class="card">
									<div class="card-head">
										<header>Registration history</header>
										<div class="tools">
											<a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>
											<a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
											<a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
										</div>
									</div><!--end .card-head -->
									<div class="card-body no-padding height-9">
										<div class="row">
											<div class="col-sm-6 hidden-xs">
												<div class="force-padding text-sm text-default-light">
													<p>
														<i class="md md-mode-comment text-primary-light"></i>
														The registrations are measured from the time that the redesign was fully implemented and after the first e-mailing.
													</p>
												</div>
											</div><!--end .col -->
											<div class="col-sm-6">
												<div class="force-padding pull-right text-default-light">
													<h2 class="no-margin text-primary-dark"><span class="text-xxl">66.05%</span></h2>
													<i class="fa fa-caret-up text-success fa-fw"></i> more registrations
												</div>
											</div><!--end .col -->
										</div><!--end .row -->
										<div class="stick-bottom-left-right force-padding">
											<div id="flot-registrations" class="flot height-5" data-title="Registration history" data-color="#0aa89e"></div>
										</div>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END REGISTRATION HISTORY -->

							<!-- BEGIN NEW REGISTRATIONS -->
							<div class="col-md-3">
								<div class="card">
									<div class="card-head">
										<header>New registrations</header>
										<div class="tools hidden-md">
											<a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
										</div>
									</div><!--end .card-head -->
									<div class="card-body no-padding height-9 scroll">
										<ul class="list divider-full-bleed">
											<li class="tile">
												<div class="tile-content">
													<div class="tile-icon">
														<img src="<?=$this->contextPath?>/web/assets/img/avatar9.jpg?1404026744" alt="" />
													</div>
													<div class="tile-text">Ann Laurens</div>
												</div>
												<a class="btn btn-flat ink-reaction">
													<i class="md md-block text-default-light"></i>
												</a>
											</li>
											<li class="tile">
												<div class="tile-content">
													<div class="tile-icon">
														<img src="<?=$this->contextPath?>/web/assets/img/avatar4.jpg?1404026791" alt="" />
													</div>
													<div class="tile-text">Alex Nelson</div>
												</div>
												<a class="btn btn-flat ink-reaction">
													<i class="md md-block text-default-light"></i>
												</a>
											</li>
											<li class="tile">
												<div class="tile-content">
													<div class="tile-icon">
														<img src="<?=$this->contextPath?>/web/assets/img/avatar11.jpg?1404026774" alt="" />
													</div>
													<div class="tile-text">Mary Peterson</div>
												</div>
												<a class="btn btn-flat ink-reaction">
													<i class="md md-block text-default-light"></i>
												</a>
											</li>
											<li class="tile">
												<div class="tile-content">
													<div class="tile-icon">
														<img src="<?=$this->contextPath?>/web/assets/img/avatar7.jpg?1404026721" alt="" />
													</div>
													<div class="tile-text">Philip Ericsson</div>
												</div>
												<a class="btn btn-flat ink-reaction">
													<i class="md md-block text-default-light"></i>
												</a>
											</li>
											<li class="tile">
												<div class="tile-content">
													<div class="tile-icon">
														<img src="<?=$this->contextPath?>/web/assets/img/avatar8.jpg?1404026729" alt="" />
													</div>
													<div class="tile-text">Jim Peters</div>
												</div>
												<a class="btn btn-flat ink-reaction">
													<i class="md md-block text-default-light"></i>
												</a>
											</li>
											<li class="tile">
												<div class="tile-content">
													<div class="tile-icon">
														<img src="<?=$this->contextPath?>/web/assets/img/avatar2.jpg?1404026449" alt="" />
													</div>
													<div class="tile-text">Jessica Cruise</div>
												</div>
												<a class="btn btn-flat ink-reaction">
													<i class="md md-block text-default-light"></i>
												</a>
											</li>
										</ul>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END NEW REGISTRATIONS -->

						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
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
<!--                    <?php// include_once($this->_absPath."/template/menu/MenuSide".$this->opcionMenu.".php"); ?>
                    <!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong>
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
<script src="<?=$this->contextPath?>/web/assets/css/theme-default/libs/ui-bootstrap/ui-bootstrap-tpls-0.13.0.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/app.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/unidades/unidades.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/menu/menu.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/asignar/app.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/asignar/asignarProvider.js"></script>

<!-- BRAYAN -->

<!-- BRAYAN -->



<!-- END JAVASCRIPT -->

<!-- BEGIN JAVASCRIPT DEL ADMINISTRADOR -->
<script src="<?=$this->contextPath?>/web/assets/js/app/admin/app.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/admin/adminProvider.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/admin/user/app.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/admin/user/userProvider.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/admin/equipo/app.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/admin/equipo/equipoProvider.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/autoComplete.js"></script>
<!--<script src="<?=$this->contextPath?>/web/assets/js/app/admin/equipo/autoComplete.js"></script> -->
<!-- END JAVASCRIPT DEL ADMINISTRADOR -->

<!-- BEGIN JAVASCRIPT DEL Control -->
<script src="<?=$this->contextPath?>/web/assets/js/app/control/entrega/app.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/control/entrega/entregaProvider.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/control/edicion/app.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/control/edicion/edicionProvider.js"></script>
<!-- END JAVASCRIPT DEL Control -->

<!-- BEGIN JAVASCRIPT DEL Asignacion -->
<script src="<?=$this->contextPath?>/web/assets/js/app/asignacion/asignacion/app.js"></script>
<script src="<?=$this->contextPath?>/web/assets/js/app/asignacion/asignacion/asignacionProvider.js"></script>
<!-- END JAVASCRIPT DEL Asignacion -->

<script type="text/javascript">

    $(function(){

        $("#fecha").datepicker({
            changeMonth:true,
            changeYear:true
        });


    })

</script>


</body>
</html>





        <!-- END JAVASCRIPT -->

	</body>
</html>
