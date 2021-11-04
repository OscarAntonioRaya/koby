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
    $rol = $rol[0];
    $rol = ($rol['nombre']);

    $fecha = date("Y-m-d H:i:s");
    
    if (isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
        $tarSel  =  $db->getAllRecords('pbTarifas','*',' AND id="'.$_REQUEST['editId'].'"','LIMIT 1');
    
        if (empty($tarSel)) { //SI NO EXISTE ES QUE NO HAY UN ID VALIDO Y REDIRECCIONAMOS Y LANZAMOS ERROR
            setcookie("msg","tarnoen",time() + 2, "/");
            header('location:/admin/tarifas');
            exit;
        } 
        
        $tarSel  =  $tarSel [0];
        
    if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
    extract($_REQUEST);
        
            
        if($nombre==""){
            setcookie("msg","all",time() + 2, "/");
            header('location: /admin/tarifas');
            exit;
        }else{
            $data	=	array(
                'nombre'    => $nombre,
                'material'  => $material,
                'forma'     => $forma,
                'tipoMedida'=> $tipoMedida,
                'base'      => $base,
                'altura'    => $altura,
                'grosor'    => $grosor,
                'fa'        => $fecha,
                'admin'     => $UserData['id'],
                'precio'    => $precio,
            );
            $update	=	$db->update('pbTarifas',$data,array('id'=>($_REQUEST['editId'])));
            if($update){
                setcookie("msg","userup",time() + 2, "/");
                header('location:/admin/tarifas'); //Exito en el cmabio
                exit;
            }
            else{
                setcookie("msg","ups",time() + 2, "/");
                header('location:/admin/tarifas'); //sin cambios
                exit;
            }
        }
    }
        
    //OBTENER DATOS SELECCIONADOS
    $formSel = $db->getAllRecords('pbFormas','*', 'AND id="'.($tarSel['forma']).'"LIMIT 1 ')[0];
    $mateSel = $db->getAllRecords('pbMateriales','*', 'AND id="'.($tarSel['material']).'"LIMIT 1 ')[0];
    $tipmSel = $db->getAllRecords('pbTiposMedidas','*', 'AND id="'.($tarSel['tipoMedida']).'"LIMIT 1 ')[0];
}



?>
<!DOCTYPE html>
<html lang="es">
    
    <head>
        <meta charset="utf-8">
        <title>Administrador - Editar Usuario - <?php echo NAME_PROJECT;?></title>
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
                                    <form class="needs-validation" novalidate="" method="post">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3"><label for="validationCustom01">Nombre</label>
                                                        <input name="nombre" type="text" class="form-control" value="<?php echo $tarSel['nombre'];?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4 mb-3"><label for="validationCustom01">Material</label>
                                                        <select name="material" class="form-control selectric" required>
                                                            <option selected value="<?php echo $mateSel['id'];?>">Actual: <?php echo $mateSel['nombre'];?></option>
                                                            <?php
                                                            $matData = $db->getAllRecords('pbMateriales','*',' ORDER BY nombre ASC');
                                                            if (count($matData)>0){
                                                                $y	=	'';
                                                                    foreach($matData as $material){
                                                                    $y++;?>
                                                                    <option value="<?php echo ($material['id']);?>"><?php echo ($material['nombre']);?></option>
                                                                    <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mb-3"><label for="validationCustom01">Forma</label>
                                                        <select name="forma" class="form-control selectric" required>
                                                            <option selected value="<?php echo $formSel['id'];?>">Actual: <?php echo $formSel['nombre'];?></option>
                                                            <?php
                                                            $formData = $db->getAllRecords('pbFormas','*',' ORDER BY nombre ASC');
                                                            if (count($formData)>0){
                                                                $y	=	'';
                                                                    foreach($formData as $forma){
                                                                    $y++;?>
                                                                    <option value="<?php echo ($forma['id']);?>"><?php echo ($forma['nombre']);?></option>
                                                                    <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-md-4 mb-3"><label for="validationCustom01">Tipo de medida</label>
                                                        <select name="tipoMedida" class="form-control selectric" required>
                                                            <option selected value="<?php echo $tipmSel['id'];?>">Actual: <?php echo $tipmSel['nombre'];?></option>
                                                            <?php
                                                            $tipData = $db->getAllRecords('pbTiposMedidas','*',' ORDER BY nombre ASC');
                                                            if (count($tipData)>0){
                                                                $y	=	'';
                                                                    foreach($tipData as $tipoMedida){
                                                                    $y++;?>
                                                                    <option value="<?php echo ($tipoMedida['id']);?>"><?php echo ($tipoMedida['nombre']);?></option>
                                                                    <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-4 mb-3"><label for="validationCustom01">Base (cm.)</label>
                                                        <input name="base" type="text" class="form-control" value="<?php echo $tarSel['base'];?>" required>
                                                    </div>
                                                    <div class="col-md-4 mb-3"><label for="validationCustom01">Altura (cm.)</label>
                                                        <input name="altura" type="text" class="form-control" value="<?php echo $tarSel['altura'];?>" required>
                                                    </div>
                                                    <div class="col-md-4 mb-3"><label for="validationCustom01">Grosor (mm.)</label>
                                                        <input name="grosor" type="text" class="form-control" value="<?php echo $tarSel['grosor'];?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3"><label for="validationCustom01">Precio</label>
                                                <input name="precio" type="text" class="form-control" value="<?php echo $tarSel['precio'];?>" required>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit" value="submit" name="submit">Enviar</button>
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