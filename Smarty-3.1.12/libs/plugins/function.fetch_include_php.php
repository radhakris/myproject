<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {fetch_include_php} plugin
 *
 * Type:     function<br>
 * Name:     fetch_include_php<br>
 * Purpose:  fetch include php file
 * @author Jagannath Behera
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_fetch_include_php($params, &$smarty)
{
        $host = "http://".$_SERVER['HTTP_HOST'];
        $file = $params['file'];
        if ($_REQUEST['debug']){
                echo "$file<hr />";
        }
	if($_REQUEST['aurl']!=''){
		$request_uri = $_REQUEST['aurl'];
	}elseif($_REQUEST['uri']!=''){
		$request_uri = $_REQUEST['uri'];
	}else{
		$request_uri = $_SERVER['REQUEST_URI'];
	}
	$request_uri = preg_replace("@-pg.*\.html@","-pg1.html",$request_uri);
	if(!preg_match("@\?@",$file)){
        	return file_get_contents($host.$file);
	}else{
        	return file_get_contents($host.$file."&uri=".$request_uri);
	}
}

?>
