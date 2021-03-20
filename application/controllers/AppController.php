<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("BasicModel", "Basic");
        $this->load->helper("my");
        $this->auth->logged();
    }

    public function index()
    {
        $this->load->view('template/admin/app');
    }
}