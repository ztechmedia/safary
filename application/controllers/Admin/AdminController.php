<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("BasicModel", "BM");
        $this->load->helper("my");
        $this->auth->logged();
    }

    public function home()
    {
        $this->load->view('screen/admin/home');
    }
}