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
class adminPage extends common
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
		//var_dump($this->postedValue);
		$type = $this->postedValue['module'];	
		switch($type){
			case 'adminpanel':
				$this->loadLoginPage();
			break;
			case 'adminpanel-login':
				$this->checkLogin();
			break;
			case 'admin-dashboard':
				$this->showDashboard();
			break;
			case 'admin-add-apartment':
				$this->adApartment();
			break;
			case 'admin_save_apartment':
				$this->saveApartment();
			break;
			case 'admin_edit_apartment':
				$this->editApartment();
			break;
			case 'admin_delete_apartment':
				$this->deleteApartment();
			break;
		}
	}
	private function loadLoginPage(){
		if(empty($_SESSION['user_id'])){
			$cache_key      = $this->deviceType."_login";
			$file_name = 'login.tpl';
			$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
			echo $smarty->fetch($file_name,$cache_key);
		}else{
			header("Location: http://".$_SERVER['SERVER_NAME']."/admin-dashboard");
		}
	}
	private function adApartment(){
		if(!empty($_SESSION['user_id'])){
			$cache_key      = $this->deviceType."_login";
			$file_name = 'add-apartment.tpl';
			$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
			$result=$this->dbConn->query("select * from appartment where status=1");
			$row=$result->fetchAll();
			$smarty->assign('data', $row);
			echo $smarty->fetch($file_name,$cache_key);
		}else{
			session_destroy();
			header("Location: http://".$_SERVER['SERVER_NAME']."/adminpanel");
		}
	}
	private function deleteApartment(){
		$id=$_REQUEST['id'];
		$result=$this->dbConn->query("delete from appartment where id=".$id);
		if($result){
			echo "1";
		}
	}
	private function editApartment(){
		$id=$_REQUEST['id'];
		$result=$this->dbConn->query("select * from appartment where id=".$id);
		$row=$result->fetch();
		echo json_encode($row);
	}
	private function saveApartment(){
		$aid = trim($_POST['aid']);
		$aname=trim($_POST['aname']);
		$aaddress=trim($_POST['aaddress']);
		$acity=trim($_POST['acity']);
		$astate=trim($_POST['astate']);
		$azip=trim($_POST['azip']);
		if(!$aid){
			$aggr_fields[] = "name";
			$aggr_fields[] = "address";
			$aggr_fields[] = "city";
			$aggr_fields[] = "state";
			$aggr_fields[] = "zip";
			$aggr_fields[] = "added_date";
	
			$aggr_values[] = $aname;
			$aggr_values[] = $aaddress;
			$aggr_values[] = $acity;
			$aggr_values[] = $astate;
			$aggr_values[] = $azip;
			$aggr_values[] = date('Y-m-d H:i:s');
			$bool  = $this->dbConn->insert('appartment',$aggr_fields,$aggr_values);
			echo '1';
		}else{
			$aggr_fields[] = "name";
			$aggr_fields[] = "address";
			$aggr_fields[] = "city";
			$aggr_fields[] = "state";
			$aggr_fields[] = "zip";
			$aggr_fields[] = "modified_date";
	
			$aggr_values[] = $aname;
			$aggr_values[] = $aaddress;
			$aggr_values[] = $acity;
			$aggr_values[] = $astate;
			$aggr_values[] = $azip;
			$aggr_values[] = date('Y-m-d H:i:s');
			$where= " id=".$aid;
			$bool  = $this->dbConn->update('appartment',$aggr_fields,$aggr_values,$where);
			echo '1';
		}
	}
	private function checkLogin(){
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
		{
			$email = trim($_POST['email']);
			$password=md5(trim($_POST['password']));
			
			if(!empty($email) && !empty($password)){
				$condition  = "email = '".$email."' and password ='".$password."'";
				$table      = 'aahar_main_user';
				$fields     = '*';
				$result     = $this->dbConn->select($fields,$table,$condition,'','',0,1);
				
				$row=$result->fetchAll();
				if(empty($row) || $error==1)
				{
					exit('0:Please enter Valid User name and Password');	
				}else{
					$_SESSION['user_name']=$row[0]['name'];
					$_SESSION['email']=$row[0]['email'];
					$_SESSION['user_id']=$row[0]['id'];
					echo "1:Please Wiat.";
					//header("Location: http://".$_SERVER['SERVER_NAME']."/admin-dashboard");
				}
			}else{
				exit('0:Please Enter Both Email and Password.');
			}
		}else{
			exit('Something Wrong');
		}
	}
	private function showDashboard(){
		if(!empty($_SESSION['user_id'])){
			$cache_key      = $this->deviceType."_admindash";
			$file_name = 'admin-dash.tpl';
			//exit('ffff');
			$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
			
			echo $smarty->fetch($file_name,$cache_key);
		}else{
			header("Location: http://".$_SERVER['SERVER_NAME']."/adminpanel");
		}
	}
	public function getLocalIPAddress()
	{
		$temp = array();
		if (getenv(HTTP_X_FORWARDED_FOR)) {
			$pipaddress = getenv(HTTP_X_FORWARDED_FOR);
			$ipaddress = getenv(REMOTE_ADDR);
			$temp['pip_address'] = $pipaddress;
			$temp['ip_address'] = $ipaddress;
		} else {
			$ipaddress = getenv(REMOTE_ADDR);
			$temp['ip_address'] = $ipaddress;
		} 
		return $temp;
	}
        
	
	
	
}//End of Class


?>
