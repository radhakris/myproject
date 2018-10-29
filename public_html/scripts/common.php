<?php

class common
{
	public function checkSmartyCache($cache_key,$file_name,$caching=0,$cache_dir="",$sec=900,$return="",$var=""){
		$caching=0;
		require_once('smarty-3.1.php');
		$smarty_obj = new Smart();
		$smarty = $smarty_obj->getSmarty();
		
		if($this->deviceType == "phone"){
			$device = "mobi";
		}else if($this->deviceType == "tablet"){
			$device = "tablet";
		}else{
			$device = "web";	
		}
		$path = $GLOBALS['CONF']['ROOT_PATH'];
		$public_html_secure = $path.'/public_html_secure';
		$smarty->template_dir = $public_html_secure.'/templates/'.$device;

		$smarty->compile_dir  = $public_html_secure."/templates_c/";

		switch($_REQUEST['module']){
			case 'article':
				$smarty->cache_dir = $public_html_secure."/all_cache/article/";
			break;
			case 'topic':
				$smarty->cache_dir = $public_html_secure."/all_cache/topic/";
			break;
			default:
		        $smarty->cache_dir = $public_html_secure."/all_cache/cache/";
			break;
		}

		if($var!=""){
			foreach($var as $key=>$val)
				$smarty->assign($key,$val);
		}
		
		if($cache_dir!=''){
			$server_root_path= dirname($_SERVER['DOCUMENT_ROOT']).'/'.$this->default_tpl_path;
			if(preg_match("@templates@",$this->default_tpl_path))
				$smarty->cache_dir = $server_root_path."/cache/";
			else
				$smarty->cache_dir = $server_root_path.$cache_dir;
		}
		
		$smarty->compile_check = true; // true: If any of the  template files and config files have been modified since the cache was generated, the cache is immediately regenerated
		$smarty->force_compile = true;
		$smarty->debug = true;
		$smarty->caching = $caching;   // 1 or 2 : for storing the cache , 0 : for not storing the cache
		$smarty->cache_lifetime = $sec;        // setting cache life time for 15 min
		

		//$smarty->clearCache($file_name,$cache_key);
		if($smarty->isCached($file_name,$cache_key)){
			$content = trim($smarty->fetch($file_name,$cache_key));
			$content = preg_replace('@^\s+$@','',$content);
			if(!empty($content)){
				if($return != "")
					return array($smarty, $content);
				else
					echo $content;
				exit;
			}
		}
		if($return != "")
			return array($smarty, $content);
		else
			return $smarty;
	}

	public function clean_string($string) {
		$s = trim($string);
		$s = preg_replace('/[\x00-\x08\x10\x0B\x0C\x0E-\x19\x7F]'.'|[\x00-\x7F][\x80-\xBF]+'.'|([\xC0\xC1]|[\xF0-\xFF])[\x80-\xBF]*'.'|[\xC2-\xDF]((?![\x80-\xBF])|[\x80-\xBF]{2,})'.'|[\xE0-\xEF](([\x80-\xBF](?![\x80-\xBF]))|(?![\x80-\xBF]{2})|[\x80-\xBF]{3,})/S', '', $s );
		$s = preg_replace('/\s+/', ' ', $s); // reduce all multiple whitespace to a single space
		$s = str_replace('&amp;','&',(stripslashes($s)));
		return $s;
	}

      public function pageNotFound($url=''){

                $jsonFile = $_SERVER['DOCUMENT_ROOT']."/common/301redirection.json";
                $curUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                $fromUrl = $_SERVER['REQUEST_URI'];
                if(file_exists($jsonFile)){
                        $jsonData = file_get_contents($jsonFile);
                        $readJson = json_decode($jsonData,true);

                        foreach($readJson as $k => $v)
                        {
                                $k=parse_url($k, PHP_URL_PATH);
                                if($fromUrl == $k && $v['status'] == 1){
                                        $url = $v['to_link'];
                                        break;
                                }
                        }
                }
                if($url!=''){
                        //$url = header("Location: ".$url);
                        header('Cache-Control: no-cache');
                        header('Pragma: no-cache');
                        header("HTTP/1.1 301 Moved Permanently");
                        header("Location: ".$url); exit;
                }else{
                        header("HTTP/1.1 404 Not Found");
                        $cache_key = $this->deviceType."_404";
                        $file_name = '404.tpl';

                        $smarty = $this->checkSmartyCache($cache_key, $file_name,2);
                        echo $smarty->fetch($file_name,$cache_key);
                        exit;
                }
                exit;
        }

}
