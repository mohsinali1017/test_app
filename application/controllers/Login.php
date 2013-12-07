<?php  
    class Login extends CI_Controller{  
	
		public static $some_result;
		
		function Login(){
			parent::__construct();
			$this->view_data['base_url'] = base_url();
			$this->load->model('Register_model');
		}  
		
		/*function index()
		{
			$this->loginMe();
		}*/
		
		
		function loginMe(){
			$this->form_validation->set_rules('email','Email Address' , 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('pass','Password' , 'required|min_length[6]|xss_clean');
			if($this->form_validation->run() == FALSE){
				//either not run or validation erros
				$this->load->view('Login_view',$this->view_data);
			}
			else{
				//everything is good process the form
				$email = $this->input->post('email');
				$pass = $this->input->post('pass');
				$result = $this->Register_model->loginUser($email,$pass);
				
				if($result!== -1){
						$this->takeMeToHomePage($result[0]->id);
				}
				else{
						$this->load->view('Login_view',$this->view_data);
				}
			}
			
		}
		function takeMeToHomePage($user_id){ 
			redirect("Login/home/$user_id");
		}
		
		function home($user_id){
			$this->view_data['user_data'] = $this->Register_model->getLastLogins($user_id);
			$this->load->view('Home_view',$this->view_data); 
		}
		
    }  
?>  