<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_model extends CI_Model{
    
    const TB_ADMIN ='ci_admin'; 

    public function get_admin($admin_name,$password)
    {
        $condition = array(
            'admin_name' => $admin_name,
            'password' =>  md5($password)     
       
        );
        $query = $this->db->where($condition)->get(self::TB_ADMIN);
        return $query->num_rows() >0 ? true : false ;
    }
}
