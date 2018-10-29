<?php
if (get_magic_quotes_gpc()) {
        function stripslashes_gpc(&$value)
        {
                $value = stripslashes($value);
        }
        array_walk_recursive($_GET, 'stripslashes_gpc');
        array_walk_recursive($_POST, 'stripslashes_gpc');
        array_walk_recursive($_COOKIE, 'stripslashes_gpc');
        array_walk_recursive($_REQUEST, 'stripslashes_gpc');
}

$global_var = array($_REQUEST,$_GET,$_POST,$_COOKIE);
for($j=0;$j<count($global_var);$j++)
{
		$requ=$global_var[$j];
		$keys=array_keys($requ);
		$values=array_values($requ);
		
		//var_dump($requ);
		for($m=0;$m<count($requ);$m++)
		{
			$pattern = '@([0-9]{1,})\s*=\s*([0-9]{1,})@';
				if(preg_match($pattern,$requ[$keys[$m]])){
					$requ[$keys[$m]] = preg_replace($pattern,"",$requ[$keys[$m]]);
				 }
		    $requ[$keys[$m]]= str_ireplace( array(';','#','=','--', 'sleep(', '*','regexp','--dbms', 'describe', '--batch', 'information_schema','drop table', 'drop database', 'delete from', 'show tables','show table'), '', $requ[$keys[$m]]);
		}
		if($j==0){
		$_REQUEST=$requ;
		}
		if($j==1){
		$_GET=$requ;
		}
		if($j==2){
		$_POST=$requ;
		}
		if($j==3){
		$_COOKIE=$requ;
		}
		unset($requ);
}
?>
