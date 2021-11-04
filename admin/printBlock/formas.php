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
$lvl = 2;
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
$mesr = strftime("%m");
$anor = strftime("%Y");



if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
    extract($_REQUEST);

    if ($nombre == "") {
        setcookie("msg", "basic", time() + 2, "/");
        header('location: /admin/printBlock/formas');
        exit;
    } else if (($_FILES['thumb']['tmp_name']) == "") {
        setcookie("msg", "textu", time() + 2, "/");
        header('location: /admin/printBlock/formas');
        exit;
    } else {

        if (!empty($_FILES['thumb']['tmp_name'])) {

            $thumb = $_FILES['thumb']['tmp_name']; //DEFINIMOS LA VARIABLE THUMB YA SABEMOS QUE SI SE CARGÓ UNA FOTO

            if ($_FILES['thumb']['type'] !== 'image/png') {
                setcookie("msg", "fnpng", time() + 2, "/");
                header('location: /admin/printBlock/formas');
                exit;
            }

            if (($_FILES['thumb']['size']) > 1000000) {
                setcookie("msg", "fnvz", time() + 2, "/");
                header('location: /admin/printBlock/formas');
                exit;
            }

            $codigo = GeraHash(10); //LO USAMOS PARA EL NOMBRE DE LA FOTO

            $ruta = '../../upload/formas/' . $anor . '/' . $mesr . '';


            //SI LA CARPETA NO EXISTE LA CREAMOS
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            //SUBIMOS LA FOTO EN LA CARPETA EXISTENTE O LA CREADA
            $archivo_subido = '' . $ruta . '/' . $codigo . '.png';
            move_uploaded_file($thumb, $archivo_subido);
        }

        $drCount    =    $db->getQueryCount('pbFormas', 'id');
        if ($drCount[0]['total'] < 10000) {
            $data    =    array(
                'nombre' => $nombre,
                'forma' => $codigo,
                'fr' => $fecha,
                'admin' => $UserData['id'],
            );
            $insert    =    $db->insert('pbFormas', $data);

            if ($insert) {
                setcookie("msg", "matok", time() + 2, "/");
                header('location:/admin/printBlock/formas');
                exit;
            } else {
                setcookie("msg", "ups", time() + 2, "/");
                header('location:/admin/printBlock/formas'); //sin cambios
                exit;
            }
        } else {
            setcookie("msg", "lim", time() + 2, "/");
            header('location:/admin/printBlock/formas'); //limite
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
                                    <h4 class="page-title">Formas</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Administrador</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Nuevo</a></li>
                                        <li class="breadcrumb-item active">Forma</li>
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
                                <h4 class="card-title">Dar de alta nueva forma</h4>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <form class="needs-validation" enctype="multipart/form-data" novalidate="" method="post">
                                    <div class="form-row">

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 mb-3"><label for="validationCustom01">Nombre</label>
                                                    <input name="nombre" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-4 mb-3">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Formas a mostrar</h4>
                                                    <p class="text-muted mb-0">Solo archivos PNG de máximo 1MB</p>
                                                </div>
                                                <!--end card-header-->
                                                <div class="card-body">
                                                    <input type="file" name="thumb" id="input-file-now" class="dropify" data-height="230">
                                                </div>
                                                <!--end card-body-->
                                            </div>
                                            <!--end card-->
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
                                                <th>Froma</th>
                                                <th>Nombre</th>
                                                <th>Registrada</th>
                                                <th class="text-right">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $formData = $db->getAllRecords('pbFormas', '*', 'ORDER BY id DESC');
                                            if (count($formData) > 0) {
                                                $y    =    '';
                                                foreach ($formData as $forma) {

                                                    $date1 = new DateTime($forma['fr']);
                                                    $date2 = new DateTime("now");
                                                    $diff = $date1->diff($date2);

                                                    

                                                    $y++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $y ?></td>
                                                        <td><img style="background-color: #df0426;padding: 2px;" src="/upload/formas/<?php echo (strftime("%Y/%m", strtotime(($forma['fr'])))); ?>/<?php echo ($forma['forma']) ?>.png" alt="" class="thumb-sm mr-1"></td>
                                                        <td><?php echo $forma['nombre']; ?></td>
                                                        <td>Hace: <?php echo get_format($diff); ?></td>
                                                        <td class="text-right">
                                                            <a href="/admin/borrar/forma?delId=<?php echo $forma['id']; ?>" onClick="return confirm('Estás seguro? Esto no se puede deshacer');"><i class="las la-trash-alt text-danger font-18"></i></a>
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