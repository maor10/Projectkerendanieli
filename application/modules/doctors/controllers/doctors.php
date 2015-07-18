<?php

//CONNECTS TO TABLES: campaigns
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Doctors extends MX_Controller {

    /**
     * TODO check logged in
     */
    public function index() {

        $this->load->model('doctors_model');
        $this->load->model('unimodel');

        $campaignID = $this->unimodel->getRunningCampaign();

        $doctors = json_decode(json_encode($this->doctors_model->getDoctorsForCampaign($campaignID)), true);

        $passdata = array(
            'Name' => 'Doctors',
            'Doctors' => $doctors
        );
        //$this->load->module('Template');
        //$this->Template->loadView("Home","HomeView",$passdata);

        $module = Modules::load('admin');

        $module->loadView("Doctors", "doctors_view", $passdata);
    }

    /**
     * Imports doctors via csv
     * Does not make any checks, TODO check logged in
     */
    function importDoctorsCsv() {
        $this->load->model('doctors_model');
        $this->load->model('unimodel');
        $campaignID = $this->unimodel->getRunningCampaign();

        $this->load->library('csvimport');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '8000000';

        $this->load->library('upload', $config);


        // If upload failed, display error
        if (!$this->upload->do_upload("userfile")) {
            echo $this->upload->display_errors();
        } else {
            $file_data = $this->upload->data();
            $file_path = './uploads/' . $file_data['file_name'];
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'hospital' => $row['hospital'],
                        'name' => $row['name'],
                        'campaignid' => $campaignID
                    );

                    //$ech = $this->Families_model->addMemberToInstituteWithData($insert_data);
                    $id = $this->doctors_model->addDoctorToCampaign($insert_data);
                }
            } else {
                $passdata = array(
                    'Name' => 'Doctors',
                    'Error' => "Could not import doctors. Contact System Admin."
                );
                //$this->load->module('Template');
                //$this->Template->loadView("Home","HomeView",$passdata);

                $module = Modules::load('Template');

                $module->loadView("Doctors", "doctors_view", $passdata);
            }
        }
    }

    /**
     * Deletes doctor
     * @post doctorid the doctor to remove
     * TODO check if logged in
     */
    public function removeDoctor() {
        if ($this->input->post('doctorid')) {
            $this->load->model('doctors_model');
            $this->doctors_model->removeDoctor($this->input->post('doctorid'));
        }
    }

}
