<?php 
	include "db_config.php";
	class User{
		protected $db;
		public function __construct(){
			$this->db = new DB_con();
			$this->db = $this->db->ret_obj();
		}
		
		/*** for registration process ***/
		public function reg_user($fname,$lname,$pnum,$password,$cpassword,$email){
			//echo "k";
			  if($cpassword != $password){
				$password = md5($password);
	
				//checking if the username or email is available in db
				$query = "SELECT * FROM users WHERE uemail='$email'";
				
				$result = $this->db->query($query) or die($this->db->error);
				
				$count_row = $result->num_rows;
				
				//if the email is not in db then insert to the table
				if($count_row == 0){
					$query = "INSERT INTO users SET pnumber='$pnum', upass='$password', firstname='$fname', lastname='$lname', uemail='$email'";
					
					$result = $this->db->query($query) or die($this->db->error);
					
					return true;
				}
				else{return false;}
			  }
			  else{return false;}
			
			}
			
			
	/*** for login process ***/
		public function check_login($uemail, $password){
        $password = md5($password);
		
		$query = "SELECT uid from users WHERE uemail='$uemail' and upass='$password'";
		
		$result = $this->db->query($query) or die($this->db->error);

		
		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		$count_row = $result->num_rows;
		
		if ($count_row == 1) {
	            $_SESSION['login'] = true; // this login var will use for the session thing
	            $_SESSION['uid'] = $user_data['uid'];
	            return true;
	        }
			
		else{return false;}
		

	}
	
	
	public function get_fullname($uid){
		$query = "SELECT firstname, lastname FROM users WHERE uid = $uid";
		
		$result = $this->db->query($query) or die($this->db->error);
		
		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		echo $user_data['firstname'].' '.$user_data['lastname'];
		
	}
	
	/*** starting the session ***/
	public function get_session(){
	    return $_SESSION['login'];
	    }

	public function user_logout() {
	    $_SESSION['login'] = FALSE;
		unset($_SESSION);
	    session_destroy();
	    }
	
	
	
	
	
	
	
	
	
}