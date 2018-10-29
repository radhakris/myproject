<?php
$basePath = "";
$basePath = dirname(dirname(__FILE__));
//echo $path;

// for path related
$conf_path = array();

// for confiuration

// for database
$conf_database = array();


// initialise
$conf= array
	(
		'ROOT_PATH'=>dirname($basePath),
		'BASE_FOLDER_PATH'=>$basePath.'/',
        'CMS_BASE_FOLDER_PATH'=>$basePath.'/scripts/',
		'CMS_TEMPLATE_PATH'=>$basePath . "/module/tpl/",
        'SECURE_PATH'=>$basePath.'/public_html_secure',
	);
$details=array
        (
                'HOSTNAME'=>'localhost',
                'DATABASE'=>'shorthu4_healthy_aahar',
                'USERNAME'=>'root',
                'PASSWORD'=>'net'
        );


$GLOBALS['CONF'] = $conf;
$GLOBALS['DB_DETAILS'] = $details;
//$GLOBALS['DB_DETAILS_SERVER1'] = $details_live_server;

?>
