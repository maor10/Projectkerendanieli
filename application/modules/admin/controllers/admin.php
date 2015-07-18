<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MX_Controller {

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

    public function index($login = 1) {
        //Check if user is logged in
        if (!$this->session->userdata('logged_in_to_admin')) {
            $data = array(
                "title" => "Login",
                "viewPath" => null,
                "passData" => null,
                "login" => $login //not necessary=0, first time attempt=1, second time+ attempt=2
            );
            $this->load->view('admin_view', $data);
        }else{
            redirect(base_url()."index.php/doctors");
        }
        
    }
    public function loadView($title, $viewpath, $passdata) {
        //Check if user is logged in
        if (!$this->session->userdata('logged_in_to_admin')) {
            $this->index();
            return;
        }

        $this->load->model('admin_model');

        //$runningCampaignID = $this->template_model->getRunningCampaign();

        $data = array(
            "title" => $title,
            "viewPath" => $viewpath,
            "passData" => $passdata,
            "login" => 0 //no login necessary
        );
        $this->load->view('admin_view', $data);
    }
    
    /**
     * @POST password
     */
    public function login() {
        $this->load->model('admin_model');
        if($this->admin_model->checkPassword($this->input->post("password"))){
            $this->session->set_userdata('logged_in_to_admin', true);
            redirect(base_url()."index.php/doctors");
        }else{
            $this->index(2);
        }
    }

}
