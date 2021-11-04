<?php
date_default_timezone_set('America/Mazatlan');
setlocale(LC_ALL, 'es_MX');

include_once('include/Database.php');
define('SS_DB_NAME', 'grupoar6_koby');
define('SS_DB_USER', 'grupoar6_koby');
define('SS_DB_PASSWORD', 'Y.y?a}BGjs(F');
define('SS_DB_HOST', 'localhost');
define('NAME_PROJECT', 'Print Block');

$dsn	= 	"mysql:dbname=".SS_DB_NAME.";host=".SS_DB_HOST."";
$pdo	=	"";
try {
	$pdo = new PDO($dsn, SS_DB_USER, SS_DB_PASSWORD);
}catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$db 	=	new Database($pdo);

?>