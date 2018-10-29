<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {fetch_include_file} plugin
 *
 * Type:     function<br>
 * Name:     fetch_include_file<br>
 * Purpose:  fetch include file
 * @author Jagannath
 * @param array
 * @param Smarty
 * @return string
 */
error_reporting(0);
function smarty_function_fetch_include_file_oneindia($params, &$smarty){
        //if (stristr($params['file'], 'common/')){
                $file = $_SERVER['DOCUMENT_ROOT'] . trim($params['file']);
                $file = preg_replace("/\/{2,}/", '/', $file);
                if ($_REQUEST['debug'] || $_COOKIE['debug']==1){
                        echo "$file<br>";
                }
                $content = '';
                $for = $params['for'];
                $channel = $params['channel'];
                return replace_content_oneindia($file, $for, $channel);

                // fetch the file

        //}
        //return false;
}
function replace_content_oneindia($file, $for='', $channel=''){

        if(is_file($file) || preg_match("@\?@",$file)){
                if((preg_match("@.php@",$file) || preg_match("@.html@",$file)) && !preg_match("@\?@",$file)) {
                        if(preg_match("@.php@",$file)){
                                ob_start(); // start output buffer
                                include $file;
                                $content = ob_get_contents(); // get contents of buffer
                                ob_end_clean();
                        }else{
                                if(file_exists($file)){
                                        $content = file_get_contents($file);
                                        //print $file."<br>";
                                        //print "<textarea>".$content."</textarea><br>";
                                }
                        }
                }else{
                        if(!preg_match("@\?@",$file)){
                                $content=file_get_contents($file);
                        }else{
                                //print $file."<br>";
                                if($_REQUEST['aurl']!=''){
                                        $request_uri = $_REQUEST['aurl'];
                                }elseif($_REQUEST['uri']!=''){
                                        $request_uri = $_REQUEST['uri'];        
                                }else{
                                        $request_uri = $_SERVER['REQUEST_URI'];
                                }
                                $request_uri = preg_replace("@-pg.*\.html@","-pg1.html",$request_uri);
                                //print "<input type='hidden' id='debug-1' value='"."http://".$_SERVER['HTTP_HOST'].str_replace("&amp;","&",$file)."&uri=".$request_uri."'><br>";
                                //$content = '<!--#include virtual="'.str_replace("&amp;","&",$file)."&time=".time()."&uri=".$request_uri.'"-->';
                                $content=file_get_contents("http://".$_SERVER['HTTP_HOST'].str_replace("&amp;","&",$file)."&time=".time()."&uri=".$request_uri);
                        }
                }

                //preg_match_all('@<!--#include virtual="(.*)"-->@U',$content,$match);
                $content = str_replace("<!--#echo var='DOCUMENT_URI'-->", "", $content);
                preg_match_all('@<!--#include virtual="(.*)"-->|<esi:include src="(.*)"/>@U',$content,$match);
                for($i=0;$i<=count($match[0]);$i++)
                {
                        if($match[1][$i]=='')
                                $match[1][$i] = $match[2][$i];
                        if($match[1][$i]=='')
                                continue;
                        if($for == "mobi"){
                                $match[1][$i] = str_replace($channel."/common/", "/common/mobi/", $match[1][$i]);
                        }
                        if(!preg_match("@\?@",$match[1][$i])){
                                $file_content=replace_content_oneindia($_SERVER['DOCUMENT_ROOT'].$match[1][$i]);
                        }else{
                                $file_content=replace_content_oneindia($match[1][$i]);

                        }
                        $content= str_replace($match[0][$i],$file_content,$content);
                }
                if($channel!=''){
                        $content = str_replace($channel."/", "/", $content);
                }
                return $content;
        }else{
                /*$smarty->_trigger_fatal_error('[plugin] fetch cannot read file \'' . $file . '\'');
                return;*/
                return $file;
        }
}
/* vim: set expandtab: */

?>
