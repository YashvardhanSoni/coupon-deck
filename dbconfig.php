<?php
class Database {
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db = 'coupondeck';
    protected $connLink;

    function __construct(){
        $this->connect();
      }
   
    // protected 'connect()' method
    public  function connect(){

        // // establish connection
        // if(!$this->connLink = mysqli_connect($this->hostname, $this->username, $this->password)) {
        //     throw new Exception('Error connecting to MySQL: '.mysql_error());
        // }

        // // select database
        // if(!mysql_select_db($this->db, $this->connLink)) { 
        //     throw new Exception('Error selecting database: '.mysqli_error());
        // }
        try {
            $this->connection = new PDO("mysql:host=".$this->hostname.";dbname=".$this->db, $this->username, $this->password);
            // $this->connection = mysqli_connect($this->hostname, $this->username, $this->password, $this->db);
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    // public function query($query){
    //     if(isset($this->connection)){
    //         $this->query = $query;
    //         return mysqli_query($this->connection, $this->query);
    //     }

    // }
    public function queryAll($sql) {
		$this->isempty ( $sql );		
		$return = array ();
		$return ['results'] = array ();
		$return ['total'] = 0;
		$returnRes = array ();
		$resource = $this->connection->query( $sql )->fetchAll();				
		$i = 0;				
		$return ['results'] = $resource;
		$return ['total'] = count($resource);
		return $return;
	}
    public function queryRow($sql) {
		$this->isempty ( $sql );		
		$returnRes = array ();		
		$resource = $this->connection->query( $sql )->fetch();				
		return $resource;
	}
    public function isempty($sql) {
		if (empty ( $sql )) {
			die ( "Empty SQL Query." );
		}
		return true;
	}
    public function execute($sql) {
		$this->isempty ( $sql );
		try{			
            $stmt = $this->connection->exec($sql);
		}
		catch(PDOException $e){
			die("<br>" . $e->getMessage());
		}		
        return $stmt;
	}
}