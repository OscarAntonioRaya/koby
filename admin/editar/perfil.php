<?php 
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/sesion.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/funciones.php");

    

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $fecha = date("Y-m-d H:i:s");


if (isset($_REQUEST['submit'])) {
	extract($_REQUEST);	
	
   if(($nombre=="")&($email=="")&($apeidos=="")){
        setcookie("msg","all",time() + 2, "/");
		header('location: /admin/editar/perfil/');
		exit;
	}else if(!isEmail($email)) {
        setcookie("msg","noemail",time() + 2, "/");
		header('location: /admin/editar/perfil/');
		exit;
	}else {
        
        //SI EL USUARIO CMABIA DE CORREO VERIFICAMOS SI EL CORREO NUEVO YA EXISTE
        if (($UserData['email'])!=$email) {
            $EmailEx =	$db->getAllRecords('usuarios','*',' AND email="'.$email.'"LIMIT 1 ');
            if (isset($EmailEx)) {
                setcookie("msg","mailex",time() + 2, "/");
                header('location: ');
                exit;
            }
        }
        
          
        
        $codigo = ($UserData['fPerfil']); //SI NO SE SUBE LA FOTO LE DAMOS EL VALOR EXISTENTE A CODIGO
        if (!empty($_FILES['thumb']['tmp_name'])) {
            
            $thumb = $_FILES['thumb']['tmp_name']; //DEFINIMOS LA VARIABLE THUMB YA SABEMOS QUE SI SE CARGÓ UNA FOTO
            
            if($_FILES['thumb']['type'] !== 'image/jpeg'){ 
		      setcookie("msg","fnv",time() + 2, "/");
		      header('location: ');
		      exit;
            }
            
            if(($_FILES['thumb']['size']) > 1000000){
              setcookie("msg","fnvz",time() + 2, "/");
		      header('location: /admin/editar/perfil');
		      exit;
            }
            
            
            //A ESTE PUNTO SABEMOS QUE SI SUBIÓ UNA FOTO NUEVA, ENTONCES DEBEMOS BORRAR LA EXISTENTE
            if (!empty($UserData['fPerfil'])){
                $archivo = '../../upload/usuarios/'.(strftime("%Y/%m", strtotime(($UserData['fr'])))).'/'.($UserData['fPerfil']).'.jpg';
                unlink($archivo); //BORRAMOS LA FOTO ANTIGUA
            }
            
            $codigo = GeraHash(10); //LO USAMOS PARA EL NOMBRE DE LA FOTO
            $ruta = '../../upload/usuarios/'.(strftime("%Y/%m", strtotime(($UserData['fr'])))).'';
            
        
            //SI LA CARPETA NO EXISTE LA CREAMOS
            if(!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }
	            
            //SUBIMOS LA FOTO EN LA CARPETA EXISTENTE O LA CREADA
            $archivo_subido = ''.$ruta.'/' . $codigo . '.jpg';
            move_uploaded_file($thumb, $archivo_subido);
         }
        
        
        
        if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
            extract($_REQUEST);
            $data	=	array(
                'nombre'=>$nombre,
                'email'=>$email,
                'apeidos'=>$apeidos,
                'fa'=>$fecha,
                'fPerfil'=>$codigo,
            );
            $update	=	$db->update('usuarios',$data,array('id'=>($UserData['id'])));
            
            
            if($update){
                setcookie("msg","actper",time() + 2, "/");
                header('location: /admin'); //ACTUALIZADO CORRECTAMENTE
                exit;
                }
                else{
                    setcookie("msg","ups",time() + 2, "/");
                    header('location: /admin/perfil'); //UPS
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
        <title>Mi perfil - Administrador - <?php echo NAME_PROJECT;?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="" name="author"><meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                                        <h4 class="page-title">Información personal.</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">Administrador</li>
                                            <li class="breadcrumb-item">Ajustes</li>
                                            <li class="breadcrumb-item text-amero">Perfil</li>
                                        </ol>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row--><!-- end page title end breadcrumb -->
                    
                    
                    
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <p class="text-muted mb-0">Actualiza tu información de perfil</p>
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-6 mb-3">
                                                <label for="validationCustom01">Nombres</label>
                                                <input type="text"class="form-control" id="validationCustom01" name="nombre" value="<?php echo $UserData['nombre'];?>" required>
                                                <div class="valid-feedback">¡Correcto!</div>
                                            </div><!--end col-->
                                        
                                            <div class="col-sm-12 col-md-6 mb-3">
                                                <label for="validationCustom01">Apellidos</label>
                                                <input type="text"class="form-control" id="validationCustom01" name="apeidos" value="<?php echo $UserData['apeidos'];?>" required>
                                                <div class="valid-feedback">¡Correcto!</div>
                                            </div><!--end col-->
                                            
                                            
                                            <div class="col-sm-12 col-md-6 mb-3">
                                                <label for="validationCustom01">Correo electrónico</label>
                                                <input type="email"class="form-control" id="validationCustom01" name="email" value="<?php echo $UserData['email'];?>" required>
                                                <div class="valid-feedback">¡Correcto!</div>
                                            </div><!--end col-->
                                            
                                            <div class="col-sm-12 col-md-6 mb-3">
                                                <label for="validationCustom01">Fotografía de perfil</label>
                                                <input type="file" class="form-control" id="validationCustom01" name="thumb">
                                                <div class="valid-feedback">¡Correcto!</div>
                                            </div><!--end col-->
                                            
                                        </div><!--end form-row-->
                                        <button class="btn btn-primary" type="submit" value="submit" name="submit">Actualizar</button>
                                    </form><!--end form-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        
                    </div><!--end row-->
                    
                    
                    
                    
                    
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
        
     
        
    </body>
</html>