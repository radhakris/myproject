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
class userPage extends common
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
			case 'register':
				$this->loadRegPage();
			break;
			case 'register-user':
				$this->saveRegPage();
			break;
			case 'login':
				$this->loadLoginPage();
			break;
			case 'login-user':
				$this->checkLogin();
			break; 
		}
	}
	private function saveRegPage(){
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
		{
			$sql = $this->dbConn->query("SELECT uid FROM coco_user WHERE email='".trim($_POST['email'])."' limit 1");
                        $res = $sql->fetch(PDO::FETCH_ASSOC);
			if(empty($res['uid'])){
				$firstname=$_POST['firstname'];
				$lastname=$_POST['lastname'];
				$phonenumber=$_POST['phonenumber'];
				$email = $_POST['email'];
				$password=md5($_POST['password']);
				$ip_address = $this->getLocalIPAddress();
				if($ip_address['pip_address'] !="")
					$loggedipadd = $ip_address['pip_address'];
				else
					$loggedipadd = $ip_address['ip_address'];
				$aggr_fields[] = "first_name";
				$aggr_fields[] = "last_name";
				$aggr_fields[] = "email";
				$aggr_fields[] = "phone_number";
				$aggr_fields[] = "password";
				$aggr_fields[] = "ip_address";
				$aggr_fields[] = "status";
		
				$aggr_values[] = $firstname;
				$aggr_values[] = $lastname;
				$aggr_values[] = $email;
				$aggr_values[] = $phonenumber;
				$aggr_values[] = $password;
				$aggr_values[] = $loggedipadd;
				$aggr_values[] = 1;
				$bool  = $this->dbConn->insert('coco_user',$aggr_fields,$aggr_values);
				echo "1:Successfully Registered.";
			}else{
				echo "0:This Email Is Already Registered With Us.";
			}
		}else{
			exit('Something Wrong');
		}
	}
	private function loadRegPage(){
		$cache_key      = $this->deviceType."_register";
		$file_name = 'register.tpl';
		$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
		//var_dump($smarty);
		echo $smarty->fetch($file_name,$cache_key);
	}
	private function loadLoginPage(){
		$cache_key      = $this->deviceType."_login";
		$file_name = 'login.tpl';
		//exit('ffff');
		$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
		
		echo $smarty->fetch($file_name,$cache_key);
	}
	private function checkLogin(){
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
		{
			$email = trim($_POST['email']);
			echo $_POST['password'];
			$password=md5(trim($_POST['password']));
			echo $email;
			echo $password;
			if(!empty($email) && !empty($password)){
				$condition  = "email = '".$email."' and password ='".$password."' and status =1";
				$table      = 'coco_user';
				$fields     = 'first_name,last_name,uid,email,status';
				$result     = $this->dbConn->select($fields,$table,$condition,'','',0,1);
				var_dump($result);
				$row=$result->fetchAll();
				if(empty($row) || $error==1)
				{
					$ip_address = $this->getLocalIPAddress();
					if($ip_address['pip_address'] !="")
						$loggedipadd = $ip_address['pip_address'];
					else
						$loggedipadd = $ip_address['ip_address'];
					$aggr_fields[] = "ip_address";
					$aggr_values[] = $loggedipadd;
					$bool  = $this->dbConn->insert('coco_check_brutal',$aggr_fields,$aggr_values);
					exit('0:Please enter Valid User name and Password');	
				}else{
					if($row[0]['status']==0){
					exit('Please activate the account');
					}else{
					$_SESSION['user_name']=$row[0]['first_name'].' '.$row[0]['last_name'];
					$_SESSION['email']=$row[0]['email'];
					$_SESSION['user_id']=$row[0]['uid'];
					echo "1:Please Wiat.";
					var_dump($_SESSION);
					}
				}
			}else{
				exit('0:Please Enter Both Email and Password.');
			}
		}else{
			exit('Something Wrong');
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
        private function sendresetlink()
	{
	    $username_ajax=$_GET['uname'];
	    $sql_ajax_query = $this->dbConn->query("SELECT user_id,login_name,email from users where login_name='$username_ajax' limit 1");
	    $res_ajax = $sql_ajax_query->fetch(PDO::FETCH_ASSOC);
	    $user_id=$res_ajax['user_id'];
	    $secret_key = "one_reset_1258$5%&";
	    $iv=rand(10,1000);
	    $ivenc=base64_encode($iv);
	    $encrypted_string = openssl_encrypt($user_id,  'AES-128-CBC', $secret_key, OPENSSL_RAW_DATA, $iv);
	    $encrypt_string = base64_encode($encrypted_string);
	    if($user_id!=''){
			 $this->objMailer 	= scripts_Mailer::createInstance();
			$subject        = 'Password Reset Link';
			$messagebody    = 'Hi '.$res_ajax['login_name'].',<br /><br /> Click on the below link to reset the password.<br /><br />';
			$messagebody   .= '<a href = "http://jupiter.greynium.com/index.php?module=user&class=UserManagement&action=reset&tem='.$ivenc.'&link='. $encrypt_string .'">Click here..!</a><br/><br/>OR <br/><br/>';
					    $messagebody   .= '<a href = "http://venus.greynium.com//index.php?module=user&class=UserManagement&action=reset&tem='.$ivenc.'&link='. $encrypt_string .'">Click here..!</a><br/><br/>';
			$messagebody   .= '--------------------------<br/>Thanks & Regards,<br/><b>CMS Admin</b>';
			$mailcontent = array("from"     => 'cms-support@oneindia.co.in',
			"fromname" => 'CMS Admin',
			"to"       => $res_ajax['email'],
			"cc"       => 'cms-alerts@oneindia.co.in',
			"toname"   => $res_ajax['login_name'],
			"subject"  => $subject,
			"body"     => $messagebody,
			"mailtype" => 'html' );
			$this->objMailer->sendMail($mailcontent);
			unset($mailcontent);unset($subject);unset($messagebody);
			echo "Password reset link sent to your email id..!";
			header( "refresh:2;url=http://jupiter.greynium.com/index.php?module=user&class=UserManagement&action=login" );
	     }
	     else
	     {
		echo "Please provide correct username..!";
		header( "refresh:2;url=http://jupiter.greynium.com/index.php?module=user&class=UserManagement&action=login" );
	     }
	
	}
	
	
	
}//End of Class


?>
