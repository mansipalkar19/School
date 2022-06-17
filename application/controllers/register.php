
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {
  function __construct()
    {
        parent::__construct();
       
            
    }
    public function index()
    {
        $this->load->view('account/register');
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

                $role = $this->session->userdata('role');
                $this->session->set_userdata('success_msg', "You have logged in successfully.");
                redirect(base_url()."dashboard/index");
            }
            else
            {
                //echo validation_errors();die();
                //echo "hello";die();
                $this->session->set_userdata('error_msg', "Username and Password do not match!");
                redirect(base_url()."account");
            }
        }
        else
        {
         $this->session->set_userdata('error_msg', "Enter Username & password");
         redirect(base_url()."account");
     }
 }
}
