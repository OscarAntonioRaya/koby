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
    $lvl = 2;
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/roles.php");

    //AQUI FINALIZAN LAS REGLAS ESPECIALES POR USUARIOS
    //AQUI FINALIZAN LAS REGLAS ESPECIALES POR USUARIOS
    //AQUI FINALIZAN LAS REGLAS ESPECIALES POR USUARIOS
    //AQUI FINALIZAN LAS REGLAS ESPECIALES POR USUARIOS

    
    if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
        $delTarifa = $db->getAllRecords('pbTarifas','*','AND id='.($_REQUEST['delId']).'','LIMIT 1');
        if (empty($delTarifa)) {
            setcookie("msg","ups",time() + 2, "/");
            header('location:/admin/tarifas');
            exit;
        }
        $delTarifa = $delTarifa[0];
          
        $db->delete('pbTarifas',array('id'=>$_REQUEST['delId']));
        
        setcookie("msg","taridel",time() + 2, "/");
        header('location: /admin/tarifas');
        exit;
    }
?>