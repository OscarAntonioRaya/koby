<?php  
 session_start();  
 require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        if (isset($_SESSION['UserId'])) {
            
            setcookie("msg","ylog",time() + 2, "/");
            header("location: /admin");
            exit;
        } 

try  
 {   
      $connect = new PDO("mysql:host=".SS_DB_HOST."; dbname=".SS_DB_NAME."", SS_DB_USER, SS_DB_PASSWORD);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["submit"]))  
      {  
           if(empty($_POST["email"]) || empty($_POST["password"]))  
           {
               setcookie("msg","all",time() + 2, "/");
               header("location: /admin/login");
           }  
           else  
           {  
                $query = "SELECT * FROM usuarios WHERE email = :email AND pass = BINARY :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'email'     => $_POST["email"],
                          'password'  => $_POST["password"],
                     ) 
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     
                    //ESTABLECEMOS LA HORA IGUAL QUE EN LOS CABOS
                    $fecha = date("Y-m-d H:i:s");
                    //OBTENEMOS DATOS DE USUARIO
                    $UserData =	$db->getAllRecords('usuarios','*',' AND email="'.($_POST["email"]).'"LIMIT 1 ');
                    $UserData = $UserData[0];
                    
                    
                    
                    $_SESSION['UserId'] = $UserData['id'];
                    //ACTUALIZAMOS LA FECHA DEL ÚLTIMO LOGIN
                    $InsertData	=	array(
                                    'fl'=> $fecha,
                                 );
                    $update	=	$db->update('usuarios',$InsertData,array('id'=>($UserData['id'])));
                    
                    
                    setcookie("msg","bienvenido",time() + 2, "/");
                    header("location: /admin/");
                    exit;
                }  
                else  
                {  
                    setcookie("msg","inv",time() + 2, "/");
                    header("location: /admin/login/");
                    exit;
                }
           }
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Iniciar Sesión - Administrador <?php echo NAME_PROJECT;?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta content="Panel de administrador - Print Block" name="description">
    <meta content="jantonioga90@gmail.com" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/images/favicon.ico">
    <!-- App css -->
    <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="/admin/assets/css/app.min.css" rel="stylesheet" type="text/css">
</head>

<body class="account-body accountbg">


    <!-- Register page -->
    <div class="container">

        <?php
        if(isset($_COOKIE['msg'])) {
            require_once($_SERVER["DOCUMENT_ROOT"]."/include/msg.php");
            } ?>
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center p-3">
                                    <a href="/" class="logo logo-admin">
                                        <img src="/logo.png" height="50" alt="logo" class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">Administrador</h4>
                                    <p class="text-muted mb-0">Acceso para admisnitradores</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                                        <form class="form-horizontal auth-form my-4" method="post">
                                            <div class="form-group">
                                                <label for="username">Correo electrónico</label>
                                                <div class="input-group mb-3">
                                                    <input type="email" class="form-control" name="email" id="username">
                                                </div>
                                            </div>
                                            <!--end form-group-->
                                            <div class="form-group">
                                                <label for="userpassword">Contraseña</label>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" name="password" id="userpassword">
                                                </div>
                                            </div>
                                            <!--end form-group-->
                                            <div class="form-group row mt-4">
                                                <div class="col-sm-6 text-right">
                                                    <a href="/" class="text-muted font-13">
                                                        <i class="dripicons-lock"></i> Olvidaste tu contraseña?</a>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end form-group-->
                                            <div class="form-group mb-0 row">
                                                <div class="col-12 mt-2">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" value="submit" name="submit">Acceder <i class="fas fa-sign-in-alt ml-1"></i></button>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end form-group-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                            <div class="card-body bg-light-alt text-center"><span class="text-muted d-none d-sm-inline-block">Print Block</span></div>
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
    <!-- End Register page -->
    <!-- jQuery  -->
    <script src="/admin/assets/js/jquery.min.js"></script>
    <script src="/admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/assets/js/waves.js"></script>
    <script src="/admin/assets/js/feather.min.js"></script>
    <script src="/admin/assets/js/simplebar.min.js"></script>
</body>

</html>
