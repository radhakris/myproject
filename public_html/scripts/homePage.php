<?php
require_once('config.php');
require_once('Database.php');
require_once('Mysql.php');
require_once('common.php');
require_once('sanitise.php');
ini_set('magic_quotes_gpc','off');
if(get_magic_quotes_gpc()) {
        function stripslashes_gpc(&$value){
                $value = stripslashes($value);
        }
        array_walk_recursive($_GET, 'stripslashes_gpc');
        array_walk_recursive($_POST, 'stripslashes_gpc');
        array_walk_recursive($_COOKIE, 'stripslashes_gpc');
        array_walk_recursive($_REQUEST, 'stripslashes_gpc');
}

class homePage extends common
{
	private $postedValue;
	private $dbConn;
	public $error_message;
	public function __construct( $postedValue='' ){
		if(empty($postedValue))
			$this->postedValue  = null;
		else 
			$this->postedValue  = $postedValue;
			
		$this->error_message	= '';
		$this->deviceType=$this->postedValue['deviceType'];
               
		$this->dbConn       = includes_Mysql::getInstance();
	}
	public function init() {
		$type = $this->postedValue['module'];
		switch($type){
			case 'homepage':
				$this->fetchHomePage();
			break;
			case 'register':
				$this->registerPage();
			break;
		}
	}
	private function fetchHomePage(){
		$cache_key      = $this->deviceType."_homepage";
		$file_name = 'home.tpl';
		$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
		$result=$this->dbConn->query("select * from items where status=1");
		$row=$result->fetchAll();
		$smarty->assign('data', $row);
		echo $smarty->fetch($file_name,$cache_key);
	}
}//End of Class


?>
