<?php
class UsersModel extends DBH{
	//конструктор класса
	public function UsersModel()
	{
		parent::DBH('users');
	}

	public function adduser(){
		if(empty($_REQUEST['code']) 
				AND empty($_REQUEST['firstname']) 
					AND empty($_REQUEST['lastname'])){

			echo "Пропущена запись!";
			return false;
		}
			$code=$_REQUEST['code'];
			$firstname=$_REQUEST['firstname'];
			$lastname=$_REQUEST['lastname'];

			$sql="INSERT INTO users (`code`,firstname,lastname)
			VALUES (?, ?, ?)";
			$stmt = $this->getDBH()->prepare($sql);
			$stmt->execute(array($code,$firstname,$lastname));

			//$link = open_database_connection();
			//	mysql_query($sql, $link) OR die("Запрос не выполнен ".mysql_error());
			//close_database_connection($link);
		
		return true;
	}

}