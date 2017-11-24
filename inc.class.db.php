<?php
// http://www.php.net/manual/de/pdostatement.execute.php - for IN statements, TODO
// http://www.designosis.com/PDO_class/
// http://www.sitepoint.com/migrate-from-the-mysql-extension-to-pdo/
// http://www.php.net/manual/en/pdo.exec.php
// http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers
// https://github.com/ajillion/PHP-MySQLi-Database-Class/blob/master/MysqliDb.php

class db {
	protected $dblink;
	private $stmt;
	private $debug = false;
	
	/**
	* constructor
	* @param string $host
	* @param string $username
	* @param string $password
	* @param string $db
	*/
	public function __construct($host, $username, $password, $db) {
		$options = array(
            PDO::ATTR_EMULATE_PREPARES => false, //will let you bind variables without having to specify the type
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::MYSQL_ATTR_LOCAL_INFILE => true
			// PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => false //don't load the entire result set into memory
        );
        try{
            $this->dblink = new PDO('mysql:host='. $host .';dbname='. $db .';charset=utf8', $username, $password, $options);
        }
        catch(PDOException $e){
			$this->errorlog($e->getMessage(), 1);
        }
	}
	
	/**
	* destructor
	* @calls the close function
	*/
	public function __destruct() {
		$this->close();
	}
	
	/**
	* set debug mode for dev
	* @param optional $value - "boolean"
	*/
	public function debug($value = false) {
		$this->debug = $value;
	}

	/**
	* log errors
	* @param required $msg - "string"
	* @param optional $exit - "boolean" - exit script if true
	*/
	private function errorlog($msg, $exit = false) {
		if($this->debug !== false) {
			echo $msg;
		}
		else {
			file_put_contents('inc.class.db.errors.log', date("Y-m-d-H-i") ." - ". $msg  ."\n", FILE_APPEND);
		}
		if($exit) {
			exit;
		}
	}
	
	/**
	* execute a raw SQL statement
	*
	* @param required $query - "string" - sql query
	* 
	* @returns object
	*/
	public function query($query, $bindparams = array(), $echo = false) {
		$query = trim($query);
		//prepared
		if(!empty($bindparams)) {
			try{
				$this->stmt = $this->dblink->prepare($query);
				$this->stmt->execute($bindparams);
			}
			catch(PDOException $e){
				$this->errorlog($e->getMessage(), 1);
			}
		}
		//not prepared
		else {
			$types = array('SELECT', 'INSERT', 'DELETE', 'UPDATE', 'CREATE', 'DROP', 'TRUNCATE', 'SET', 'SHOW', 'REPLACE', 'LOAD');
			$type = strtok($query, " \r\n\t");
			if(!in_array(strtoupper($type), $types)) {
				$this->errorlog('query type invalid. Query was: '. $query, 1);
			}
			elseif($type == 'SELECT') {
				try{
					$this->stmt = $this->dblink->query($query); //returns result set
				}
				catch(PDOException $e){
					$this->errorlog($e->getMessage(), 1);
				}
			}
			else {
				try{
					$this->stmt = $this->dblink->exec($query); //returns int affected rows, and/or int last insert id
				}
				catch(PDOException $e){
					$this->errorlog($e->getMessage(), 1);
				}
			}
		}
		if($echo !== false) {
			// echo"<pre>"; print_r($query); echo"</pre><hr>";
			echo"<pre>"; var_dump($this->stmt); echo"</pre><hr>";
		}
		return $this->stmt;
	}	
	
	/**
	* fetch all result rows
	* @param required $resource - "object" - sql resource
	* @returns associative array
	*/
	public function fetchall($resource, $flat = false) {
		$output = $resource->fetchAll(PDO::FETCH_ASSOC);
		if($flat && !empty($output)) {
			$output = $output[0];
		}
		return $output;		
	}
	
	/**
	* fetch a result row
	* @param required $resource - "object" - sql resource
	* @returns associative array
	*/
	public function fetch($resource) {
		return $resource->fetch(PDO::FETCH_ASSOC);
	}
	
	/**
	* fetch a result value
	* @param required $query - "string" - sql query
	* @returns string or false if empty
	*/
	public function fetchvalue($query, $bindparams = array(), $echo = false) {
		$resource = $this->query($query, $bindparams, $echo);
		$return = $resource->fetch(PDO::FETCH_NUM);
		return isset($return[0]) ? $return[0] : false;
	}
	
	/**
	* fetch column names
	* @param required $table - "string"
	* @returns flat array of column names
	*/
	public function fetchcolumns($table) {
		$columns = array();
		$resource = $this->query("SELECT * FROM `$table` LIMIT 0");
		for($i=0; $i<$resource->columnCount(); $i++) {
			$col = $resource->getColumnMeta($i);
			$columns[] = $col['name'];
		}
		return $columns;
	}
	
	/**
	* get num rows
	* @param required $result - "object" - sql resource
	* @returns int
	*/
	public function num_rows($result) {
		return $result->rowCount(); //only works for PDO_MYSQL driver when using SELECT statements.
	}
		
	/**
	* get affected rows
	* @param required $result - "object" - sql resource
	* @returns int - the number of rows affected by a DELETE, INSERT, or UPDATE statement.
	*/
	public function affected_rows($result) {
		return $result->rowCount();
	}
	
	/**
	* get last insert id
	* @returns int
	*/
	public function insert_id() {
		return $this->dblink->lastInsertId();
	}
	
	/**
	* Escape & quote strings for sql input
	*
	* @param required $input - "string" or "array"
	* @returns string or array
	*/
	public function quote($input) {
		if(is_array($input)) {
			foreach($input as $var => $val) {
				$output[$var] = $this->escape($val);
			}
		}
		else {
			$output = $this->dblink->quote(trim($input));
			// $output = addcslashes($output, '%_'); //escape _ (underscore) and % (percent) signs, which have special meanings in LIKE clauses.
		}
		return $output;
	}
	
	/**
	* Escape strings for sql input
	*
	* @param string or array
	* @returns string or array
	*/
	public function query_prepare($input) {
		if(is_array($input)) {
			return array_map(__METHOD__, $input);
		}
		if(!empty($input)) { 
			$input = $this->dblink->quote(trim($input));
			$input = substr($input, 1, -1); //remove quotes
		}
		return $input; 
	}
	
	/**
	* Close connection
	*/
	public function close() {
		$this->dblink = null;
		// echo "<div>__destruct called ". time() ." </div>";
	}
	
	/**
	* Class info
	*/
	public function info() {
		$info = array(
			'class' => get_class($this),
			'vars' => get_class_vars(get_class($this)),
			'methods' => get_class_methods($this),
			'parents' => class_parents(get_class($this))
		);
		return $info;
	}
}

/* 

//init db class
$db = new db($db_server, $db_user, $db_passwd, $db_name);
$db->debug(true);

//escape and quote
//echo $db->quote("'s Hertogenbosch");

//query and params
$query = "SELECT * FROM test WHERE _integer LIKE :_integer LIMIT :limit";
$params = array(
	':_integer' => "%2",
	':limit' => 2
);

//select - returns result rows
$result = $db->query($query, $params);
echo $db->num_rows($result) ."<br>";

//IN
// $result = $db->query("SELECT * FROM test WHERE id IN (26,27)");

//fetch all - entire result set commits to memory
_printr($db->fetchall($result));

//a single value - string/int/etc
echo $db->fetchvalue($query, $params);

//a single row - array
// echo $db->fetch($result)[0];

// or for large result sets, get one at a time.
// while($row = $db->fetch($result)) {
    // echo $row['_integer'].' '.$row['_string'] .'<br>';
// }

exit;

//insert - returns affected rows, last insert id.
$result = $db->query(
	"INSERT INTO test (_integer, _double, _string, _blob) VALUES(:_integer, :_double, :_string, :_blob)",
	array(
		':_integer' => 42,
		':_double' => 99.8,
		':_string' => 'my stringz!',
		':_blob' => 'blobby'
	)
);
echo $db->affected_rows($result) ."<br>";
echo $db->num_rows($result) ."<br>";
echo $db->insert_id();


 */
