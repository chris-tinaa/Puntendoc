<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        //cek session dan level user
        if($this->admin->is_role() != "admin"){
            if($this->admin->is_role() == "user"){
                redirect("index.php/user/dashboard");
            }else{
                redirect("login");
            }
        }
    }

    public function index()
    {

        $this->load->view("admin/dashboard");       

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}