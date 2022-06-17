<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account extends CI_Controller {

    function __construct()
    {
    parent::__construct();
    $this->load->model('modelaccount');
        
    }

      function isLoggedIn()
    {
        $id = $this->session->userdata('user_data');
        if($id > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	public function index()
	{
        if($this->isLoggedIn())
        {
             redirect(base_url()."schools");
        }
        else{
           $data['success_msg']   = $this->session->userdata('success_msg');
        $data['error_msg']  = $this->session->userdata('error_msg');
       
        $this->load->view('account/login');
        }
        
	}

    public function register()
    {
        $data['success_msg']   = $this->session->userdata('success_msg');
        $data['error_msg']  = $this->session->userdata('error_msg');
       
        $this->load->view('account/register');
    }

     public function logout()
    {
        $this->modelaccount->logout();
        $this->session->sess_destroy();
       redirect(base_url().'account');
    }

	 public function do_login()
    {

        $data['success_msg']   = $this->session->userdata('success_msg');
        $data['error_msg']  = $this->session->userdata('error_msg');
        $this->session->set_userdata('success_msg', "");
        $this->session->set_userdata('error_msg', "");
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if($this->form_validation->run() == TRUE)
        {
            //echo "hii";die();
            if($this->modelaccount->authenticateUser($_POST['email'], $_POST['password']) == true)
            {
                $time = time() - 60*60;
                $emailcookie = array(
                    'name'   => 'EMAIL',
                    'value'  => '',
                    'expire' => $time
                );
                $this->input->set_cookie($emailcookie);
                $passwordcookie = array(
                    'name'   => 'PASSWORD',
                    'value'  => '',
                    'expire' => $time
                );
                $this->input->set_cookie($passwordcookie);
                $this->session->set_userdata('success_msg', "You have logged in successfully.");
                redirect(base_url()."schools");
            }
            else
            {
               $this->session->set_userdata('error_msg', "Username and Password do not match!");
                redirect(base_url()."account",$data);
            }
        }
        else
        {

         $this->session->set_userdata('error_msg', "Enter Username & password");
         redirect(base_url()."account",$data);
     }
 }

 function do_register()
{
    $data['success_msg']   = $this->session->userdata('success_msg');
    $data['error_msg']  = $this->session->userdata('error_msg');
    $this->session->set_userdata('success_msg', "");
    $this->session->set_userdata('error_msg', "");
    $this->load->library('form_validation');
    $this->session->set_userdata('error_msg', "");
    $this->form_validation->set_rules('name','Name','trim|required');
    $this->form_validation->set_rules('email','Email','trim|required');
    
     $rules = array(
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'callback_valid_password',
        ],
        [
            'field' => 'repeat_password',
            'label' => 'Confirm Password',
            'rules' => 'matches[password]',
        ],
    );
    $this->form_validation->set_rules($rules);


    if($this->form_validation->run() == FALSE)
    {
     $this->load->view('account/register', $data);
 }
 else
 {
    $machine_ip = $_SERVER['REMOTE_ADDR'];
    $computer_name = gethostname();
    $name=$this->input->post('name');
    $phone=$this->input->post('phone');

     $insertarr=array(
        'name'=>$this->input->post('name'),
        'email'=>$this->input->post('email'),
        'password'=>md5($this->input->post('password')),
        'last_login_ip' => $machine_ip,
        'last_login' => date('Y-m-d H:i:s'),
        'computer_name' => $computer_name,
        'last_logout' => '0000-00-00 00:00:00'
    );
     $query=$this->modelaccount->insertusers('register',$insertarr); 
      
    if($query){
        redirect(base_url()."account",$data);
    }else{
         $this->session->set_userdata('error_msg', "There is some error while registration!");
    redirect(base_url().'account/register',$data);
     //$this->session->set_userdata('error_msg', "Registration successfull!");
    }

}
}

 public function valid_password($password = '')
    {
        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
        if (empty($password))
        {
            $this->form_validation->set_message('valid_password', 'Password is required.');
            return FALSE;
        }
        if (preg_match_all($regex_lowercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The Password field must be at least one lowercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_uppercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The Password field must be at least one uppercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_number, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The Password field must have at least one number.');
            return FALSE;
        }
        if (preg_match_all($regex_special, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The Passwordfield must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
            return FALSE;
        }
        if (strlen($password) < 8)
        {
            $this->form_validation->set_message('valid_password', 'The Password field must be at least 8 characters in length.');
            return FALSE;
        }
       
        return TRUE;
    }


}
