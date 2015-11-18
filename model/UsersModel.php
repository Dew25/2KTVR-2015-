<?php
class UsersModel{

private $dbh;
	private $user="mvcpattern";
	private $pass="mvcpattern";
	private $db="mvcpattern";
	private $charset="UTF8";
	private $host="localhost";
	
	/**
	*	Конструктор
	*	http://phpfaq.ru/pdo
	*/
	function UsersModel(){	
		$dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
		$opt = array(
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $opt);
			
		} catch (Exception $e) {
			echo "error!";
		}

		
	}
	public function get_all_rows() {
		//$link = open_database_connection();
		
		$sql='SELECT * FROM users';
		$stmt=$this->dbh->query($sql);

		//$result = mysql_query('SELECT id,title FROM post', $link);
		$posts = array();
		while ($row = $stmt->fetch()) {
			$rows[] = $row;
		}
		
		//close_database_connection($link);
		
		return $rows;
	}

}