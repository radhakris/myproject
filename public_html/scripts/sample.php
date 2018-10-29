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
//		error_reporting(E_ALL);
//ini_set('display_errors', 1);
		$type = $this->postedValue['module'];
		switch($type){
			case '':
				$this->s1();
			break;
		}
	}
	private function s1(){
		if(!empty($_SESSION['user_id'])){
			$cache_key      = $this->deviceType."_addmenu";
			$file_name = 'add-menu.tpl';
			$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
			$result=$this->dbConn->query("select * from items where status=1");
			$row=$result->fetchAll();
			$smarty->assign('data', $row);
			$this->getCounts($smarty);
			//for getting menu dropdown
			$sqld="select * from items where status=1";
			$results=$this->dbConn->query($sqld);
			$items=$results->fetchAll();
			$htmlcode='<option value="0">Select Item</option>';
			$htmlcodefree='<option value="0">Select Item</option>';
			for($ja=0;$ja<count($items);$ja++){
				$id=$items[$ja]['id'];
				$name=$items[$ja]['name'];
				$type=$items[$ja]['type'];
				$htmlcode.='<option value="'.$id.'">'.$name." - (".$type.')</option>';
				$htmlcodefree.='<option value="'.$name.'">'.$name." - (".$type.')</option>';
			}
			$smarty->assign('htmlcode', $htmlcode);
			$smarty->assign('htmlcodefree', $htmlcodefree);
			//for getting menu dropdown
			//for getting counts of today menu
			if($_REQUEST['date']=="")
			{
				$yesterday=date('Y-m-d',strtotime("+1 days"));
			}
			else
			{
				$yesterday=$_REQUEST['date'];
			}
			$sql="select A.*,B.name from items_open as A,items as B where A.item_id=B.id and A.sale_date='".$yesterday."' and A.status=1";
			$result=$this->dbConn->query($sql);
			$row=$result->fetchAll();
			$smarty->assign('items_open', $row);
			$smarty->assign('yesterday', $yesterday);
			//for getting counts fo today menu ends
			echo $smarty->fetch($file_name,$cache_key);
		}else{
			session_destroy();
			header("Location: http://".$_SERVER['SERVER_NAME']."/adminpanel");
		}
	}
	private function s2(){
		$mid = trim($_POST['mid']);
		$menutype = trim($_POST['menutype']);
		$item_name = trim($_POST['item_name']);
		$item_prize=trim($_POST['item_prize']);
		$item_sprize=trim($_POST['item_sprize']);
		$item_quantity=trim($_POST['item_quantity']);
		if(!$mid){
			$aggr_fields[] = "type";
			$aggr_fields[] = "name";
			$aggr_fields[] = "price";
			$aggr_fields[] = "sprice";
			$aggr_fields[] = "added_date";
			$aggr_fields[] = "quantity";
	
			$aggr_values[] = $menutype;
			$aggr_values[] = $item_name;
			$aggr_values[] = $item_prize;
			$aggr_values[] = $item_sprize;
			$aggr_values[] = date('Y-m-d H:i:s');
			$aggr_values[] = $item_quantity;
			$bool  = $this->dbConn->insert('items',$aggr_fields,$aggr_values);
			echo '1';
		}else{
			$aggr_fields[] = "type";
			$aggr_fields[] = "name";
			$aggr_fields[] = "price";
			$aggr_fields[] = "sprice";
			$aggr_fields[] = "modified_date";
			$aggr_fields[] = "quantity";
	
			$aggr_values[] = $menutype;
			$aggr_values[] = $item_name;
			$aggr_values[] = $item_prize;
			$aggr_values[] = $item_sprize;
			$aggr_values[] = date('Y-m-d H:i:s');
			$aggr_values[] = $item_quantity;
			$where= " id=".$mid;
			$bool  = $this->dbConn->update('items',$aggr_fields,$aggr_values,$where);
			echo '1';
		}
	}
	
	
}//End of Class


?>
