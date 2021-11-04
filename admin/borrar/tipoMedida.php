<?php 
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/sesion.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/funciones.php");


    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    //AQUI COMIENZAN LAS REGLAS ESPECIALES POR USUARIOS
    //AQUI COMIENZAN LAS REGLAS ESPECIALES POR USUARIOS
    //AQUI COMIENZAN LAS REGLAS ESPECIALES POR USUARIOS
    //AQUI COMIENZAN LAS REGLAS ESPECIALES POR USUARIOS

    //ASIGNA EL NIVEL DE ACCESO
    $lvl = 1;
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/roles.php");

    //AQUI FINALIZAN LAS REGLAS ESPECIALES POR USUARIOS
    //AQUI FINALIZAN LAS REGLAS ESPECIALES POR USUARIOS
    //AQUI FINALIZAN LAS REGLAS ESPECIALES POR USUARIOS
    //AQUI FINALIZAN LAS REGLAS ESPECIALES POR USUARIOS

    
    if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
        $DelMaterial = $db->getAllRecords('pbTiposMedidas','*','AND id='.($_REQUEST['delId']).'','LIMIT 1');
        if (empty($DelMaterial)) {
            setcookie("msg","ups",time() + 2, "/");
            header('location:/admin/printBlock/tiposMedidas/');
            exit;
        }
        $DelMaterial = $DelMaterial[0];
        
        $db->delete('pbTiposMedidas',array('id'=>$_REQUEST['delId']));
        
        setcookie("msg","tmeddel",time() + 2, "/");
        header('location: /admin/printBlock/tiposMedidas/');
        exit;
    }
?>