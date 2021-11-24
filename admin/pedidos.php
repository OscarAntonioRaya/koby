<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/sesion.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/funciones.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//AQUI COMIENZAN LAS REGLAS ESPECIALES POR USUARIOS
//ASIGNA EL NIVEL DE ACCESO
$lvl = 2;
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/roles.php");
//AQUI FINALIZAN LAS REGLAS ESPECIALES POR USUARIOS
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Pedidos - Administrador <?php echo NAME_PROJECT; ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
	<meta content="" name="author">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- App favicon -->
	<link rel="shortcut icon" href="/images/favicon.png">
	<!-- App css -->
	<link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/admin/assets/css/jquery-ui.min.css" rel="stylesheet">
	<link href="/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css">
	<link href="/admin/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">
	<link href="/admin/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
	<link href="/admin/assets/css/app.min.css" rel="stylesheet" type="text/css">
</head>

<body class="dark-sidenav">
	<!-- Left Sidenav -->
	<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/admin/modulos/menu-principal.php"); ?>
	<div class="page-wrapper">
		<!-- Top Bar Start -->
		<div class="topbar">
			<!-- Navbar -->
			<nav class="navbar-custom">
				<ul class="list-unstyled topbar-nav float-right mb-0">
					<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/admin/modulos/nav-user.php"); ?>
				</ul>
				<!--end topbar-nav-->
				<ul class="list-unstyled topbar-nav mb-0">
					<li>
						<button class="nav-link button-menu-mobile"><i data-feather="menu" class="align-self-center topbar-icon"></i></button>
					</li>
				</ul>
			</nav><!-- end navbar-->
		</div><!-- Top Bar End -->
		<!-- Page Content-->
		<div class="page-content">
			<div class="container-fluid">
				<!-- Page-Title -->
				<div class="row">
					<div class="col">
						<h4 class="page-title">¡Bienvenido! <?php echo $UserData['nombre']; ?></h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0);">Administrador</a></li>
							<li class="breadcrumb-item active">Resumen</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Usuarios</h4>
							</div>
							<!--end card-header-->
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped mb-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Nombre</th>
												<th>Correo</th>
												<th>Rol</th>
												<th>Último acceso</th>
												<th class="text-right">Acción</th>
											</tr>
										</thead>
										<tbody>
											<?php $userData = $db->getAllRecords('usuarios', '*', 'AND rol>"1" ORDER BY id ASC');
											if (count($userData) > 0) {
												$y	=	'';
												foreach ($userData as $usuario) {
													$rolSel = $db->getAllRecords('roles', '*', ' AND id="' . $usuario['rol'] . '" LIMIT 1');
													$rolSel = $rolSel[0];
													$date1 = new DateTime($usuario['fl']);
													$date2 = new DateTime("now");
													$diff = $date1->diff($date2);
													$y++;
											?>
													<tr>
														<td><?php echo $y ?></td>
														<td><?php echo $usuario['nombre']; ?> <?php echo $usuario['apeidos']; ?></td>
														<td><?php echo $usuario['email']; ?></td>
														<td><?php echo $rolSel['nombre']; ?></td>
														<td><?php echo get_format($diff); ?></td>
														<td class="text-right">
															<a href="/admin/editar/usuario?editId=<?php echo $usuario['id']; ?>"><i class="las la-pen text-info font-18"></i></a>
															<?php
															if ($UserData['rol'] < 2) {
															?>
																<a href="/admin/vercomo?id=<?php echo $usuario['id']; ?>"><i class="fa fa-eye text-info font-18"></i></a>
															<?php
															}
															?>
														</td>
													</tr>
											<?php
												}
											}
											?>
										</tbody>
									</table>
									<!--end /table-->
								</div>
								<!--end /tableresponsive-->
							</div>
							<!--end card-body-->
						</div>
						<!--end card-->
					</div><!-- end col -->
				</div>
			</div><!-- container -->
			<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/admin/modulos/footer.php"); ?>
			<?php
			if (isset($_COOKIE['msg'])) {
				require_once($_SERVER["DOCUMENT_ROOT"] . "/include/msg.php");
			} ?>
			<!--end footer-->
		</div><!-- end page content -->
	</div>
	<!-- end page-wrapper -->
	<!-- jQuery  -->
	<script src="/admin/assets/js/jquery.min.js"></script>
	<script src="/admin/assets/js/bootstrap.bundle.min.js"></script>
	<script src="/admin/assets/js/metismenu.min.js"></script>
	<script src="/admin/assets/js/waves.js"></script>
	<script src="/admin/assets/js/feather.min.js"></script>
	<script src="/admin/assets/js/simplebar.min.js"></script>
	<script src="/admin/assets/js/jquery-ui.min.js"></script>
	<script src="/admin/plugins/apex-charts/apexcharts.min.js"></script>
	<script src="/admin/assets/pages/jquery.analytics_dashboard.init.js"></script>
	<!-- App js -->
	<script src="/admin/assets/js/app.js"></script>
	<script>
		var options = {
			chart: {
				height: 350,
				type: "area",
				toolbar: {
					show: !1
				}
			},
			colors: ['#008FFB', '#f5325c', '#03d87f'],
			dataLabels: {
				enabled: !1
			},
			markers: {
				discrete: [{
					seriesIndex: 0,
					dataPointIndex: 7,
					fillColor: "#000",
					strokeColor: "#000",
					size: 5
				}, {
					seriesIndex: 2,
					dataPointIndex: 11,
					fillColor: "#000",
					strokeColor: "#000",
					size: 4
				}]
			},
			stroke: {
				show: !0,
				curve: "smooth",
				width: 3,
				lineCap: "square"
			},
			series: [{
				name: "Pacientes",
				data: [<?php echo $Tmes1; ?>, <?php echo $Tmes2; ?>, <?php echo $Tmes3; ?>, <?php echo $Tmes4; ?>, <?php echo $Tmes5; ?>, <?php echo $Tmes6; ?>, <?php echo $Tmes7; ?>, <?php echo $Tmes8; ?>, <?php echo $Tmes9; ?>, <?php echo $Tmes10; ?>, <?php echo $Tmes11; ?>, <?php echo $Tmes12; ?>]
			}, {
				name: "Positivos",
				data: [<?php echo $posTmes1; ?>, <?php echo $posTmes2; ?>, <?php echo $posTmes3; ?>, <?php echo $posTmes4; ?>, <?php echo $posTmes5; ?>, <?php echo $posTmes6; ?>, <?php echo $posTmes7; ?>, <?php echo $posTmes8; ?>, <?php echo $posTmes9; ?>, <?php echo $posTmes10; ?>, <?php echo $posTmes11; ?>, <?php echo $posTmes12; ?>]
			}, {
				name: "Negativos",
				data: [<?php echo $negTmes1; ?>, <?php echo $negTmes2; ?>, <?php echo $negTmes3; ?>, <?php echo $negTmes4; ?>, <?php echo $negTmes5; ?>, <?php echo $negTmes6; ?>, <?php echo $negTmes7; ?>, <?php echo $negTmes8; ?>, <?php echo $negTmes9; ?>, <?php echo $negTmes10; ?>, <?php echo $negTmes11; ?>, <?php echo $negTmes12; ?>]
			}],
			labels: ["<?php echo $mes1; ?>", "<?php echo $mes2; ?>", "<?php echo $mes3; ?>", "<?php echo $mes4; ?>", "<?php echo $mes5; ?>", "<?php echo $mes6; ?>", "<?php echo $mes7; ?>", "<?php echo $mes8; ?>", "<?php echo $mes9; ?>", "<?php echo $mes10; ?>", "<?php echo $mes11; ?>", "<?php echo $mes12; ?>"],
			yaxis: {
				labels: {
					offsetX: -12,
					offsetY: 0
				}
			},
			grid: {
				borderColor: "#e0e6ed",
				strokeDashArray: 5,
				xaxis: {
					lines: {
						show: !0
					}
				},
				yaxis: {
					lines: {
						show: !1
					}
				}
			},
			legend: {
				show: !1
			},
			tooltip: {
				marker: {
					show: !0
				},
				x: {
					show: !1
				}
			},
			fill: {
				type: "gradient",
				gradient: {
					type: "vertical",
					shadeIntensity: 1,
					inverseColors: !1,
					opacityFrom: .28,
					opacityTo: .05,
					stops: [45, 100]
				}
			},
			responsive: [{
				breakpoint: 575
			}]
		};
		(chart = new ApexCharts(document.querySelector("#all_pac_status"), options)).render();
	</script>
	<script>
		var options = {
			series: [{
				name: 'Positivos',
				data: [<?php
								$sucData = $db->getAllRecords('preCovidSuc', '*', ' ORDER BY tipo ASC');
								$y = "";
								if (count($sucData) > 0) {
									$y++;
									foreach ($sucData as $sucursal) {
										$sumPos	= $db->getQueryCount('preCovidPac', '*', ' AND sucursal="' . $sucursal['id'] . '" AND resultado="2"');
										$sumPos  = ($sumPos[0]['total']);
								?><?php echo $sumPos; ?><?php if ($sucData != $y) {
																					echo ",";
																				}
																			}
																		}
																				?>]
			}, {
				name: 'Negativos',
				data: [<?php
								$sucData = $db->getAllRecords('preCovidSuc', '*', ' ORDER BY tipo ASC');
								$y = "";
								if (count($sucData) > 0) {
									$y++;
									foreach ($sucData as $sucursal) {
										$sumPos	= $db->getQueryCount('preCovidPac', '*', ' AND sucursal="' . $sucursal['id'] . '" AND resultado="1"');
										$sumPos  = ($sumPos[0]['total']);
								?><?php echo $sumPos; ?><?php if ($sucData != $y) {
																					echo ",";
																				}
																			}
																		}
																				?>]
			}, {
				name: 'No asignados',
				data: [<?php
								$sucData = $db->getAllRecords('preCovidSuc', '*', ' ORDER BY tipo ASC');
								$y = "";
								if (count($sucData) > 0) {
									$y++;
									foreach ($sucData as $sucursal) {
										$sumPos	= $db->getQueryCount('preCovidPac', '*', ' AND sucursal="' . $sucursal['id'] . '" AND resultado="0"');
										$sumPos  = ($sumPos[0]['total']);
								?><?php echo $sumPos; ?><?php if ($sucData != $y) {
																					echo ",";
																				}
																			}
																		}
																				?>]
			}],
			chart: {
				type: 'bar',
				height: 420,
				stacked: true,
				stackType: '100%',
			},
			colors: ['#f5325c', '#03d87f', '#9ba7ca'],
			plotOptions: {
				bar: {
					horizontal: true,
				},
			},
			stroke: {
				width: 1,
				colors: ['#fff']
			},
			xaxis: {
				categories: [<?php
											$sucData = $db->getAllRecords('preCovidSuc', '*', ' ORDER BY tipo ASC');
											$y = "";
											if (count($sucData) > 0) {
												$y++;
												foreach ($sucData as $sucursal) {
											?> "<?php echo $sucursal['nombre']; ?>"
					<?php if ($sucData != $y) {
														echo ",";
													}
												}
											}
					?>
				],
				labels: {
					formatter: function(val) {
						return val + " Pacientes"
					}
				}
			},
			yaxis: {
				title: {
					text: undefined
				},
			},
			tooltip: {
				y: {
					formatter: function(val) {
						return val + " Pacientes"
					}
				}
			},
			fill: {
				opacity: 1
			},
			legend: {
				position: 'top',
				horizontalAlign: 'left',
				offsetX: 40
			}
		};
		var chart = new ApexCharts(document.querySelector("#ubic_apex_bar"), options);
		chart.render();
	</script>
</body>

</html>