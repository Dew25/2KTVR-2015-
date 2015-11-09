<?php
class Model{
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
	function Model(){	
		$dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
		$opt = array(
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $opt);
			
		} catch (Exception $e) {
			echo "error! "+$e;
		}

		
	}

	/**
	 * Добываем все записи из таблицы post
	 * Возвращает массив записей таблицы $posts.
	 */
	public function get_all_posts() {
		//$link = open_database_connection();
		
		$sql='SELECT id,title FROM post';
		$stmt=$this->dbh->query($sql);

		//$result = mysql_query('SELECT id,title FROM post', $link);
		$posts = array();
		while ($row = $stmt->fetch()) {
			$posts[] = $row;
		}
		
		//close_database_connection($link);
		
		return $posts;
	}

	/**
	 * Добываем запись с id = $id;
	 * 
	 * Возвращает массив содержащий запись $post.
	 */
	public function get_post_by_id($id){
		//$link = open_database_connection();
		$sql="SELECT `title`,`content`,`autor`,`date` 
				FROM post WHERE id=?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute([$id]);
		//$result = mysql_query($sql, $link);
		
		//$row = mysql_fetch_assoc($result);
		$post = $stmt->fetch();
		
		//close_database_connection($link);
		
		return $post;
	}

	/**
	 * Добавляет запись в таблицу post
	 * 
	 * false - если добавление неудалось
	 * true  - если добавление сделано.
	 */
	public function add_post(){
		if(empty($_REQUEST['add_autor']) 
				AND empty($_REQUEST['add_title']) 
					AND empty($_REQUEST['add_content'])){

			echo "Пропущена запись!";
			return false;
		}
			$add_autor=$_REQUEST['add_autor'];
			$add_date= date("Y-m-d H:i:s");
			$add_title=$_REQUEST['add_title'];
			$add_content=$_REQUEST['add_content'];

			$sql="INSERT INTO post (`date`,autor,title,content)
			VALUES (?, ?, ?, ?)";
			$stmt = $this->dbh->prepare($sql);
			$stmt->execute(array($add_date,$add_autor,
				$add_title,$add_content));

			//$link = open_database_connection();
			//	mysql_query($sql, $link) OR die("Запрос не выполнен ".mysql_error());
			//close_database_connection($link);
		
		return true;
	}

	/**
	 * Обновляем запись с $id=$_REQUEST['id'];
	 * 
	 * Возвращает:
	 * false - если обновление неудалось
	 * true  - если обновение сделано.
	 */
	public function update(){
		
		if(empty($_REQUEST['id'])
			AND empty($_REQUEST['add_autor']) 
					AND empty($_REQUEST['add_title']) 
						AND empty($_REQUEST['add_content'])){

			echo "Пропущена запись!";
			return false;
		}
			$id=$_REQUEST['id'];
			$add_autor=$_REQUEST['add_autor'];
			$add_date=date("Y-m-d H:i:s");
			$add_title=$_REQUEST['add_title'];
			$add_content=$_REQUEST['add_content'];

			$sql="UPDATE `post` SET `date`=?,`autor`=?,
				`title`=?,`content`=? WHERE id=?";
			$stmt = $this->dbh->prepare($sql);
			$stmt->execute(array($date,$autor,$title,$content,$id));
			// $link = open_database_connection();
			// 	mysql_query($sql, $link) OR die("Запрос не выполнен ".mysql_error());
			// close_database_connection($link);
		
		return true;
	}

}