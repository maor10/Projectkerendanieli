<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template extends MX_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
    }

  
    public function loadView($title, $viewpath, $passdata) {
        //Check if user is logged in
       /* if (!$this->session->userdata('Logged_in')) {
            redirect(base_url(), 'refresh');
            return;
        }*/

        $this->load->model('template_model');

        //$runningCampaignID = $this->template_model->getRunningCampaign();

        $data = array(
            "title" => $title,
            "viewPath" => $viewpath,
            "passData" => $passdata
        );
        $this->load->view('template_view', $data);
    }

}