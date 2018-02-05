<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Model_Main $Model_Main
 */
class Main extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Main');
    }

    public function index()
    {
        $this->is_logged_in();
        $data['login'] = $this->login;
        $data['logged_in'] = $this->session->userdata('logged_in');
        $data['token'] = $this->Model_Main->getToken($this->id);

        $this->load->view('tpl/head');
        $this->load->view('tpl/main',$data);
        $this->load->view('tpl/footer');
    }
}
