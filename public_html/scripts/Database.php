<?php
/**
 * Database Initilization 
 * 
 * @version $Id: Database.php,v 1.0 2008/04/10 16:45:00 $
 * @author Sathish kumar <sathishkumar.i@greynium.com>
 * @package CMS
 * @license http://www.greynium.com Greynium Information Technologies Pvt. Ltd.
 * 
 */
class includes_Database 
{
	
/**
* an array of properties used by __get and __set
* @access private
* @var string
*/
   
    private $props;
/**
* the actual connection resource
* @access protected
* @var string
*/       
    protected $connection;
    
/**
* the hostname for the database server
* @access protected
* @var string
*/      
   
    protected $hostname;
   
/**
* the name of the database to use
* @access protected
* @var string
*/  
    
    protected $database;
    
/**
*  the username to use to access the database
* @access protected
* @var string
*/      

    protected $username;
 
/**
*  the password to use to access the database
* @access protected
* @var string
*/  

    protected $password;
   
/**
* A contstuctor function to intialize Database details
* @param string $dbhost for initilization of databse hostname
* @param string $dbname for initilization of database name
* @param string $dbuser for initilization of database username
* @param string $dbpass for initilization of database password
* @access private
*/	
    
    public function __construct($dbhost=null, $dbname=null, $dbuser=null, $dbpass=null) 
    {
        $this->database = $dbname;
        $this->hostname = $dbhost;
        $this->username = $dbuser;
        $this->password = $dbpass;
    }
   
/**
* A function to set value for member variable
* @param string $name member variable name
* @param string $value member variable value
* @access protected
*/
    
    public function __set($name, $value) 
    {
        if (isset($this->props[$name])) 
        {
            $this->props[$name] = $value;
        }
    }
    
/**
* A function allows to overload behaviour when getting class members
* @param string $name member variable name
* @access protected
* @return string|null
*/  
 
    public function __get($name) 
    {
        if (isset($this->props[$name])) 
        {
            return $this->props[$name];
        } else 
        {
            return null;   
        }
    }
   
} 


?>
