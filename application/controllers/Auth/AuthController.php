<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("BasicModel", "BM");
        $this->load->helper("my");
        $this->auth->auth();
    }

    //@desc     login view
    //@route    GET /login
    public function index()
    {
        $data['title'] = 'Login Form';
        $data['view'] = 'screen/auth/login';
        $this->load->view('template/auth/app', $data);
    }

    //@desc     login logic to verify users
    //@route    GET /check-login
    public function checkLogin()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        if (strlen($email) <= 0) {
            resJson(["errors" => ["email" => "Email tidak boleh kosong"]]);
        }

        if (strlen($password) <= 0) {
            resJson(["errors" => ["password" => "Password tidak boleh kosong"]]);
        }

        $user = $this->BM->getWhere('users', ["email" => $email])->row();
        if (!$user) {
            resJson(["errors" => [
                "email" => "Email tidak terdaftar",
            ]]);
        }

        if (!password_verify($password, $user->password)) {
            resJson(["errors" => [
                "password" => "Password tidak cocok",
            ]]);
        }

        $session = array(
            "user_id" => $user->id,
            "name" => $user->name,
            "email" => $user->email,
        );

        $this->session->set_userdata(SESSION_KEY, $session);
        resJson([
            "success" => true,
            "type" => "login",
            "redirect" => base_url("admin"),
            "currentUrl" => base_url("admin/home"),
        ]);
    }
}