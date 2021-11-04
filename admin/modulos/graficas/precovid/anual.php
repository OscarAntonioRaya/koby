<?php

$hoy = date('Y-m');
$mes1 = $hoy;

$mes2 = strtotime ('-1 month',strtotime($hoy));
$mes2 = date('Y-m',$mes2);

$mes3 = strtotime ('-2 month',strtotime($hoy));
$mes3 = date('Y-m',$mes3);

$mes4 = strtotime ('-3 month',strtotime($hoy));
$mes4 = date('Y-m',$mes4);

$mes5 = strtotime ('-4 month',strtotime($hoy));
$mes5 = date('Y-m',$mes5);

$mes6 = strtotime ('-5 month',strtotime($hoy));
$mes6 = date('Y-m',$mes6);

$mes7 = strtotime ('-6 month',strtotime($hoy));
$mes7 = date('Y-m',$mes7);

$mes8 = strtotime ('-7 month',strtotime($hoy));
$mes8 = date('Y-m',$mes8);

$mes9 = strtotime ('-8 month',strtotime($hoy));
$mes9 = date('Y-m',$mes9);

$mes10 = strtotime('-9 month',strtotime($hoy));
$mes10 = date('Y-m',$mes10);

$mes11 = strtotime('-10 month',strtotime($hoy));
$mes11 = date('Y-m',$mes11);

$mes12 = strtotime('-11 month',strtotime($hoy));
$mes12 = date('Y-m',$mes12);


//CUENTAS POR MESES preCovidPac PAGADOS
$pacientesCount	=	$db->getQueryCount('preCovidPac','*','AND fr LIKE "%'.$mes1.'%"');
$Tmes1 = ($pacientesCount[0]['total']);

$pacientesCount	=	$db->getQueryCount('preCovidPac','*','AND fr LIKE "%'.$mes2.'%"');
$Tmes2 = ($pacientesCount[0]['total']);

$pacientesCount	=	$db->getQueryCount('preCovidPac','*','AND fr LIKE "%'.$mes3.'%"');
$Tmes3 = ($pacientesCount[0]['total']);

$pacientesCount	=	$db->getQueryCount('preCovidPac','*','AND fr LIKE "%'.$mes4.'%"');
$Tmes4 = ($pacientesCount[0]['total']);

$pacientesCount	=	$db->getQueryCount('preCovidPac','*','AND fr LIKE "%'.$mes5.'%"');
$Tmes5 = ($pacientesCount[0]['total']);

$pacientesCount	=	$db->getQueryCount('preCovidPac','*','AND fr LIKE "%'.$mes6.'%"');
$Tmes6 = ($pacientesCount[0]['total']);

$pacientesCount	=	$db->getQueryCount('preCovidPac','*','AND fr LIKE "%'.$mes7.'%"');
$Tmes7 = ($pacientesCount[0]['total']);

$pacientesCount	=	$db->getQueryCount('preCovidPac','*','AND fr LIKE "%'.$mes8.'%"');
$Tmes8 = ($pacientesCount[0]['total']);

$pacientesCount	=	$db->getQueryCount('preCovidPac','*','AND fr LIKE "%'.$mes9.'%"');
$Tmes9 = ($pacientesCount[0]['total']);

$pacientesCount	=	$db->getQueryCount('preCovidPac','*','AND fr LIKE "%'.$mes10.'%"');
$Tmes10 = ($pacientesCount[0]['total']);

$pacientesCount	=	$db->getQueryCount('preCovidPac','*','AND fr LIKE "%'.$mes11.'%"');
$Tmes11 = ($pacientesCount[0]['total']);

$pacientesCount	=	$db->getQueryCount('preCovidPac','*','AND fr LIKE "%'.$mes12.'%"');
$Tmes12 = ($pacientesCount[0]['total']);



?>