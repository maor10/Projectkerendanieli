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
class Doctors_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getDoctorsForCampaign($campaignID){
        $this->db->select("*")->from("doctors")->where("campaignid", $campaignID);
        $result = $this->db->get()->result();
        
        $i = 0;
        foreach ($result as $row) {
            $this->db->select("count(*) AS recommendationcount")->from("responses")->where("doctorid", $row->id);
            $result1 = $this->db->get()->result();
            $result[$i]->recommendationcount = $result1[0]->recommendationcount;
            $i++;
        }
        
        
        return $result;
        
    }
    
    public function addDoctorToCampaign($insertData){
        $this->db->insert('doctors', $insertData); 
        
        return $this->db->insert_id();
    }

    public function removeDoctor($doctorID){
        $this->db->where('id', $doctorID);
        $this->db->delete('doctors'); 
        
        return $doctorID;
    }
   
}