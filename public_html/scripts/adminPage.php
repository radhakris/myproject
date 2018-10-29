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
			case 'admin-list-apartment':
				$this->listApartment();
			break;
			case 'admin-add-corporate':
				$this->adCorporate();
			break;
			case 'admin_save_corporate':
				$this->saveCorporate();
			break;
			case 'admin_edit_corporate':
				$this->editCorporate();
			break;
			case 'admin_delete_corporate':
				$this->deleteCorporate();
			break;
			case 'admin-list-corporate':
				$this->listCorporate();
			break;
			case 'admin-add-menu':
				$this->addMenu();
			break;
			case 'admin_save_menu':
				$this->saveMenu();
			break;
			case 'admin_save_park':
				$this->savePark();
			break;
			case 'admin_save_company':
				$this->saveCompany();
			break;
			case 'admin_delete_menu':
				$this->deleteMenu();
			break;
			case 'admin_edit_menu':
				$this->editMenu();
			break;
			case 'admin_get_item':
				$this->getItem();
			break;
			case 'admin_fetch_menu_ondate':
				$this->fetchMenuOndate();
			break;
			case 'fetch_company':
				$this->fetchCompany();
			break;
			case 'admin_save_todaymenu':
				$this->saveTodayMenu();
			break;
			case 'admin_delete_todaymenu':
				$this->deleteTodayMenu();
			break;
			case 'admin_upload_item_image':
				$this->uploadItemImage();
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
			$cache_key      = $this->deviceType."_apartment";
			$file_name = 'add-apartment.tpl';
			$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
			$result=$this->dbConn->query("select * from appartment where status=1");
			$row=$result->fetchAll();
			$smarty->assign('data', $row);
			$this->getCounts($smarty);
			echo $smarty->fetch($file_name,$cache_key);
		}else{
			session_destroy();
			header("Location: http://".$_SERVER['SERVER_NAME']."/adminpanel");
		}
	}
	private function listApartment(){
		if(!empty($_SESSION['user_id'])){
			$cache_key      = $this->deviceType."_listapartment";
			$file_name = 'list-apartment.tpl';
			$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
			$result=$this->dbConn->query("select * from appartment where status=1");
			$row=$result->fetchAll();
			$smarty->assign('data', $row);
			$this->getCounts($smarty);
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


	private function adCorporate(){
		if(!empty($_SESSION['user_id'])){
			$cache_key      = $this->deviceType."_login";
			$file_name = 'add-corporate.tpl';
			$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
			$result=$this->dbConn->query("select * from corporate_types where status=1");
			$corp_types=$result->fetchAll();
			$smarty->assign('corp_types', $corp_types);

			$result_p=$this->dbConn->query("select * from it_parks where status=1");
			$it_parks=$result_p->fetchAll();
			$smarty->assign('it_parks', $it_parks);
			
			$result_c=$this->dbConn->query("select * from corp_company_names where status=1");
			$it_comp=$result_c->fetchAll();
			$smarty->assign('it_comp', $it_comp);

			$result=$this->dbConn->query("select * from corporate c inner join corporate_types ct on c.corp_type=ct.id where c.status=1");
			$row=$result->fetchAll();
			for($j=0;$j<count($row);$j++){
				$type=$row[$j]['corp_name'];
				$it=$row[$j]['it_park_name'];
				$resultcop=$this->dbConn->query("select company_name from corp_company_names where id=$type and status=1");
				$rowcomp=$resultcop->fetch();
				if(!empty($it)){
					$resultit=$this->dbConn->query("select park_name from it_parks where id=$it and status=1");
					$rowit=$resultit->fetch();
				}
				$row[$j]['corp_name']=$rowcomp['company_name'];
				$row[$j]['it_park_name']=$rowit['park_name'];
				unset($rowit);unset($rowcomp);
			}
			$this->getCounts($smarty);
			$smarty->assign('data', $row);
			echo $smarty->fetch($file_name,$cache_key);
		}else{
			session_destroy();
			header("Location: http://".$_SERVER['SERVER_NAME']."/adminpanel");
		}
	}
	private function listCorporate(){
		if(!empty($_SESSION['user_id'])){
			$cache_key      = $this->deviceType."_listapartment";
			$file_name = 'list-corporate.tpl';
			$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);

			$result=$this->dbConn->query("select * from corporate c inner join corporate_types ct on c.corp_type=ct.id where c.status=1");
			$row=$result->fetchAll();
			for($j=0;$j<count($row);$j++){
				$type=$row[$j]['corp_name'];
				$it=$row[$j]['it_park_name'];
				$resultcop=$this->dbConn->query("select company_name from corp_company_names where id=$type and status=1");
				$rowcomp=$resultcop->fetch();
				if(!empty($it)){
					$resultit=$this->dbConn->query("select park_name from it_parks where id=$it and status=1");
					$rowit=$resultit->fetch();
				}
				$row[$j]['corp_name']=$rowcomp['company_name'];
				$row[$j]['it_park_name']=$rowit['park_name'];
				unset($rowit);unset($rowcomp);
			}
			$this->getCounts($smarty);
			$smarty->assign('data', $row);
			echo $smarty->fetch($file_name,$cache_key);
		}else{
			session_destroy();
			header("Location: http://".$_SERVER['SERVER_NAME']."/adminpanel");
		}
	}
	private function deleteCorporate(){
		$id=$_REQUEST['id'];
		$result=$this->dbConn->query("delete from corporate where corp_id=".$id);
		if($result){
			echo "1";
		}
	}
	private function editCorporate(){
		$id=$_REQUEST['id'];
		$result=$this->dbConn->query("select * from corporate where corp_id=".$id);
		$row=$result->fetch();
		echo json_encode($row);
	}
	private function saveCorporate(){
		$cid = trim($_POST['cid']);
		$ctype = trim($_POST['corp_type']);
		$it_park_name = trim($_POST['it_park_name']);
		$cname=trim($_POST['cname']);
		$caddress=trim($_POST['caddress']);
		$ccity=trim($_POST['ccity']);
		$cstate=trim($_POST['cstate']);
		$czip=trim($_POST['czip']);
		if(!$cid){
			$aggr_fields[] = "corp_type";
			$aggr_fields[] = "it_park_name";
			$aggr_fields[] = "corp_name";
			$aggr_fields[] = "corp_address";
			$aggr_fields[] = "corp_city";
			$aggr_fields[] = "corp_state";
			$aggr_fields[] = "corp_zip";
			$aggr_fields[] = "corp_added_date";
	
			$aggr_values[] = $ctype;
			$aggr_values[] = $it_park_name;
			$aggr_values[] = $cname;
			$aggr_values[] = $caddress;
			$aggr_values[] = $ccity;
			$aggr_values[] = $cstate;
			$aggr_values[] = $czip;
			$aggr_values[] = date('Y-m-d H:i:s');
			$bool  = $this->dbConn->insert('corporate',$aggr_fields,$aggr_values);
			echo '1';
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
			$bool  = $this->dbConn->update('corporate',$aggr_fields,$aggr_values,$where);
			echo '1';
		}
	}
	private function addMenu(){
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
	private function saveMenu(){
		$mid = trim($_POST['mid']);
		$menutype = trim($_POST['menutype']);
		$item_name = trim($_POST['item_name']);
		$item_prize=trim($_POST['item_prize']);
		$item_sprize=trim($_POST['item_sprize']);
		$item_quantity=trim($_POST['item_quantity']);
		$sel_img=trim($_POST['sel_img']);
		if(!$mid){
			$aggr_fields[] = "type";
			$aggr_fields[] = "name";
			$aggr_fields[] = "price";
			$aggr_fields[] = "sprice";
			$aggr_fields[] = "added_date";
			$aggr_fields[] = "quantity";
			$aggr_fields[] = "image";
	
			$aggr_values[] = $menutype;
			$aggr_values[] = $item_name;
			$aggr_values[] = $item_prize;
			$aggr_values[] = $item_sprize;
			$aggr_values[] = date('Y-m-d H:i:s');
			$aggr_values[] = $item_quantity;
			$aggr_values[] = $sel_img;
			$bool  = $this->dbConn->insert('items',$aggr_fields,$aggr_values);
			echo '1';
		}else{
			$aggr_fields[] = "type";
			$aggr_fields[] = "name";
			$aggr_fields[] = "price";
			$aggr_fields[] = "sprice";
			$aggr_fields[] = "modified_date";
			$aggr_fields[] = "quantity";
			$aggr_fields[] = "image";
	
			$aggr_values[] = $menutype;
			$aggr_values[] = $item_name;
			$aggr_values[] = $item_prize;
			$aggr_values[] = $item_sprize;
			$aggr_values[] = date('Y-m-d H:i:s');
			$aggr_values[] = $item_quantity;
			$aggr_values[] = $sel_img;
			$where= " id=".$mid;
			$bool  = $this->dbConn->update('items',$aggr_fields,$aggr_values,$where);
			echo '1';
		}
	}
	private function savePark(){
		$pid = trim($_POST['pid']);
		$park_name = trim($_POST['parkk_name']);
		if(!$mid){
			$aggr_fields[] = "park_name";
			$aggr_fields[] = "status";
			$aggr_fields[] = "added_date";
	
			$aggr_values[] = $park_name;
			$aggr_values[] = "1";
			$aggr_values[] = date('Y-m-d H:i:s');
			$bool  = $this->dbConn->insert('it_parks',$aggr_fields,$aggr_values);
			echo '1';
		}else{
			$aggr_fields[] = "park_name";

			$aggr_values[] = $park_name;
			$where= " id=".$pid;
			$bool  = $this->dbConn->update('it_parks',$aggr_fields,$aggr_values,$where);
			echo '1';
		}
	}
	private function saveCompany(){
		$cid = trim($_POST['cid']);
		$pid = trim($_POST['it_p_id']);
		$companyy_name = trim($_POST['companyy_name']);
		if(!$cid){
			$aggr_fields[] = "pid";
			$aggr_fields[] = "company_name";
			$aggr_fields[] = "status";
			if($pid=="")
			{
				$pid = 0;
			}
			$aggr_values[] = $pid;
			$aggr_values[] = $companyy_name;
			$aggr_values[] = "1";
			$bool  = $this->dbConn->insert('corp_company_names',$aggr_fields,$aggr_values);
			echo '1';
		}else{
			$aggr_fields[] = "company_name";

			$aggr_values[] = $companyy_name;
			$where= " id=".$cid;
			$bool  = $this->dbConn->update('corp_company_names',$aggr_fields,$aggr_values,$where);
			echo '1';
		}
	}
	private function editMenu(){
		$id=$_REQUEST['id'];
		$result=$this->dbConn->query("select * from items where id=".$id);
		$row=$result->fetch();
		echo json_encode($row);
	}
	private function deleteMenu(){
		$id=$_REQUEST['id'];
		$result=$this->dbConn->query("update items set status=0 where id=".$id);
		if($result){
			echo "1";
		}
	}
	private function getItem(){
		$id=$_REQUEST['id'];
		$result=$this->dbConn->query("select * from items where id=".$id);
		$row=$result->fetch();
		echo json_encode($row);
	}
	private function fetchCompany(){
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
	private function fetchMenuOndate(){
		$date=$_REQUEST['date'];
		$sql="select A.*,B.name from items_open as A,items as B where A.item_id=B.id and A.sale_date='".$date."' and A.status=1";
		$result=$this->dbConn->query($sql);
		$row=$result->fetchAll();
		$output='';
		if(count($row)>0)
		{
			foreach ($row as $key => $value) {
				if($value['is_free']==1)
				{
					$free = "Yes";
				}
				else
				{
					$free = "No";
				}
				$output.='<tr class="forcheckcount">
											<td style="width: 250px;">'.$value['name'].'</td>
											<td>'.$value['item_price'].'</td>
											<td>'.$value['item_sprice'].'</td>
											<td>'.$free.'</td>
											<td>'.$value['free_item_id'].'</td>
											<td><button type="button" name="remove" id="'.$value['name'].'" class="btn btn-danger btn_remove" onclick="deleteTodayMenu(\''.$value['id'].'\')">X</button></td>
										</tr>';
			}
		}
		echo $output;
	}
	private function saveTodayMenu(){
		if(!empty($_REQUEST["item"])){
			$all_items=$_REQUEST["item"];
			$all_price=$_REQUEST["price"];
			$all_sprice=$_REQUEST["sprice"];
			$all_free=$_REQUEST["free"];
			$all_fitem=$_REQUEST["fitem"];
			$all_today_item=$_REQUEST["today_item"];
			$sel_date=$_REQUEST["date"];
			$added_date=date('Y-m-d H:i:s');
			
			for($ja=0;$ja<count($all_items);$ja++){
			    $c_item=$all_items[$ja];
			    $c_price=$all_price[$ja];
			    $c_sprice=$all_sprice[$ja];
			    $c_free=$all_free[$ja];
			    $c_fitem=$all_fitem[$ja];
			    $c_today_item=$all_today_item[$ja];
			    if($c_free!='1'){$c_free='0';}
			    if(!empty($c_item) && !empty($c_price)){
				//if(empty($c_today_item)){
				    $sql = "INSERT INTO items_open(item_id,item_price,item_sprice,is_free,free_item_id,sale_date,added_date)
				    VALUES ('".$c_item."','".$c_price."','".$c_sprice."','".$c_free."','".$c_fitem."','".$sel_date."','".$added_date."')";
				    //echo $sql;
				    $resp=$this->dbConn->query($sql);
				    if($resp){
					echo '1';
				    }
				//}else{
				//    echo 'update';
				//}
			    }
			}
		}
	}
	private function deleteTodayMenu(){
		$id=$_REQUEST['id'];
		$result=$this->dbConn->query("update items_open set status=0 where id=".$id);
		if($result){
			echo "1";
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
	private function uploadItemImage(){
		$msg = "";
		$valid_formats = array("jpg", "jpeg","png");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
			$_FILES['article_img'] = $_FILES['file'];
			$pathinfo = pathinfo($_FILES['article_img']['name']);
			$name_with_real_ext = str_replace(".",'-',$pathinfo['filename']).".".$pathinfo['extension'];

			$name = strtolower(str_replace(array(' ','_'),array('','-'),$name_with_real_ext));
			$name = preg_replace('@[^a-z-_0-9\.]+@i','',$name);
			$size = $_FILES['article_img']['size'];
			$kbs = $fsize = $size/1024;
			if($kbs >= 1024){
				$fsize= round($kbs/1024);
				$fsize.=" mb";
			}else{
				$fsize=round($fsize)." kb";
			}
				$temp_name=$tmp = $_FILES['article_img']['tmp_name'];
				list($width, $height)= getimagesize($tmp);
				$max_width =  150;
				$max_height =  150;
				$imagename=$pathinfo['filename']."-".time().".".$pathinfo['extension'];
				if(strlen($name)){
				//echo $name."---------";
				$ext = strtolower(substr($name,strrpos($name,'.',-1)+1));
				if(in_array(strtolower($ext),$valid_formats)){
					//if($size<(300*1024)){
					//if(($width == $max_width && $height == $max_height)){
					$this->postedValue['info']['image_name'] = $tmp;
						$sourcefile = $this->postedValue['info']['image_name'];
						$setting_path = $GLOBALS['CONF']['BASE_FOLDER_PATH'].'/img/';
						$target_path = $setting_path.$imagename;
						//echo $target_path."-----------------";
						//var_dump(move_uploaded_file($temp_name, $target_path));
						if(move_uploaded_file($temp_name, $target_path)) {
							echo $msg = $imagename;
						}
					if($msg!=''){
						$msg = $msg ;
					}else
						$err = "failed";
					//}else
							//$err = "Image should be equal to 150x150.";
					//}else
					//        $err = "Size should be < 100 KB";
				}else
						$err = "Invalid image format..";
				}else
						$err = "Please select image..!";
				echo $err."::".$msg."::".$width."x".$height;
				exit;
		}
	}
	private function showDashboard(){
		if(!empty($_SESSION['user_id'])){
			$cache_key      = $this->deviceType."_admindash";
			$file_name = 'admin-dash.tpl';
			//exit('ffff');
			$smarty       = $this->checkSmartyCache($cache_key,$file_name,0);
			$this->getCounts($smarty);
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
	public function getCounts($smarty){
		//for apartment count start
		$result=$this->dbConn->query("select count(*) as acnt from appartment where status=1");
		$row=$result->fetch();
		$this->acnt= $row['acnt'];
		//for apartment count ends
		//for corporate count start
		$result=$this->dbConn->query("select count(*) as ccnt from corporate where status=1");
		$row=$result->fetch();
		$this->ccnt= $row['ccnt'];
		//for corporate count ends
		//for Menu count start
		$result=$this->dbConn->query("select count(*) as items from items where status=1");
		$row=$result->fetch();
		$this->items= $row['items'];
		//for Menu count ends
		$smarty->assign('acnt', $this->acnt);
		$smarty->assign('ccnt', $this->ccnt);
		$smarty->assign('items', $this->items);
	}
	
	
}//End of Class


?>
