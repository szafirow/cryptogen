<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('tpl/head');
        $this->load->view('tpl/index');
        $this->load->view('tpl/footer');
    }
}
