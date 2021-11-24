<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/sesion.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/funciones.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//ASIGNA EL NIVEL DE ACCESO
$lvl = 2;
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/roles.php");
//OBTENER RANGO POR ID
$rol = $db->getAllRecords('roles', '*', ' AND id="' . ($UserData['rol']) . '"LIMIT 1 ');
$rol = $rol[0];
$rol = ($rol['nombre']);
$fr = date("Y-m-d H:i:s");
$mesr = strftime("%m");
$anor = strftime("%Y");
if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
	extract($_REQUEST);
	if (($nombre == "") or ($apeidos == "") or ($email == "") or ($pass == "")) {
		setcookie("msg", "all", time() + 2, "/");
		header('location:/admin/usuarios');
		exit;
	} else {
		//VERIFICAMOS QUE NO EXISTA EL CORREO
		$servEx =	$db->getAllRecords('usuarios', '*', ' AND email="' . $email . '" LIMIT 1 ');
		if (!($servEx)) {
			$espCount	=	$db->getQueryCount('usuarios', 'id');
			if ($espCount[0]['total'] < 5000) {
				$data	=	array(
					'nombre' => $nombre,
					'apeidos' => $apeidos,
					'email' => $email,
					'pass' => $pass,
					'rol' => $rol,
					'fr' => $fr,
				);
				$insert	=	$db->insert('usuarios', $data);
				if ($insert) {
					setcookie("msg", "userok", time() + 2, "/");
					header('location:/admin/usuarios'); //exito
					exit;
				} else {
					setcookie("msg", "ups", time() + 2, "/");
					header('location:/admin/usuarios'); //sin cambios
					exit;
				}
			} else {
				setcookie("msg", "lim", time() + 2, "/");
				header('location:/admin/usuarios'); //limite
				exit;
			}
		} else {
			setcookie("msg", "mailex", time() + 2, "/");
			header('location:/admin/usuarios');
			exit;
		}
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Usuarios - Administrador <?php echo NAME_PROJECT; ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
	<meta content="" name="author">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- App favicon -->
	<link rel="shortcut icon" href="/images/favicon.png">
	<!-- App css -->
	<link rel="shortcut icon" href="admin/assets/images/favicon.ico"><!-- App css -->
	<link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/admin/assets/css/jquery-ui.min.css" rel="stylesheet">
	<link href="/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css">
	<link href="/admin/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">
	<link href="/admin/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
	<link href="/admin/assets/css/app.min.css" rel="stylesheet" type="text/css">
	<link href="/admin/plugins/dropify/css/dropify.min.css" rel="stylesheet"><!-- App css -->
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
					<div class="col-sm-12">
						<div class="page-title-box">
							<div class="row">
								<div class="col">
									<h4 class="page-title">Usuarios</h4>
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="javascript:void(0);">Administrador</a></li>
										<li class="breadcrumb-item active">Usuarios</li>
									</ol>
								</div>
								<!--end col-->
							</div>
							<!--end row-->
						</div>
						<!--end page-title-box-->
					</div>
					<!--end col-->
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Dar de alta nuevo usuario/administrador</h4>
							</div>
							<!--end card-header-->
							<div class="card-body">
								<div class="accordion" id="accordionExample">
									<div class="card border mb-1 shadow-none">
										<div class="card-header custom-accordion rounded-0" id="headingOne"><a href="#" class="text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Descripción de roles de usuarios.</a></div>
										<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
											<div class="card-body">
												<p class="mb-0 text-muted"><b>Super Usuario </b> Rango 1</p>
												<p class="mb-0 text-muted">Acceso total del sistema.</p>
												<br>
												<p class="mb-0 text-muted"><b>Administrador</b> Rango 2</p>
												<p class="mb-0 text-muted">Acceso prioritario de sistema</p>
												<br>
												<p class="mb-0 text-muted"><b>Manager</b> Rango 3</p>
												<p class="mb-0 text-muted">Acceso a ver, editar y eliminar informacion</p>
												<br>
												<p class="mb-0 text-muted"><b>Editor</b> Rango 4</p>
												<p class="mb-0 text-muted">Acceso a ver y editar información.</p>
												<br>
												<p class="mb-0 text-muted"><b>Viewer</b> Rango 5</p>
												<p class="mb-0 text-muted">Acceso a ver información.</p>
												<br>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<form class="needs-validation" enctype="multipart/form-data" novalidate="" method="post">
									<div class="form-row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-6 mb-6"><label for="validationCustom01">Nombre</label>
													<input name="nombre" type="text" class="form-control" id="validationCustom01" placeholder="" required>
												</div>
												<div class="col-md-6 mb-6"><label for="validationCustom01">Apellidos</label>
													<input name="apeidos" type="text" class="form-control" id="validationCustom01" placeholder="" required>
												</div>
												<div class="col-md-4 mb-3"><label for="validationCustom01">Correo electrónico</label>
													<input name="email" type="text" class="form-control" id="validationCustom01" placeholder="" required>
												</div>
												<div class="col-md-4 mb-3"><label for="validationCustom01">Asigna una contraseña segura</label>
													<input name="pass" type="text" class="form-control" id="validationCustom01" placeholder="" required>
												</div>
												<div class="col-md-4 mb-3"><label for="validationCustom01">Rango</label>
													<select name="rol" type="text" class="form-control" id="validationCustom01" placeholder="" required>
														<option value="">Seleccionar</option>
														<?php
														$adminData = $db->getAllRecords('roles', '*', ' AND id>"1" ORDER BY id ASC');
														if (count($adminData) > 0) {
															foreach ($adminData as $administrador) {
														?>
																<option value="<?php echo ($administrador['id']); ?>"><?php echo $administrador['nombre']; ?></option>
														<?php
															}
														}
														?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<button class="btn btn-primary" type="submit" value="submit" name="submit">Agregar</button>
								</form>
							</div>
							<!--end card-body-->
						</div>
						<!--end card-->
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
				</div><!-- end row -->
			</div><!-- container -->
			<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/admin/modulos/footer.php"); ?>
			<?php
			if (isset($_COOKIE['msg'])) {
				require_once($_SERVER["DOCUMENT_ROOT"] . "/include/msg.php");
			} ?>
			<!--end footer-->
		</div>
		<!-- end page content -->
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
	<!-- App js -->
	<script src="/admin/assets/js/app.js"></script>
	<script src="/admin/assets/pages/jquery.validation.init.js"></script>
	<script src="/admin/plugins/dropify/js/dropify.min.js"></script>
	<script src="/admin/assets/pages/jquery.form-upload.init.js"></script><!-- App js -->
	<script src="/admin/assets/pages/jquery.form-upload.init.js"></script><!-- App js -->
</body>
</html>