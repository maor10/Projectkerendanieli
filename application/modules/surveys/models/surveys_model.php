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
class Surveys_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addResponse($input){
        $this->db->insert("responses", $input);  
    }
   
}