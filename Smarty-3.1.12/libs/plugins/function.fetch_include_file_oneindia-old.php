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
 * @author Bosco
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_fetch_include_file_oneindia($params, &$smarty)
{
        //if (stristr($params['file'], 'common/')){
                $file = $_SERVER['DOCUMENT_ROOT'] . trim($params['file']);
                $file = preg_replace("/\/{2,}/", '/', $file);
                if ($_REQUEST['debug']){
                        echo "$file<hr />";
                }
                $content = '';
                return replace_content_oneindia($file);
                // fetch the file

        //}
        return false;
}

function replace_content_oneindia($file)
{

        if(is_file($file))
        {

                if(preg_match("@.php@",$file)) {
                        ob_start(); // start output buffer
                        include $file;
                        $content = ob_get_contents(); // get contents of buffer
                        ob_end_clean();
                }else{
                        $content=file_get_contents($file);
                }
                preg_match_all('@<!--#include virtual="(.*)"-->@U',$content,$match);

                for($i=0;$i<=count($match[0]);$i++)
                {

                        $file_content=replace_content_oneindia($_SERVER['DOCUMENT_ROOT'].$match[1][$i]);
                        $content= str_replace($match[0][$i],$file_content,$content);
                }
                return $content;
        }
        else
        {
                        /*$smarty->_trigger_fatal_error('[plugin] fetch cannot read file \'' . $file . '\'');
                        return;*/
                        return $file;
        }



}

/* vim: set expandtab: */

?>

