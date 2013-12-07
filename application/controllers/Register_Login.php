<?php  
    class Register_Login extends CI_Controller{  
	
		function Register_Login(){
			parent::__construct();
			$this->view_data['base_url'] = base_url();
			$this->load->model('Register_model');
		}
        function index()  
        {  
			$this->register();
        }  
		
		function register(){
			
			$this->form_validation->set_rules('full_name','Full Name' , 'required|min_length[6]|xss_clean');
			$this->form_validation->set_rules('email','Email Address' , 'required|valid_email|xss_clean|callback_emailNotExist');
			$this->form_validation->set_rules('pass','Password' , 'required|min_length[6]|xss_clean');
			$this->form_validation->set_rules('re_pass','Confirm Password' , 'required|min_length[6]|xss_clean|matches[pass]');
			if($this->form_validation->run() == FALSE){
				//either not run or validation erros
				$this->load->view('Register_Login_view',$this->view_data); 
			}
			else{
				//everything is good process the form
				$name = $this->input->post('full_name');
				$email = $this->input->post('email');
				$pass = $this->input->post('pass');
				$this->Register_model->registerUser($name,$email,$pass);
				redirect('Register_Login/registered');
			}
		}
		function emailNotExist($email){
		
			$this->form_validation->set_message('emailNotExist','Email Address Already Exist.');
			if($this->Register_model->checkExistEmail($email)){
				return false;
			}
			else{
				return true;
			}
		
		}
		function registered(){
			$this->load->view('Registered'); 
			
		}
    }  
?>  