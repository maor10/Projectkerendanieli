<?php

//CONNECTS TO TABLES: 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Surveys extends MX_Controller {

    /**
     * TODO check logged in
     */
    public function index($code="0") {

        $this->load->model('unimodel');
        $this->load->model('doctors/doctors_model');
        
        $campaignID = $this->unimodel->getRunningCampaign();

        $doctors = json_decode(json_encode($this->doctors_model->getDoctorsForCampaign($campaignID)), true);

        $passdata = array(
            'Name' => 'Survey',
            'Doctors' => $doctors,
            'code' => $code
        );
        

        $this->load->view("surveys_view", $passdata);
    }
    
    /**
     * Send a response from the user
     */
    public function sendResponse() {

        if($this->input->post('responsername') && $this->input->post('doctorid') 
                && $this->input->post('hospital') && $this->input->post('grade') 
                && $this->input->post('responserid')
                && $this->input->post('responsertype') && $this->input->post('phonenumber') 
                && $this->input->post('email')){
            $this->load->model('unimodel');

            $this->load->model('surveys_model');

            $campaignID = $this->unimodel->getRunningCampaign();
            $post = $this->input->post();
            $post["campaignid"] = $campaignID;
            $this->surveys_model->addResponse($post);
            
            $this->index("1");
        }else{
            echo "Not all fields were filled";
        }
    }

    

}
