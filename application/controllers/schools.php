<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class schools extends CI_Controller {

    function __construct()
    {
    parent::__construct();
    $userid = $this->session->userdata('user_data');
        if (empty($userid)) {
            redirect(base_url() . "account");
            return false;
        } 
    $this->load->model('modelschool');
        
    }

    public function index()
    { 
        $data['success_msg'] = $this->session->userdata('success_msg');
        $data['error_msg'] = $this->session->userdata('error_msg');
        $this->session->set_userdata('success_msg', "");
        $this->session->set_userdata('error_msg', "");
        
        $this->load->library('pagination');
        if($this->input->post('search_name') != '')
        {
            $this->session->set_userdata('filters',$this->input->post('search_name'));
        }
        $config['base_url'] = base_url().'schools/index/';

        $config['total_rows'] = $this->modelschool->get_cust_list_num_rows('schools','id');
        $config['per_page'] = 20; 
        $page = $this->uri->segment(3);
        if(!$page){
          $page = 0;
        }
         $this->pagination->initialize($config); 
            //echo "<pre>";print_r($data['user_search']);die();
        $data['links'] = $this->pagination->create_links();
        
        $data['branch']= $this->modelschool->get_cust_list($page,$config['per_page'],'schools','id','','','','','');
        
            //echo "<pre>"; print_r($data['branch']);
        $data['page_no'] = $page;

        $this->load->view('schools/school',$data);
    }
    public function create()
    {
        $this->load->view('schools/create');
    }

    public function reset()
    {
        $this->session->unset_userdata('filters');
        redirect(base_url().'schools');
    }

    public function do_add()
    {
    $check =$this->modelschool->is_data_exist('', 'schools', 'schoolname', trim($this->input->post('schoolname')));
    if($check)
    {
      $insert_arr=array(
        'schoolname' => $this->input->post('schoolname'),
        'location' => $this->input->post('location'),
        'created_on' => date('Y-m-d H:i:s'),
        'created_by' => $this->session->userdata('user_data'),
      );
            //print_r($insert_arr);die();
      if($this->modelschool->insertdata('schools', $insert_arr))
      {
        $this->session->set_userdata('success_msg', "Data added successfully");
        redirect(base_url().'schools');
      }
    }
    else
    {
      $this->session->set_userdata('error_msg', "Customer already exist!");
      redirect(base_url().'schools/create');
    }
    }

     public function delete()
    {
        $id=$this->input->post('id');
        $this->modelschool->delete('schools',$id);
        redirect(base_url().'schools');
    }

    //=============edit post==========================//
    function do_edit()
    {
      $id = $this->input->post('id');
      $userid = $this->session->userdata('secure_data');
      if($this->modelschool->is_data_exist($id,'schools','schoolname',$this->input->post('schoolname')) == TRUE)
      {
        $updatearr = $this->input->post();
               
        if($this->modelschool->update('schools', $updatearr, 'id', $id));
        {
          $this->session->set_userdata('success_msg', "Data updated successfully");
          redirect(base_url()."schools");
        }
      }
      else
      {
        $this->session->set_userdata('error_msg', "This School Name already exist!");
        redirect(base_url()."schools");
      }
    }

  
 }