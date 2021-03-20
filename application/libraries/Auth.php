<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth
{
    protected $ci;

    public $user_id;
    public $name;
    public $email;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->me();
    }

    public function logged()
    {
        if (!$this->ci->session->userdata(SESSION_KEY)) {
            redirect("login");
        }
    }

    public function auth()
    {
        if ($this->ci->session->userdata(SESSION_KEY)) {
            redirect("admin");
        }
    }

    public function me()
    {
        if ($this->ci->session->userdata(SESSION_KEY)) {
            $this->user_id = $_SESSION[SESSION_KEY]["user_id"];
            $this->name = $_SESSION[SESSION_KEY]["name"];
            $this->email = $_SESSION[SESSION_KEY]["email"];
        }
    }
}
