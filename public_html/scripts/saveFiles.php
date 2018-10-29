<?php
/**
* Handles all apis like to fetch latest articles or articles related to a specific tag or photo feature article
*
* Version 1.0
*
* @author  Jagannath Behera <jagannath.b@oneindia.co.in>
* @created  20-June-2014
* @copyright  2014-2016 Oneindia
*/

require_once('config.php');
require_once('Database.php');
require_once('Mysql.php');

if(get_magic_quotes_gpc()) {
        function stripslashes_gpc(&$value){
                $value = stripslashes($value);
        }
        array_walk_recursive($_GET, 'stripslashes_gpc');
        array_walk_recursive($_POST, 'stripslashes_gpc');
        array_walk_recursive($_COOKIE, 'stripslashes_gpc');
        array_walk_recursive($_REQUEST, 'stripslashes_gpc');
}
class saveFiles {
	private $postedValue;
	private $dbConn;
	public $error_message;
	public function __construct( $postedValue='' ){
		error_reporting(0);
		if($postedValue['fetch']==1){
			//error_reporting(E_ERROR);
        	        //@ini_set('display_errors', '1');
		}
		
		if(empty($postedValue))
			$this->postedValue  = null;
		else 
			$this->postedValue  = $postedValue;
			
		$this->error_message	= '';				
                $this->root             = dirname(dirname(dirname(dirname(__FILE__)))).'/public_html_secure/cms/';	
		$this->current_page  	= isset($_REQUEST['start'])?$_REQUEST['start']:1;
                $this->params        	= '';
	}
	public function init() {
		
		$type = '';
		if(isset($_REQUEST['type']) && !empty($_REQUEST['type']) && !$this->postedValue['fetch'])
			$type = $_REQUEST['type'];
		else if(isset($this->postedValue['type']) && !empty($this->postedValue['type']))	
			$type = $this->postedValue['type'];
			
		switch($type){
			case 'savevdoimage':
                                $this->saveVdoImage();
				break;
                       
		}
	}
	private function saveVdoImage(){
		$date=date('Y-m-d');
		$content_id=(int)$_REQUEST['content_id'];
		$data=$_REQUEST['data'];
                if(!empty($content_id) && !empty($data)){
			echo "inside";
			//$video_moredata_array=json_decode($data,true);
			$sprite_url=$data;//$video_moredata_array['sprite_url'];
			$sprite_image = file_get_contents($sprite_url);
			$image_folder_path = $GLOBALS['CONF']['BASE_FOLDER_PATH'].'/img/vdo-preview/'.date('Y').'/'.date('m').'/'.date('d');
			if (!file_exists($image_folder_path)) {
				mkdir($image_folder_path, 0777, true);
			}
			$img='/'.$content_id.'.jpg';
			$imagepath=$image_folder_path.$img;
			if(!empty($sprite_image)){
				if(file_put_contents($imagepath, $sprite_image)){
					return true;
				}else{
					return false;
				}
			}
		}
	}
        
	
	
}//End of Class cmsAPI

$obj = new saveFiles();
$obj->init();

?>
