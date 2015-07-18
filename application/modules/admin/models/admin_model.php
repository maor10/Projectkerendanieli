<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of template_model
 *
 * @author Maor
 */
class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkPassword($password) {
        $this->db->select('*')->from('admin')->where('password', md5($password));
        $result = $this->db->get()->result();
        return (count($result) == 1);
        
    }


}