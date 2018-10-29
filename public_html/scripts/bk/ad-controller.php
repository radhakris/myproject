<?php
//ob_start();
error_reporting(0);
session_start();
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once('detectDevice.php');
$obj_controller = new controller();
$obj_controller->init();

class controller {
	public function __construct(){
		$this->deviceType="";
		$this->detect = new Mobile_Detect;
		//$this->deviceType = ($this->detect->isMobile() ? ($this->detect->isTablet() ? 'tablet' : 'phone') : 'computer');
		$this->deviceType = ($this->detect->isMobile() ? ($this->detect->isTablet() ? 'computer' : 'phone') : 'computer');
		$this->mobileOSType = $this->detect->isiOS() ? "2" : ($this->detect->isAndroidOS() ? '1' : '0');
		$_SERVER['devicetype'] = $this->deviceType;
	
		////for preload
		//$preload='';
		//if($this->deviceType == "phone"){
		//		$version='v=1.0.16';
		//		header('Link: </common/build/js/webfont.min.js>; rel=preload; as=script; nopush, </common/app/lib/require-latest.js>; rel=preload; as=script; nopush,</common/build/js/oiframework-mobi-app.min.js?'.$version.'>;rel=preload; as=script; nopush');
		//}else{ echo "dddddddddd";
		//		$version='v=1.0.1';
		//		header('Link: </common/build/js/webfont.min.js>; rel=preload; as=script; nopush, </common/app/lib/require-latest.js>; rel=preload; as=script; nopush');
		//}
		////for preload

			// module logic needs to be decided. 
			$this->module = $_REQUEST['module']!='' ? $_REQUEST['module'] : 'article';
	}
	public function init(){
		$properties = $_GET;
		$properties['deviceType'] = $this->deviceType;
		if($this->deviceType=='phone'){exit('Mobile Site Under Construction, please check on Computer');}
		$properties['mobileOSType'] = $this->mobileOSType;
		$properties['module'] = $this->module;
		//var_dump($properties);
		if($_SERVER['argv'][1] != ""){
                        $this->module = $_SERVER['argv'][1];
                }
		switch($this->module){
			case 'adminpanel':
				require_once('adminPage.php');
				$obj = new adminPage($properties);
				$obj->init();
			break;
			case 'adminpanel-login':
				require_once('adminPage.php');
				$obj = new adminPage($properties);
				$obj->init();
			break;
			case 'adminpanel-logout':
				session_destroy();
			break;
			case 'admin-dashboard':
				require_once('adminPage.php');
				$obj = new adminPage($properties);
				$obj->init();
			break;
			case 'admin-add-apartment':
				require_once('adminPage.php');
				$obj = new adminPage($properties);
				$obj->init();
			break;
			case 'admin_save_apartment':
				require_once('adminPage.php');
				$obj = new adminPage($properties);
				$obj->init();
			break;
			case 'admin_edit_apartment':
				require_once('adminPage.php');
				$obj = new adminPage($properties);
				$obj->init();
			break;
			case 'admin_delete_apartment':
				require_once('adminPage.php');
				$obj = new adminPage($properties);
				$obj->init();
			break;
		}
	}
}	
?>
