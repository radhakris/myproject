<?php
require_once('config.php');
$path = $GLOBALS['CONF']['ROOT_PATH'];
require($path.'/Smarty-3.1.12/libs/Smarty.class.php');
class SMART 
{
	public function __construct()
	{
		$server_root_path= $path = $GLOBALS['CONF']['SECURE_PATH'];
		//echo $path;exit('hhhhhhh');
		$this->smarty = new Smarty;
		$this->smarty->template_dir = $server_root_path."/templates/";
		$this->smarty->compile_dir  = $server_root_path."/templates/templates_c/";
		$this->smarty->config_dir   = $server_root_path."/templates/configs/";
		$this->smarty->cache_dir = $server_root_path."/templates/cache/";
		$this->smarty->caching = false; 

		$this->smarty->loadFilter("output","trimwhitespace");
		$_SESSION['SUPER_CACHE_DIR'] =  $_SESSION['BROWSER_OUT_DIR'] . 'supercache/';
	}
	public function getSmarty()
	{
		return $this->smarty;
	}
}

?>
