<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 * Added By balakrishnan.n@oneindia.co.in
 * Date 2011-09-26
 */

/**
 * Smarty autover modifier plugin
 *
 * Type:     modifier<br>
 * Name:     autover<br>
 * Purpose:  get file name with modified timestamp
 * @param string
 * @return string
 */
function smarty_modifier_autover($url)
{
    $root_path = ROOT_PATH;
    $root_path = rtrim($root_path, '/');
    $path = pathinfo($url);
    $ver = '.'.filemtime($root_path.$url);
    
    $pos = strripos( $path['basename'], '.');
    $updated_file_name = substr_replace($path['basename'], $ver, $pos, 0);
    
    echo $path['dirname']. '/' . $updated_file_name;    
}


/* vim: set expandtab: */

?>
