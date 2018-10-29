<?php

class includes_Mysql extends includes_Database 
{

    static private $instance; 
    public $lastResult;  
    public $lastInsertId;  
    public $foundRows;  
    static private $other_instance;

    public function __construct($dbHost=null, $dbName=null, $dbUser=null, $dbPass=null) 
    {
        
    	
    	$this->lastResult='';
    	parent::__construct($dbHost, $dbName, $dbUser, $dbPass);
    }
    

	  static function getInstance($dbHost=null, $dbName=null, $dbUser=null, $dbPass=null) {
        if(!self::$instance) 
        {
        	if(empty($dbHost))
    			$dbHost=$GLOBALS['DB_DETAILS']['HOSTNAME'];
    		if(empty($dbName))	
    			$dbName=$GLOBALS['DB_DETAILS']['DATABASE'];
    		if(empty($dbUser))
    			$dbUser=$GLOBALS['DB_DETAILS']['USERNAME'];
    		if(empty($dbPass))
    			$dbPass=$GLOBALS['DB_DETAILS']['PASSWORD'];
    		
            self::$instance = new includes_Mysql($dbHost, $dbName, $dbUser, $dbPass);


            self::$instance->open();
            
          
        }
        return self::$instance;
    } 
        static function getInstance1($dbHost=null, $dbName=null, $dbUser=null, $dbPass=null) {
                if(!self::$instance)
                {
                        if(empty($dbHost))
                                $dbHost=$GLOBALS['DB_DETAILS_SERVER1']['HOSTNAME'];
                        if(empty($dbName))
                                $dbName=$GLOBALS['DB_DETAILS_SERVER1']['DATABASE'];
                        if(empty($dbUser))
                                $dbUser=$GLOBALS['DB_DETAILS_SERVER1']['USERNAME'];
                        if(empty($dbPass))
                                $dbPass=$GLOBALS['DB_DETAILS_SERVER1']['PASSWORD'];

                        self::$instance = new includes_Mysql($dbHost, $dbName, $dbUser, $dbPass);
                        self::$instance->open();


                }
                return self::$instance;
        }
	  static function getOtherInstance($channel_pefix, $dbHost=null, $dbName=null, $dbUser=null, $dbPass=null) {
		  if(!self::$other_instance) 
		  {
			  $channel_pefix = strtoupper($channel_pefix);
			  if(empty($dbHost))
				  $dbHost=$GLOBALS[$channel_pefix.'DB_DETAILS']['HOSTNAME'];
			  if(empty($dbName))	
				  $dbName=$GLOBALS[$channel_pefix.'DB_DETAILS']['DATABASE'];
			  if(empty($dbUser))
				  $dbUser=$GLOBALS[$channel_pefix.'DB_DETAILS']['USERNAME'];
			  if(empty($dbPass))
				  $dbPass=$GLOBALS[$channel_pefix.'DB_DETAILS']['PASSWORD'];

			  self::$other_instance = new includes_Mysql($dbHost, $dbName, $dbUser, $dbPass);
			  self::$other_instance->open();


		  }
		  return self::$other_instance;
	  }
    public function __set($name, $value) 
    {
        if (isset($name) && isset($value)) 
        {
            parent::__set($name, $value);
        }
    }

    public function __get($name) 
    {
        if (isset($name)) 
        {
            return parent::__get($name);
        }
    }

    public function Connected() {
        if (is_object($this->connection)) {
        	echo 'connected';
            return true;
        } else {
        	echo 'not connected';
            return false;
        }
    }

  

    public function open() 
    {
        if (is_null($this->database))
            trigger_error("MySQL database not selected");
        if (is_null($this->hostname))
            trigger_error("MySQL hostname not set");
        try 
        {
			$this->connection = new PDO('mysql:host='.$this->hostname.';dbname='.$this->database, $this->username, $this->password);
	        if ($this->connection === false )
			trigger_error("Could not connect to database. Check your username and password then try again.\n");

       

       }
        catch(PDOException $e)
        {
		trigger_error("Failed to obtain database handle \n", $e->getMessage());
        }
    }

    public function close() 
    {
        
        $this->connection = null;
    }

    public function query($sql,$replacements = "") 
    {
       if($this->connection)
       {
	    	
	    	if ($this->connection === false) 
	    	{
	            trigger_error('No Database Connection Found.');
	        }
	         // if $replacements is specified but it's not an array
            if ($replacements != "" && !is_array($replacements)) 
            {

                // if debugging is on
          		$GLOBALS['DEBUG']= 'Warning: Replacements are not an array.\n';    
            // if $replacements is specified and is an array
            } elseif ($replacements != "" && is_array($replacements)) {

                // found how many items to replace are there in the query string
                preg_match_all("/\?/", $sql, $matches, PREG_OFFSET_CAPTURE);
               
                // if the number of items to replace is different than the number of items specified in $replacements
                if (count($matches[0]) != count($replacements)) {

                    // if debugging is on
                    if ($GLOBALS['CONF']['DEBUG']) 
                    {
                    	$GLOBALS['DEBUG']= 'Warning: Replacements counts are mismatched.\n';              
                    
                        
                    }
                    
                // if the number of items to replace is the same as the number of items specified in $replacements
                } else {
                
                    // make preparations for the replacement
                    $pattern1 = array();

                    $pattern2 = array();

                    // prepare question marks for replacement
                    foreach ($matches[0] as $match) {
                    
                        $pattern1[] = "/\\" . $match[0] . "/";
                        
                    }

                    foreach ($replacements as $key=>$replacement) {

                        // generate a string
                        $randomstr = md5(microtime()) . $key;
                        
                        // prepare the replacements for the question marks
                        $replacements1[] = $randomstr;
                        // mysql_real_escape_string the items in replacements
                        // also, replace anything that looks like $45 to \$45 or else the next preg_replace-s will treat
                        // it as references
			if($replacement!='null')
			$replacements2[$key] = "'" . preg_replace("/\\$([0-9]*)/", "\\\\$$1", $this->escape($replacement)) . "'";
			else
				$replacements2[$key]=$replacement;

                        // and also, prepare the new pattern to be replaced afterwards
                        $pattern2[$key] = "/" . $randomstr . "/";

                    }


                    // replace each question mark with something new
                    // (we do this intermediary step so that we can actually have question marks in the replacements)
                    $sql = preg_replace($pattern1, $replacements1, $sql, 1);
                    
                    // perform the actual replacement
                    $sql = preg_replace($pattern2, $replacements2, $sql, 1);

                }

            }
            
            
            
//            unset($this->lastResult);
            
            // starts a timer
            list($usec, $sec) = explode(" ", microtime());
            $startTime = (float)$usec + (float)$sec;     
        
            
            
    		$GLOBALS['DEBUG'].= $sql.'\n';   
			$this->connection->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);	   
           	$result = $this->connection->query($sql);
		//var_dump($result);
            	$this->lastResult = $result;
	        if ($result === false) 
	        {
	            $error=$this->connection->errorInfo();
                        $error[] = $sql;
	        	trigger_error($error[2]);
	        	//echo 'returned'.$error[1].$sql;
	        	return $error[1];
	        }
	        return $result;
       }
    }

    	//wrapper method for PDOStatement::execute()
        public function Execute($sqlQuery, $params = null) {
                //try to execute an SQL query or a stored procedure
                try {
                        //get DB handler
                        //$database_handler = self::open();
                        //var_dump($this->open());
                        //var_dump($database_handler);
                        //Prepare the query for execution
                        $statement_handler = 
			$this->connection->prepare($sqlQuery);
                        //execute query
                        $statement_handler->execute($params);
                        return $statement_handler;
                }
                catch (PDOException $e){
                        //close the DB handler and trigger an error
                        self::Close();
                        trigger_error($e->getMessage(), E_USER_ERROR);
                }
        }
	
        function prepare($string)
         {

                // checks is there is an active connection
                if ($this->connection === false)
                {
                        trigger_error('No Database Connection Found.');
                }
                else
                {
                        $res = $this->connection->prepare($string);
                        return $res;
                }
        }
 
    /**
     *  Escapes a string's in order to prevent MySQL injections
     *
     *  Works even if magic_quotes is ON
     *
     *  Example:
     *
     *  <code>
     *      print_r($db->escape("John O'Bryan"));
     *  </code>
     *
     *  @param  string  $string     String to escape
     *
     *  @return string  Escaped string
     */
    function escape($string)
    {
		
    	 // checks is there is an active connection
    	if ($this->connection === false) 
    	{
             trigger_error('No Database Connection Found.');
        }
    	else 
    	{	
       
       
            // get the state of "magic quotes"
            // and if "magic quotes" are on
            if (get_magic_quotes_gpc()) {

                // strip slashes
                $string = stripslashes($string);

            }

            // escape the string
            /*$returnValue = $this->connection->quote($string);*/
            $returnValue = ($string);
			
            // return escaped string
            return $returnValue;
            
      

        
    	}

    }
    /**
     *  Shorthand for INSERT queries
     *
     *  <i>I recommend the use of the {@link query()} method instead and writing the actual query for better code readability</i>
     *
     *  <i>The advantage of using this method is that will escape all field names allowing for reserved words to be used</i>
     *
     *  @param  string  $table          Table in which to insert
     *
     *  @param  array   $fields         An array of fields to which to insert data
     *
     *  @param  array   $values         An array with as many items as $fields, containing the data to be inserted into the corresponding
     *                                  fields specified by $fields. Don't worry about escaping strings, these will be automatically
     *                                  {@link escape()}-ed
     *
     *  @param  boolean $highlight      (optional) Whether or not the query should be highlighted in the debugger window
     *
     *                                  Default is FALSE
     *
     *  @since  1.0.9
     *
     *  @return boolean     Returns TRUE on success of FALSE on error
     */
    function insert($table, $fields, $values, $highlight = FALSE)
    {

       
        
        $str = "";
        
        $rep = "";
        
        for ($i = 0; $i < count($fields); $i++) {

            $str .= ($str != "" ? ", " : "") . "`" . $fields[$i] . "`";
            
            $rep .= ($rep != "" ? ", " : "") . "?";

        }

    	//$result =" INSERT INTO " . $table . " (" . $str . ") VALUES (" . $values . ")";
	//echo $result;

        // executes query
        // and yes, we mute the errors and let the query() method to handle errors
     $result= $this->query("
		
            INSERT INTO
                " . $table . "
                (" . $str . ")
            VALUES
                (" . $rep . ")"

        ,$values, $highlight);
	$this->lastResult=$result;
	
        // if query was executed successfully
        if (is_object($result)) {
			$this->lastInsertId=$this->connection->lastInsertId();
            // returns TRUE
            return TRUE;

        }
        else         	  
			trigger_error('Record Not inderted');
        // return FALSE on error
        return FALSE;

    }
    
     /**
     *  Shorthand for UPDATE queries
     *
     *  <i>I recommend the use of the {@link query()} method instead and writing the actual query for better code readability</i>
     *
     *  <i>The advantage of using this method is that will escape all field names allowing for reserved words to be used</i>
     *
     *  @param  string  $table          Table in which to update
     *
     *  @param  array   $fields         An array of fields on which to perform the update
     *
     *  @param  array   $values         An array with as many items as $fields, containing the data new to be inserted into the corresponding
     *                                  fields specified by $fields. Don't worry about escaping strings, these will be automatically
     *                                  {@link escape()}-ed
     *
     *  @param  string  $condition      (optional) A standard MySQL WHERE condition
     *
     *                                  Default is ""
     *
     *  @param  array   $replacements   (optional) An array with as many items as the total "?" symbols in $condition.
     *                                  Each item will be automatically {@link escape()}-ed and will replace the corresponding "?"
     *
     *  @param  boolean $highlight      (optional) Whether or not the query should be highlighted in the debugger window
     *
     *                                  Default is FALSE
     *
     *  @since  1.0.9
     *
     *  @return boolean     Returns TRUE on success of FALSE on error
     */
    function update($table, $fields, $values, $condition = "", $replacements = "", $highlight = FALSE)
    {

        
        $str = "";
        
        for ($i = 0; $i < count($fields); $i++) {

            $str .= ($str != "" ? ", " : "") . "`" . $fields[$i] . "` = ?";

        }
        
	//echo "UPDATE" . $table . " SET " . $str;
	//echo $condition != "" ? " WHERE " . $condition : "";
        // executes query
        // and yes, we mute the errors and let the query() method to handle errors
        $this->lastResult = $this->query("

            UPDATE
                " . $table . "
            SET
                " . $str .

            ($condition != "" ? " WHERE " . $condition : "")

        ,$values, $highlight);
        if(!empty($this->lastResult))
			$row_count=$this->lastResult->rowCount();
		else 
			$row_count='0';
        // if query was executed successfully
        if ($row_count>0) {
            // returns TRUE
            return TRUE;

        }
        // return FALSE on error
        return FALSE;

    }

    /**
     *  Alias of the the mysql_insert_id() function.
     *
     *  Retrieves the ID generated for an AUTO_INCREMENT column by the previous INSERT query
     *
     *  @since 1.0.5
     *
     *  @return mixed   The ID generated for an AUTO_INCREMENT column by the previous INSERT query on success,
     *                  '0' if the previous query does not generate an AUTO_INCREMENT value, or FALSE if there was
     *                  no MySQL connection
     */
    public function insert_id()
    {
        // checks is there is an active connection
        if ($this->connection) {
                return $this->lastInsertId;           
            } 

            

        

        // we don't have to report any error as _connected() method already did or checking for valid resource failed
        return FALSE;

    }
     /**
     *  Returns value/values from ONE row of a table
     *
     *  Example:
     *
     *  <code>
     *      /**
     *          notice that we're doing no error checking as we will have
     *          any errors show up in the debug window
     *          so don't forget to have at the end of your code a call to
     *          show_debug_info() method
     *      {@*}
     *      $foundData = $db->dlookup("name, surname, age", "people", "countryid = ?", array($_POST["countryID"]));
     *  </code>
     *
     *  @param  string  $field          One or more fields to return in the result. If only one field is specified, the
     *                                  returned result will be the specific field's value whereas if more fields are specified,
     *                                  the returned result will be an associative array.
     *
     *                                  <i>You can also use the "*" sign to return all the fields from a row</i>
     *
     *  @param  string  $table          Name of the table to use
     *
     *  @param  string  $condition      (optional) A standard MySQL WHERE condition
     *
     *                                  Default is ""
     *
     *  @param  array   $replacements   (optional) An array with as many items as the total "?" symbols in $field, $table and
     *                                  $condition. Each item will be automatically {@link escape()}-ed and will replace
     *                                  the corresponding "?"
     *
     *  @param  mixed   $cache          (optional) Instructs the script on whether it should cache the query's results. This argument
     *                                  can be either FALSE - meaning no cache - or an integer representing the number of seconds after
     *                                  which the cached results are considered to be expired
     *
     *                                  Default is FALSE
     *
     *  @param  boolean $highlight      (optional) Whether or not the query should be highlighted in the debugger window
     *
     *                                  Default is FALSE
     *
     *                                  this argument is available since version 1.0.7
     *
     *  @return mixed   value/values found or an empty string if nothing was found
     */
    function select($field, $table, $condition = "", $order="",$group="",$start=0, $limit="", $highlight = FALSE, $replacements = "")
    {

        
	//$limit='';
        if(empty($limit))
        {
        	$limit=' LIMIT '.$start.', '.$GLOBALS['CONF']['DEFAULT_LIMIT'];
        }
        else if($limit==-1)
        {
        	$limit='';
        }
        else
        {
        	$limit=' LIMIT '.$start.', '.$limit;
        } 
        //echo $limit;
         /*  echo " SELECT
                " . $field . "
            FROM
                " . $table .
                
            ($condition != "" ? " WHERE " . $condition : "") .
            
	    ($order != "" ? " ORDER BY " . $order." ".$orderby : "") .

	    ($group != "" ? " GROUP BY ". $group : "").
            
	    ($limit != "" ? $limit : "");*/
	//$query = "SELECT ".$field." FROM ".$table.($condition != "" ? " WHERE " . $condition : "").($order != "" ? " ORDER BY " . $order : "").($group != "" ? " GROUP BY ". $group : "").$limit;

        // executes query
        $result = $this->query("
        
            SELECT
                " . $field . "
            FROM
                " . $table .
                
            ($condition != "" ? " WHERE " . $condition : "") .
            
	    ($order != "" ? " ORDER BY " . $order : "") .

	    ($group != "" ? " GROUP BY ". $group : "").
            
           $limit

        ,$replacements, $highlight);
		
     	//var_dump($result);	
        // if query was executed successfully 
        if (is_object($result)) 
	{   
		   	return $result;
        }

        // if error or no results were found
        // return empty string
        return false;

    }
    
    function count($field, $table, $condition = "")
    {

        // executes query
        $result = $this->query("
        
            SELECT
                count(" . $field . ")
            FROM
                " . $table .
                
            ($condition != "" ? " WHERE " . $condition : "") 
            
	    );
		
     	
        // if query was executed successfully 
        if (is_object($result)) 
		{   
			$count =$result->fetch();			
		   	return $count[0];
        }
		else
		{ 
	        // if error or no results were found
	        return 0;
		}

    }
    
      /**
     *  Shorthand for DELETE queries
     *
     *  <i>I recommend the use of the {@link query()} method instead and writing the actual query for better code readability</i>
     *
     *  @param  string  $table          Table from which to delete
     *
     *  @param  string  $condition      (optional) A standard MySQL WHERE condition
     *
     *                                  Default is ""
     *
     *  @param  array   $replacements   (optional) An array with as many items as the total "?" symbols in $table and
     *                                  $condition. Each item will be automatically {@link escape()}-ed and will replace
     *                                  the corresponding "?"
     *
     *  @param  boolean $highlight      (optional) Whether or not the query should be highlighted in the debugger window
     *
     *                                  Default is FALSE
     *
     *  @since  1.0.9
     *
     *  @return boolean     Returns TRUE on success of FALSE on error
     */
    function delete($table, $condition = "", $replacements = "", $highlight = FALSE)
    {
    
	$query = "DELETE FROM " . $table .($condition != "" ? " WHERE " . $condition : "");

        // executes query
        $this->lastResult = $this->query($query,$replacements,$highlight);
        
        /*echo "test".$this->lastResult;
        // if query was executed successfully
        if ($this->lastResult) {

            // returns TRUE
            return TRUE;

	}*/
        
        // return FALSE on error
        return $this->lastResult;
    
    }
        public function mail2CMS($error=array(), $subject='', $message=''){
                $to = '';
                if($subject==''){
                        $subject = 'Mysql Error in '.@$_SERVER['HTTP_HOST'];
                }
                if($message==''){
                        $url = 'http://'.@$_SERVER['HTTP_HOST'].@$_SERVER['REQUEST_URI'];
                        $message = '<a href='.$url.'>'.$url.'</a><br/>';
                        $message.= "<br/>Time : ".date("d-m-Y H:i:s");
                        $message.= "<br/>IP of tamil2 : ".$_SERVER['REMOTE_ADDR'];
                        $message.="<br/>#############################################################################</br><br/>";
                        $message.=$error[0]."<br/>";
                        $message.=$error[1]."<br/>";
                        $message.=$error[2]."<br/>";
                        $message.=$error[3]."<br/>";
                        $message.="<br/><br/>#############################################################################</br>";
                }
                $headers = 'From: cms-support@oneindia.co.in'."\r\n".'Reply-To: cms-support@oneindia.co.in'."\r\n".'X-Mailer: PHP/'.phpversion();
                $headers.= 'MIME-Version: 1.0' . "\r\n";
                $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                mail($to, $subject, $message, $headers);
        }

    
}
?>
