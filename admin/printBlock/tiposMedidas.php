<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/sesion.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/funciones.php");


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//AQUI COMIENZAN LAS REGLAS ESPECIALES POR USUARIOS
//AQUI COMIENZAN LAS REGLAS ESPECIALES POR USUARIOS
//AQUI COMIENZAN LAS REGLAS ESPECIALES POR USUARIOS
//AQUI COMIENZAN LAS REGLAS ESPECIALES POR USUARIOS

//ASIGNA EL NIVEL DE ACCESO
$lvl = 1;
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/roles.php");

//AQUI FINALIZAN LAS REGLAS ESPECIALES POR USUARIOS
//AQUI FINALIZAN LAS REGLAS ESPECIALES POR USUARIOS
//AQUI FINALIZAN LAS REGLAS ESPECIALES POR USUARIOS
//AQUI FINALIZAN LAS REGLAS ESPECIALES POR USUARIOS

//OBTENER RANGO POR ID
$rol = $db->getAllRecords('roles', '*', ' AND id="' . ($UserData['rol']) . '"LIMIT 1 ');
$rol = $rol[0];
$rol = ($rol['nombre']);

$fecha = date("Y-m-d H:i:s");



if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
    extract($_REQUEST);

    if ($nombre == ""){
        setcookie("msg", "basic", time() + 2, "/");
        header('location: /admin/printBlock/tiposMedidas');
        exit;
    } else {


        $tipoMat = $db->getQueryCount('pbTiposMedidas', 'id');
        if ($tipoMat[0]['total'] < 10000) {
            $data    =    array(
                'nombre' => $nombre,
                'fr' => $fecha,
                'admin' => $UserData['id'],
            );
            $insert    =    $db->insert('pbTiposMedidas', $data);

            if ($insert) {
                setcookie("msg", "tmedok", time() + 2, "/");
                header('location:/admin/printBlock/tiposMedidas');
                exit;
            } else {
                setcookie("msg", "ups", time() + 2, "/");
                header('location:/admin/printBlock/tiposMedidas'); //sin cambios
                exit;
            }
        } else {
            setcookie("msg", "lim", time() + 2, "/");
            header('location:/admin/printBlock/tiposMedidas'); //limite
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Nuevo material - Administrador <?php echo NAME_PROJECT; ?></title>
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
                                    <h4 class="page-title">Materiales</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Administrador</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Nuevo</a></li>
                                        <li class="breadcrumb-item active">Material</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Dar de alta nuevo tipo de medida</h4>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <form class="needs-validation" novalidate="" method="post">
                                    <div class="form-row">

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 mb-3"><label for="validationCustom01">Nombre</label>
                                                    <input name="nombre" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit" value="submit" name="submit">Enviar</button>
                                </form>
                                <!--end form-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Materiales</h4>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Registrada</th>
                                                <th class="text-right">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $matData = $db->getAllRecords('pbTiposMedidas', '*', 'ORDER BY nombre ASC');
                                            if (count($matData) > 0) {
                                                $y    =    '';
                                                foreach ($matData as $tipoMedida) {

                                                    $date1 = new DateTime($tipoMedida['fr']);
                                                    $date2 = new DateTime("now");
                                                    $diff = $date1->diff($date2);

                                                    

                                                    $y++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $y ?></td>
                                                        <td><?php echo $tipoMedida['nombre']; ?></td>
                                                        <td>Hace: <?php echo get_format($diff); ?></td>
                                                        <td class="text-right">
                                                            <a href="/admin/borrar/tipoMedida?delId=<?php echo $tipoMedida['id']; ?>" onClick="return confirm('Estás seguro? Esto no se puede deshacer');"><i class="las la-trash-alt text-danger font-18"></i></a>
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



    <script src="https://cdn.tiny.cloud/1/m5ug66f7s0shi1wbuoq6bdea4aeasit12v3eohxa2w823qzg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>




</body>

</html>