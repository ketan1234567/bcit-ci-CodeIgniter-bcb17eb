<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');   // CI3 session
        $this->load->helper('url');        // optional
    }

    public function index()
    {
        // Get session data in CI3
        $data = [
            'username' => $this->session->userdata('username'),
            'role'     => $this->session->userdata('role'),
            'user_id'  => $this->session->userdata('user_id')
        ];

        // Load views (CI3 way)
        $this->load->view('header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('footer');
    }
}
