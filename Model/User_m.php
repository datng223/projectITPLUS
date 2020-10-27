<?php 
	//Kết nối CSDL, viết các hàm truy vấn
	include_once '../../Config/myConfig.php';
	class User_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct(); //Tự động chạy kết nối CSDL
		}

		//Các hàm truy vấn đến db
		public function getUser(){
			$sql = "SELECT *FROM tbl_user, tbl_showroom WHERE tbl_user.showroom_id = tbl_showroom.id";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			$result = array();
			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
			return $result;
		}


		public function removeUser($id){
			$sql = "DELETE FROM tbl_user WHERE id = :id";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id);
			$pre->execute();
			return $this->pdo->query($sql);
		}

		public function getShowroom(){
			$sql = "SELECT *FROM tbl_showroom";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			$result = array();
			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
			return $result;
		}

		// Thêm điện thoại
		public function addUser($showroom_id, $name, $passw, $addres, $salary)
		{
			$sql = "INSERT INTO tbl_user(showroom_id, name, passw, addres, salary) VALUES (:showroom_id, :name, :passw,:addres, :salary)";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':showroom_id', $showroom_id);
			$pre->bindParam(':name', $name);
			$pre->bindParam(':passw', $passw);
			$pre->bindParam(':addres', $addres);
			$pre->bindParam(':salary', $salary);
			return $pre->execute();
		}

		// Tìm kiếm học viên qua SĐT
		function searchUser($user){

			$sql = "SELECT *FROM tbl_user, tbl_showroom
					WHERE tbl_user.showroom_id = tbl_showroom.id AND name LIKE :user";
			$pre = $this->pdo->prepare($sql);
			$pre->bindValue(":user", '%'.$user.'%');
			$pre->execute();
			$result = array();

			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
			return $result;
		}

	}
 ?>