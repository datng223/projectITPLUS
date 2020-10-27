<?php  
	include_once "../../Model/User_m.php";

	/**
	 * 
	 */
	class User_c extends User_m
	{
		private $user;

		function __construct()
		{
			$this->user = new User_m(); // Tự động chạy cái hàm __construct
		}

		public function getUser(){
			return $this->user->getUser();
		}

		public function removeUser($id){
			return $this->user->removeUser($id);
		}

		public function searchUser($name){
			return $this->user->searchUser($name);
		}
	}

?>