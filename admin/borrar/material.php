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
        $DelMaterial = $db->getAllRecords('pbMateriales','*','AND id='.($_REQUEST['delId']).'','LIMIT 1');
        if (empty($DelMaterial)) {
            setcookie("msg","ups",time() + 2, "/");
            header('location:/admin/printBlock/materiales/');
            exit;
        }
        $DelMaterial = $DelMaterial[0];
            
        if (isset($DelMaterial['textura'])){
            $archivo = '../../upload/texturas/'.(strftime("%Y/%m", strtotime(($DelMaterial['fr'])))).'/'.($DelMaterial['textura']).'.jpg';
            unlink($archivo); //BORRAMOS LA FOTO ANTIGUA SACANDO EL NOMBRE DE LA BASE DE DATOS
        }
        $db->delete('pbMateriales',array('id'=>$_REQUEST['delId']));
        
        setcookie("msg","matdel",time() + 2, "/");
        header('location: /admin/printBlock/materiales/');
        exit;
    }
?>