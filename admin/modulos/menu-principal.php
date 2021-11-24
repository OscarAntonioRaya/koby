<?php
//OBTENER RANGO POR ID
$rol = $db->getAllRecords('roles', '*', ' AND id="' . ($UserData['rol']) . '"LIMIT 1 ');
$rol = $rol[0];
$rol = ($rol['nombre']);
?>
<div class="left-sidenav">
	<!-- LOGO -->
	<div class="brand">
		<a href="/admin" class="logo">
			<span><img src="/logo.png" alt="logo-large" style="margin-top: 15px; width: 80px; height: auto;" class="logo-lg logo-light">
			</span>
		</a>
	</div>
	<div class="menu-content h-100" data-simplebar>
		<ul class="metismenu left-sidenav-menu">
			<li class="menu-label mt-0"><?php echo $rol; ?></li>
			<li>
				<a href="/admin/">
					<i data-feather="home" class="align-self-center menu-icon"></i>
					<span>Inicio</span>
				</a>
			</li>
			<li>
				<a href="/admin/usuarios/">
					<i data-feather="users" class="align-self-center menu-icon"></i>
					<span>Usuarios</span>
				</a>
			</li>
			<li>
				<a href="/admin/pedidos">
					<i data-feather="package" class="align-self-center menu-icon"></i>
					<span>Pedidos</span>
				</a>
			</li>
			<li>
				<a href="javascript: void(0);">
					<i class="dripicons-article"></i>
					<span>Print Blocks</span>
					<span class="menu-arrow">
						<i class="mdi mdi-chevron-right"></i>
					</span>
				</a>
				<ul class="nav-second-level" aria-expanded="false">
					<li class="nav-item"><a class="nav-link" href="/admin/printBlock/materiales/"><i class="ti-control-record"></i>Materiales</a></li>
					<li class="nav-item"><a class="nav-link" href="/admin/printBlock/formas/"><i class="ti-control-record"></i>Formas</a></li>
				</ul>
			</li>
			<li>
				<a href="/admin/tarifas/">
					<i class="far fa-money-bill-alt align-self-center menu-icon"></i>
					<span>Tarifas y medidas</span>
				</a>
			</li>
			<li>
				<a href="javascript: void(0);">
					<i class="dripicons-gear"></i>
					<span>Configuración</span>
					<span class="menu-arrow">
						<i class="mdi mdi-chevron-right"></i>
					</span>
				</a>
				<ul class="nav-second-level" aria-expanded="false">
					<li class="nav-item"><a class="nav-link" href="/admin/config/roles/"><i class="ti-control-record"></i>Roles de usuario</a></li>
					<li class="nav-item"><a class="nav-link" href="/admin/config/msgEstatus/"><i class="ti-control-record"></i>Mensajes de estatus</a></li>
					<li class="nav-item"><a class="nav-link" href="/admin/config/pedidos/estatus/"><i class="ti-control-record"></i>Estatus de pedidos</a></li>
					<li class="nav-item"><a class="nav-link" href="/admin/config/pedidos/metodos/"><i class="ti-control-record"></i>Metodos de pago</a></li>
					<li class="nav-item"><a class="nav-link" href="/admin/printBlock/tiposMedidas/"><i class="ti-control-record"></i>Tipos de medidas</a></li>
				</ul>
			</li>
			<hr class="hr-dashed hr-menu">
		</ul>
	</div>
</div>