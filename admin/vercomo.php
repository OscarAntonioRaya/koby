<?php

    require_once($_SERVER["DOCUMENT_ROOT"]."/include/sesion.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/funciones.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //ASIGNA EL NIVEL DE ACCESO
    $lvl = 1;
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/roles.php");

    
    if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
        $userSel = $db->getAllRecords('usuarios','*','AND id='.($_REQUEST['id']).'','LIMIT 1');
        if (empty($userSel)) {
            setcookie("msg","ups",time() + 2, "/");
            header('location: /admin/usuarios/');
            exit;
        }
        $userSel = $userSel[0];
            
        $_SESSION['UserId'] = $userSel['id'];
        
        setcookie("msg","usercamb",time() + 2, "/");
        header('location: /admin/');
        exit;
    }
?>
