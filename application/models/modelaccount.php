<?php
class modelaccount extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
    }

 //====================authenticate method======================//
    function authenticateUser()
    {
        $email = $this->input->post('email', '');
        $password = $this->input->post('password', '');
        $sql = "select id, name
        from register
        where email = ?
        and password = ?
        ";
        
        $query = $this->db->query($sql, array($email, md5($password)));
        $rs = $query->result_array();
        if (count($rs) > 0) {
            $machine_ip = $_SERVER['REMOTE_ADDR'];
            $computer_name = gethostname();
            $update_arr = array(
                'last_login_ip' => $machine_ip,
                'last_login' => date('Y-m-d H:i:s'),
                'computer_name' => $computer_name,
                'last_logout' => '0000-00-00 00:00:00'
            );
            $this->db->where('id', $rs[0]['id']);
            $this->db->update("register", $update_arr);
            $this->session->set_userdata('user_data', $rs[0]['id']);
            return true;
        } else {
            return false;
        }
    }

     //================method to insert data=====================//
    function insertusers($tablename, $single_insert_array)
    {
        $query = $this->db->insert($tablename, $single_insert_array);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function logout()
    {
        $sql_update = "update register set
        last_logout =   NOW()
        where id    =   ? ";

        $query_update = $this->db->query($sql_update, array($this->session->userdata('user_data')));
    }
 }