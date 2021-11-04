<?php 
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/sesion.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/funciones.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //ASIGNA EL NIVEL DE ACCESO
    $lvl = 1;
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/roles.php");


    //OBTENER RANGO POR ID
    $rol = $db->getAllRecords('roles','*',' AND id="'.($UserData['rol']).'"LIMIT 1 ');
    $rol = $rol[0];
    $rol = ($rol['nombre']);

    
if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($msg==""){
        setcookie("msg","all",time() + 2, "/");
		header('location:/admin/config/msgEstatus');
		exit;
	}else{
        
		$caractCount	=	$db->getQueryCount('msgStatus','id');
		if($caractCount[0]['total']<10000){
			$data	=	array(
							'msg'=>($msg),
							'estilo'=>($estilo),
							'descripcion'=>($descripcion),
							'mensaje'=>($mensaje),
                            
						);
			$insert	=	$db->insert('msgStatus',$data);
			if($insert){
                setcookie("msg","mnsok",time() + 2, "/");
				header('location:/admin/config/msgEstatus');//exito
				exit;
			}else{
                setcookie("msg","sincam",time() + 2, "/");
				header('location:/admin/config/msgEstatus');//sin cambios
				exit;
			}
		} else{
            setcookie("msg","lim",time() + 2, "/");
			header('location:/admin/config/msgEstatus'); //limite
			exit;
		}
	}
}

?>
<!DOCTYPE html>
<html lang="es">
    
    <head>
        <meta charset="utf-8">
        <title>Mensajes de estatus - Administrador <?php echo NAME_PROJECT;?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="" name="author"><meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        
        
        
        <link href="/admin/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <link href="/admin/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
        
    
    </head>

    <body class="dark-sidenav"><!-- Left Sidenav -->
    
        <?php require_once($_SERVER["DOCUMENT_ROOT"]."/admin/modulos/menu-principal.php");?>
    
        <div class="page-wrapper">
        <!-- Top Bar Start -->
            <div class="topbar"><!-- Navbar -->
                
                <nav class="navbar-custom">
                  
                    <ul class="list-unstyled topbar-nav float-right mb-0">
                    
                    <?php require_once($_SERVER["DOCUMENT_ROOT"]."/admin/modulos/nav-user.php");?>
                        
                    </ul><!--end topbar-nav-->
                    <ul class="list-unstyled topbar-nav mb-0">
                        <li>
                            <button class="nav-link button-menu-mobile"><i data-feather="menu" class="align-self-center topbar-icon"></i></button>
                        </li>
                    </ul>
                </nav><!-- end navbar-->
            </div><!-- Top Bar End --><!-- Page Content-->
        
            <div class="page-content">
                <div class="container-fluid">
                <!-- Page-Title -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <h4 class="page-title">Especialidades</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Administrador</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Nueva</a></li>
                                        <li class="breadcrumb-item active">Especialidad</li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="">Nuevo mensaje de estatus</h4>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <form class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Clave</label>
                                                <input name="msg" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Estilo</label>
                                                <select name="estilo" class="form-control selectric" required>
                                                    <option value="success">Correcto</option>
                                                    <option value="danger">Error</option>
                                                    <option value="warning">Advertencia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Descripción (En que casos se aplica)</label>
                                                <input name="descripcion" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Mensaje que verá el usuario</label>
                                                <input name="mensaje" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button class="btn btn-primary" type="submit" value="submit" name="submit" >Enviar</button>
                                </form>
                                <!--end form-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Especialidades</h4>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                  #
                                                </th>
                                                <th>Clave</th>
                                                <th>Estilo</th>
                                                <th>Descripción (En que casos se aplica)</th>
                                                <th>Mensaje</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                <?php $espData = $db->getAllRecords('msgStatus','*','ORDER BY id DESC');
                                        if (count($espData)>0){
                                            $y	=	'';
                                            foreach($espData as $especialidad){
                                                $y++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $y ?></td>
                                                        <td><?php echo $especialidad['msg']; ?></td>
                                                        <td><?php echo $especialidad['estilo']; ?></td>
                                                        <td><?php echo $especialidad['descripcion']; ?></td>
                                                        <td><?php echo $especialidad['mensaje']; ?></td>
                                                        <td class="text-right">
                                                            <a href="/admin/editar/msgEstatus?editId=<?php echo $especialidad['id']; ?>"><i class="las la-pen text-info font-18"></i></a>
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
                <?php require_once($_SERVER["DOCUMENT_ROOT"]."/admin/modulos/footer.php");?>
                
                <?php
                if(isset($_COOKIE['msg'])) {
                    require_once($_SERVER["DOCUMENT_ROOT"]."/include/msg.php");
                } ?>
               
                <!--end footer-->
            </div>
        <!-- end page content -->
        </div>

    
       
    <script src="/admin/assets/js/jquery.min.js"></script>
    <script src="/admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/assets/js/metismenu.min.js"></script>
    <script src="/admin/assets/js/waves.js"></script>
    <script src="/admin/assets/js/feather.min.js"></script>
    <script src="/admin/assets/js/simplebar.min.js"></script>
    <script src="/admin/assets/js/jquery-ui.min.js"></script>
    <script src="/admin/assets/js/moment.js"></script>
    <script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
    
    
    
    <script src="/admin/plugins/parsleyjs/parsley.min.js"></script>
    
    
    <script src="/admin/assets/pages/jquery.datatable.init.js"></script>
    <script src="/admin/assets/pages/jquery.validation.init.js"></script>
        
        
    <script src="/admin/assets/js/jquery.core.js"></script>
    <script src="/admin/assets/js/app.js"></script>
       
       

    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables/dataTables.bootstrap4.min.js"></script><!-- Buttons examples -->
    <script src="/admin/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/admin/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables/jszip.min.js"></script>
    <script src="/admin/plugins/datatables/pdfmake.min.js"></script>
    <script src="/admin/plugins/datatables/vfs_fonts.js"></script>
    <script src="/admin/plugins/datatables/buttons.html5.min.js"></script>
    <script src="/admin/plugins/datatables/buttons.print.min.js"></script>
    <script src="/admin/plugins/datatables/buttons.colVis.min.js"></script><!-- Responsive examples -->
    <script src="/admin/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="/admin/assets/pages/jquery.datatable.init.js"></script>
        
        
     
        
    </body>
</html>