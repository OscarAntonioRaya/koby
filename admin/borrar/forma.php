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
        $delForma = $db->getAllRecords('pbFormas','*','AND id='.($_REQUEST['delId']).'','LIMIT 1');
        if (empty($delForma)) {
            setcookie("msg","ups",time() + 2, "/");
            header('location:/admin/printBlock/formas/');
            exit;
        }
        $delForma = $delForma[0];
            
        if (isset($delForma['forma'])){
            $archivo = '../../upload/formas/'.(strftime("%Y/%m", strtotime(($delForma['fr'])))).'/'.($delForma['forma']).'.png';
            unlink($archivo); //BORRAMOS LA FOTO ANTIGUA SACANDO EL NOMBRE DE LA BASE DE DATOS
        }
        $db->delete('pbFormas',array('id'=>$_REQUEST['delId']));
        
        setcookie("msg","formdel",time() + 2, "/");
        header('location: /admin/printBlock/formas/');
        exit;
    }
?>