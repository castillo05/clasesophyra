<?php
    namespace config;
    //Propiedades de Base de Datos
    define('DB_HOST','localhost:3308');
    define('DB_USUARIO','root');
	define('DB_PASSWORD','');
	define('DB_NOMBRE','curso');
    //Propiedades del Site
    define('SITE_URL','localhost/ProyectoVentas');
    define('SITE_NAME', 'ProyectoVentas');
    //Propiedades de logger de mensajes
    $rutaaux=$_SERVER["DOCUMENT_ROOT"].'/ProyectoVentas/logs';
    define('LOG_FILES_URL',$rutaaux);
?>