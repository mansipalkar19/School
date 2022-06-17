<?php
class modelschool extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
    }

     //================method to insert data=====================//
    function insertdata($tablename, $single_insert_array)
    {
        $query = $this->db->insert($tablename, $single_insert_array);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    //=============check data exist in table==========================//
    function is_data_exist($id, $tablename, $field_name, $field_value)
    {
        $sql = "select * from ".$tablename." WHERE ".$field_name." = '" . $field_value . "'";
        if($id!=''){
            $sql .= " and id !='".$id."'";
        }
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

         //============get total count for pagination===================//
    function get_cust_list_num_rows($tablename, $orderby)
    {
        $sql = "select * from ".$tablename." ";
        
        if ($this->session->userdata('filters') != '') {
            $sql .= " where schoolname like '%" . addslashes(trim($this->session->userdata('filters'))) . "%'";
        }
        
        $sql .= " order by ".$orderby." DESC ";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
    }

    //============get all list with pagination====================//
    function get_cust_list($page, $per_page, $tablename, $orderby, $search_value, $search_keyword, $search_date_field, $search_from_date, $search_to_date)
    {
        $sql = "select * from ".$tablename."";

        if ($this->session->userdata('filters') != '') {
            $sql .= " where schoolname like '%" . addslashes(trim($this->session->userdata('filters'))) . "%'";
        }

        $sql .= " order by ".$orderby."  ";

       
            $sql .= " limit " . $page . "," . $per_page;
       
        //echo $sql;die();
        $query = $this->db->query($sql);
        //echo $this->db->last_query();die();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

     //===============delete method======================//
    function delete($tablename, $id)
    {
        $sql = "Delete from ".$tablename." where id='" . $id . "'";
        $query = $this->db->query($sql);
        return true;
    }

      //==================update method==================//
    function update($tablename, $single_update_array, $fieldname, $field_value)
    {
        $this->db->where($fieldname, $field_value);
        $query = $this->db->update($tablename, $single_update_array);
            //echo $this->db->last_query();die();
        if($query){
            return true;
        }else{
            return false;
        }
    }

}