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
class Unimodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRunningCampaign() {
        $this->db->select('id')->from('campaigns')->where('running', 1)->limit(1, 0);
        $result = $this->db->get()->result();
        if (count($result) == 0){
            return 'e1';
        }
        return $result[0]->id;
    }

    
}
