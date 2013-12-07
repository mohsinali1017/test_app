<?php  
class Register_model extends CI_Model {  
  
    function __construct()  
    {  
        // Call the Model constructor  
        parent::__construct();  
    }  
      
    function registerUser($name,$email,$pass){  
            $encrypt_pass = sha1($pass);
			$query_str = "INSERT into user (name,email,pass) VALUES (?,?,?)";
			$this->db->query($query_str,array($name,$email,$encrypt_pass));
        }  
	function loginUser($email,$pass){  
            $encrypt_pass = sha1($pass);
			$query_str = "SELECT * from user WHERE email = ? AND pass = ?";
			$result = $this->db->query($query_str,array($email,$encrypt_pass));
			if($result->num_rows()>0){
				$time = date('Y/m/d H:i:s');
				$result = $result->result();
				$query_str = "INSERT into login_user (user_id,time_of_login) VALUES (?,?)";
				$this->db->query($query_str,array($result[0]->id,$time));	
				return $result;
				 
			}
			else{
				return -1;
			}
				
				
    }
		
	function checkExistEmail($email){
			$query_str = "SELECT email from user WHERE email = ?";
			$result = $this->db->query($query_str,$email);
			if($result->num_rows()>0){
				return true;
			}
			else{
				return false;
			
			}
	}
	
	function loginPutUser($user_id){
			$time = date('Y/m/d H:i:s');
			$query_str = "INSERT into login_user (user_id,time_of_login) VALUES (?,?)";
			$this->db->query($query_str,array($user_id,$time));	
	}
	
	function getLastLogins($user_id){
			$query_str = "SELECT * from login_user WHERE user_id = ? ORDER BY id DESC LIMIT 5;";
			$result = $this->db->query($query_str,$user_id);	
			return $result = $result->result();
	}
}  
?> 