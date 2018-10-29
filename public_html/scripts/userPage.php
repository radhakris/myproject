<?php
require_once('config.php');
require_once('Database.php');
require_once('Mysql.php');
require_once('common.php');
require_once('sanitise.php');
if($_REQUEST['test']==1)
{
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
}
ini_set('magic_quotes_gpc','off');
if(get_magic_quotes_gpc()) {
        function stripslashes_gpc(&$value){
                $value = stripslashes($value);
        }
        array_walk_recursive($_GET, 'stripslashes_gpc');
        array_walk_recursive($_REQUEST, 'stripslashes_gpc');
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
		$type = $this->postedValue['module'];
		switch($type){
			case 'register':
				$this->registerPage();
			break;
			case 'login':
				$this->loginPage();
			break;
			case 'profile':
				$this->profilePage();
			break;
			case 'check_login':
				$this->checkLogin();
			break;
			case 'fetch_company_front':
				$this->fetchCompanyFront();
			break;
			case 'save_registration':
				$this->save_registration();
			break;
			case 'order_food':
				$this->orderFood();
			break;
			case 'add-to-cart':
				$this->addToCart();
			break;
			case 'checkout':
				$this->checkOut();
			break;
		}
	}

	private function registerPage(){
		$cache_key      = $this->deviceType."_regipage";
		$file_name = 'register.tpl';
		$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
		$result=$this->dbConn->query("select * from appartment where status=1");
		$row=$result->fetchAll();
		$smarty->assign('apartment_data', $row);
		$result_it=$this->dbConn->query("select * from it_parks where status=1");
		$row_it=$result_it->fetchAll();
		$smarty->assign('it_data', $row_it);

		$result_ind=$this->dbConn->query("select * from corp_company_names where pid=0");
		$row_ind=$result_ind->fetchAll();
		$smarty->assign('ind_com_data', $row_ind);
		echo $smarty->fetch($file_name,$cache_key);
	}

	private function loginPage(){
		$cache_key      = $this->deviceType."_loginpage";
		$file_name = 'login.tpl';
		$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
		/*$result=$this->dbConn->query("select * from appartment where status=1");
		$row=$result->fetchAll();*/
		echo $smarty->fetch($file_name,$cache_key);
	}
	private function profilePage(){
		$cache_key      = $this->deviceType."_profilepage";
		$file_name = 'profile.tpl';
		$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
		if($_SESSION['user_id']!="" && $_SESSION['user_name']!="")
		{
			$smarty->assign('sess_user_id', $_SESSION['user_id']);
			$smarty->assign('sess_user_name', $_SESSION['user_name']);
		}
		/*$result=$this->dbConn->query("select * from appartment where status=1");
		$row=$result->fetchAll();*/
		echo $smarty->fetch($file_name,$cache_key);
	}
	private function checkLogin(){
		$email_id = trim($_REQUEST['login_email']);
		$password = trim($_REQUEST['login_password']);

		$result=$this->dbConn->query("select * from aahar_users where email='".$email_id."' and password='".$password."'");
		$row=$result->fetchAll();
		if(count($row)>0)
		{		
			foreach ($row as $key => $value) {
				$user_id = $value['user_id'];
				$user_name = $value['first_name'];
			}
			session_start();
			$_SESSION['user_id'] = $user_id;
			$_SESSION['user_name'] = $user_name;
			echo 'success';
		}
		else
		{
			echo "The Username or password you entered is incorrect.";
		}
		exit;
		
	}

	private function fetchCompanyFront(){
		$id=$_REQUEST['id'];
		$corp_type = $_REQUEST['corp_type'];
		if($corp_type=="2")
		{
			$id=0;
		}
		$result=$this->dbConn->query("select * from corp_company_names where pid=".$id);
		$row=$result->fetchAll();
		$op='<option value="">Please select Company Name</option>';
		foreach ($row as $key => $value) {
			$op.='<option value="'.$value['id'].'">'.$value['company_name'].'</option>';
		}
		echo $op;
	}
	private function save_registration(){
		$uid = trim($_REQUEST['uid']);
		if(!$uid && $_REQUEST['email_id']!="")
		{
			$email_id = trim($_REQUEST['email_id']);
			$check_email = $this->dbConn->query("select * from aahar_users where email='".$email_id."'");
			$row=$check_email->fetchAll();
			if(count($row)>0)
			{
				echo "Email Id Already Existed.Please Login To Continue.";
				exit;
			}
		}
		$user_type = trim($_REQUEST['reg_type']);
		$apartment_id = trim($_REQUEST['apartment_name']);
		$it_park_id = trim($_REQUEST['it_park_name']);
		$company_id = trim($_REQUEST['it_company_name']);
		$first_name = trim($_REQUEST['first_name']);
		$last_name = trim($_REQUEST['last_name']);
		$email=trim($_REQUEST['email_id']);
		$password=trim($_REQUEST['password']);
		$mobile=trim($_REQUEST['mobile_number']);
		$status=1;
		if($user_type=="it_park")
		{
			$user_type=1;
		}
		elseif($user_type=="non_it_park")
		{
			$user_type=2;
		}
		else
		{
			$user_type=3;
		}
		if(!$cid){
			$aggr_fields[] = "first_name";
			$aggr_fields[] = "last_name";
			$aggr_fields[] = "email";
			$aggr_fields[] = "password";
			$aggr_fields[] = "mobile";
			$aggr_fields[] = "user_type";
			$aggr_fields[] = "it_park_id";
			$aggr_fields[] = "company_id";
			$aggr_fields[] = "apartment_id";
			$aggr_fields[] = "status";
			$aggr_fields[] = "added_date";
	
			$aggr_values[] = $first_name;
			$aggr_values[] = $last_name;
			$aggr_values[] = $email;
			$aggr_values[] = $password;
			$aggr_values[] = $mobile;
			$aggr_values[] = $user_type;
			$aggr_values[] = $it_park_id;
			$aggr_values[] = $company_id;
			$aggr_values[] = $apartment_id;
			$aggr_values[] = $status;
			$aggr_values[] = date('Y-m-d H:i:s');
			$bool  = $this->dbConn->insert('aahar_users',$aggr_fields,$aggr_values);
			echo 'success';
		}else{
			$aggr_fields[] = "corp_type";
			$aggr_fields[] = "it_park_name";
			$aggr_fields[] = "corp_name";
			$aggr_fields[] = "corp_address";
			$aggr_fields[] = "corp_city";
			$aggr_fields[] = "corp_state";
			$aggr_fields[] = "corp_zip";
			$aggr_fields[] = "corp_modified_date";
	
			$aggr_values[] = $ctype;
			$aggr_values[] = $it_park_name;
			$aggr_values[] = $cname;
			$aggr_values[] = $caddress;
			$aggr_values[] = $ccity;
			$aggr_values[] = $cstate;
			$aggr_values[] = $czip;
			$aggr_values[] = date('Y-m-d H:i:s');
			$where= " corp_id=".$cid;
			$bool  = $this->dbConn->update('aahar_users',$aggr_fields,$aggr_values,$where);
			echo '1';
		}
	}
	private function orderFood(){
		$sel_date=$_REQUEST['sel_date'];
		$tomorrow=date('Y-m-d',strtotime("+1 days"));
		$weekDay = date('w', strtotime($tomorrow));
		$weekarray=array();
		$weektdate=$tomorrow;
		for($i = 0; $i < 7; $i++){
			$weekday = date('l', strtotime($weektdate));
			$weekarray[]=array('day'=>$weekday,'date'=>$weektdate);
			$weektdate=date('Y-m-d', strtotime($weektdate . ' +1 day'));
		}
		$cache_key      = $this->deviceType."_order_food".$tomorrow;
		$file_name = 'order_food.tpl';
		$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
		//$sql="select A.*,B.name from items_open as A,items as B where A.item_id=B.id and A.sale_date='".$tomorrow."' and A.status=1";
		$cart_date=$tomorrow;
		if(!empty($sel_date)){
			//$sql="select A.*,B.name from items_open as A,items as B where A.item_id=B.id and A.sale_date='".$sel_date."' and A.status=1";
			$cart_date=$sel_date;
		}
		$sql="select *,id as item_id from items where status=1";
		$result=$this->dbConn->query($sql);
		$row=$result->fetchAll();
		//$sqlcn = $this->dbConn->query("SELECT count(cid) as cnt FROM aahar_cart WHERE user='".$_SESSION['user_id']."'");
		$sqlcn = $this->dbConn->query("SELECT count(cid) as cnt FROM aahar_cart WHERE user=1");
		$listcn = $sqlcn->fetch(PDO::FETCH_ASSOC);
		$smarty->assign('data', $row);
		$smarty->assign('days', $weekarray);
		$smarty->assign('sel_date', $sel_date);
		$smarty->assign('cart_date', $cart_date);
		$smarty->assign('checkout', $listcn['cnt']);
		echo $smarty->fetch($file_name,$cache_key);
	}
	private function addToCart(){
		$ref=$_SERVER['HTTP_REFERER'];
		if(preg_match("@order_food@",$ref)){
			$usrid=$_REQUEST['usrid'];
			$date=$_REQUEST['date'];
			$price=$_REQUEST['price'];
			$item=$_REQUEST['item'];
			$sqlch = $this->dbConn->query("SELECT cid FROM aahar_cart WHERE item =".$item." and date='".$date."' and user=".$usrid." limit 1");
			$listch = $sqlch->fetch(PDO::FETCH_ASSOC);
			if(empty($listch['cid']))
			{
				$aggr_fields[] = "item";
				$aggr_fields[] = "date";
				$aggr_fields[] = "price";
				$aggr_fields[] = "user";
						
				$aggr_values[] = $item;
				$aggr_values[] = $date;
				$aggr_values[] = $price;
				$aggr_values[] = $usrid;
				$bool  = $this->dbConn->insert('aahar_cart',$aggr_fields,$aggr_values);
			}
			$sqlcn = $this->dbConn->query("SELECT count(cid) as cnt FROM aahar_cart WHERE user=".$usrid);
			$listcn = $sqlcn->fetch(PDO::FETCH_ASSOC);
			echo $listcn['cnt'];
		}
	}
	private function checkOut(){
		$cache_key      = $this->deviceType."_order_food".$tomorrow;
		$file_name = 'checkout.tpl';
		$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
		//$sqlcn = $this->dbConn->query("SELECT * FROM aahar_cart WHERE user='".$_SESSION['user_id']."'");
		$sqlcn = $this->dbConn->query("SELECT * FROM aahar_cart WHERE user=1");
		$listcn = $sqlcn->fetchAll(PDO::FETCH_ASSOC);
		$smarty->assign('checkoutdata', $listcn);
		echo $smarty->fetch($file_name,$cache_key);
	}
}//End of Class


?>
