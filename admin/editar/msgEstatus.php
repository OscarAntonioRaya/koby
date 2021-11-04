<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once($_SERVER["DOCUMENT_ROOT"]."/include/sesion.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/funciones.php");

    //ASIGNA EL NIVEL DE ACCESO
    $lvl = 2;
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/roles.php");

    //OBTENER RANGO POR ID
    $rol = $db->getAllRecords('roles','*',' AND id="'.($UserData['rol']).'"LIMIT 1 ');
    $rol = $rol[0]['nombre'];

    $fecha = date("Y-m-d H:i:s");
    
    if (isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
        $msgSel  =  $db->getAllRecords('msgStatus','*',' AND id="'.$_REQUEST['editId'].'"','LIMIT 1');
    
        if (empty($msgSel)) { //SI NO EXISTE ES QUE NO HAY UN ID VALIDO Y REDIRECCIONAMOS Y LANZAMOS ERROR
            setcookie("msg","usernoval",time() + 2, "/");
            header('location:/admin/msgEstatus/');
            exit;
        }
        $msgSel  =  $msgSel[0];
        
    if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
    extract($_REQUEST);

        if(($msg=="")and($estilo=="")and($descripcion=="")and($mensaje=="")){
            setcookie("msg","all",time() + 2, "/");
            header('location: /admin/editar/msgEstatus/?editId='.$_REQUEST['editId'].'');
            exit;
        }else{
            $data	=	array(
                'msg'=>($msg),
				'estilo'=>($estilo),
				'descripcion'=>($descripcion),
				'mensaje'=>($mensaje),
            );
            $update	=	$db->update('msgStatus',$data,array('id'=>($_REQUEST['editId'])));
            if($update){
                setcookie("msg","userup",time() + 2, "/");
                header('location:/admin/config/msgEstatus/'); //Exito en el cmabio
                exit;
            }
            else{
                setcookie("msg","ups",time() + 2, "/");
                header('location:/admin/config/msgEstatus/'); //sin cambios
                exit;
            }
        }
    }
        
}



?>
<!DOCTYPE html>
<html lang="es">
    
    <head>
        <meta charset="utf-8">
        <title>Mensaje de estatus - Administrador - <?php echo NAME_PROJECT;?></title>
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
        <link href="/admin/plugins/dropify/css/dropify.min.css" rel="stylesheet"><!-- App css -->
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
                                        <h4 class="page-title">Editar usuario</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">Administrador</li>
                                            <li class="breadcrumb-item">Editar</li>
                                            <li class="breadcrumb-item text-amero">Usuario</li>
                                        </ol>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row--><!-- end page title end breadcrumb -->
                    
                    
                    
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card">
                                
                                <div class="card-body">
                                    <form class="needs-validation" enctype="multipart/form-data" novalidate="" method="post">
                                        <div class="form-row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Clave</label>
                                                    <input name="msg" type="text" value="<?php echo $msgSel['msg'];?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Estilo</label>
                                                    <select name="estilo" class="form-control selectric" required>
                                                        <option selected value="<?php echo $msgSel['estilo'];?>">Actual: <?php echo $msgSel['estilo'];?></option>
                                                        <option value="success">Correcto</option>
                                                        <option value="danger">Error</option>
                                                        <option value="warning">Advertencia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Descripción (En que casos se aplica)</label>
                                                    <input name="descripcion" value="<?php echo $msgSel['descripcion'];?>" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Mensaje que verá el usuario</label>
                                                    <input name="mensaje" value="<?php echo $msgSel['mensaje'];?>" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit" value="submit" name="submit" >Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
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
        <!-- end page-wrapper --><!-- jQuery  -->
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