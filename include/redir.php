<?php 
//VIEWER
if ($UserData['rol']==5){
    setcookie("msg","noaccsar",time() + 2, "/");
    header('Location: /');
    exit;
} 
//EDITOR
if ($UserData['rol']==4){
    setcookie("msg","noaccsar",time() + 2, "/");
    header('Location: /');
    exit;
}
//MANAGER
if ($UserData['rol']==3){
    setcookie("msg","noaccsar",time() + 2, "/");
    header('Location: /');
    exit;
}
//ADMINISTRADOR
if ($UserData['rol']<=2){
    setcookie("msg","noaccsar",time() + 2, "/");
    header('Location: /admin/');
    exit;
}
?>