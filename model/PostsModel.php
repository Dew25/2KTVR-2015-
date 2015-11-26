<?php
class PostsModel extends DBH {

	//конструктор класса
	public function PostsModel()
	{
		parent::DBH('post');
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
		$stmt = $this->getDBH()->prepare($sql);
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
	 * @return  boolean  удалось или нет добавление
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
			$stmt = $this->getDBH()->prepare($sql);
			$stmt->execute(array($add_date,$add_autor,
				$add_title,$add_content));

			//$link = open_database_connection();
			//	mysql_query($sql, $link) OR die("Запрос не выполнен ".mysql_error());
			//close_database_connection($link);
		
		return true;
	}

	
	/**
	 * Обновляем запись с $id=$_REQUEST['id'];
	 * @return boolean	удалось или неудалось обновление
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
			$stmt = $this->getDBH()->prepare($sql);
			$stmt->execute(array($date,$autor,$title,$content,$id));
			// $link = open_database_connection();
			// 	mysql_query($sql, $link) OR die("Запрос не выполнен ".mysql_error());
			// close_database_connection($link);
		
		return true;
	}
	public function delete_post($id){
		//$link = open_database_connection();
		$sql="DELETE FROM post WHERE id=?";
		$stmt = $this->getDBH()->prepare($sql);
		$stmt->execute([$id]);
		//$result = mysql_query($sql, $link);
		
		//$row = mysql_fetch_assoc($result);
		//$post = $stmt->fetch();
		
		//close_database_connect ion($link);
		
		return $stmt;
	}

}