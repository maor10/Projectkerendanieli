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
class Responses_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getResponsesForCampaign($campaignID){
        $this->db->select("responses.*, doctors.name AS doctorname")->from("responses")
                ->join('doctors', 'responses.doctorid = doctors.id')
                ->where("responses.campaignid", $campaignID);
        $result = $this->db->get()->result();
        
        return $result;
        
    }
}