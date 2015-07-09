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
class Template_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRunningCampaign() {
        $this->db->select('CampaignID')->from('campaigns')->where('IsPaused', 0)->where('enabled', 1)->where('InstituteID', $this->session->userdata("InstituteID"))->where('CURDATE() BETWEEN StartDate AND EndDate', NULL, FALSE)->limit(1, 0);
        $result = $this->db->get()->result();
        if (count($result) == 0)
            return 'e1';
        return $result[0]->CampaignID;
    }

    public function getHelpForPageIfInstituteNotSeen($pageTitle) {
        $this->db->select('helppagesinstituteseen.HelpID')->from('helppagesinstituteseen');
        $this->db->join('helppages', 'helppages.HelpID = helppagesinstituteseen.HelpID');
        $this->db->where('helppages.Page', $pageTitle);
        $this->db->where('helppagesinstituteseen.InstituteID', $this->session->userdata("InstituteID"));
        $result = $this->db->get()->result();
        if (count($result) == 0) {
            //show user help, hasnt seen it
            $this->db->select('HelpID, VideoURL')->from('helppages');
            $this->db->where('Page', $pageTitle);
            $result1 = $this->db->get()->result();
            if(count($result1) == 0){
                //Help page not created yet for this page
                return "";
            }
            //put it in db
            $data = array(
                'HelpID' => $result1[0]->HelpID,
                'InstituteID' => $this->session->userdata("InstituteID")
            );

            $this->db->insert('helppagesinstituteseen', $data);

            return $result1[0]->VideoURL;
        } else {
            return "";
        }
    }

}