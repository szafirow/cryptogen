<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Model_Register $Model_Register
 */
class Register extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Register');
    }

    public function index()
    {
        $this->load->view('tpl/head');
        $this->load->view('tpl/register');
        $this->load->view('tpl/footer');
    }

    public function action()
    {
        //rejestracja
        $this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[3]|max_length[20]|callback_checkLogin');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]|valid_email');
        $this->form_validation->set_rules('password', 'Hasło', 'trim|required|min_length[5]|max_length[20]|callback_checkPass');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('item', array('message' => validation_errors(), 'class' => 'danger'));
            redirect("/");
        } else {
            $this->Model_Register->insert();
            $this->session->set_flashdata('item', array('message' => 'Nowe konto utworzne!', 'class' => 'success'));
            redirect("/");
        }
    }

    public function checkLogin()
    {
        $login = $this->input->post('login');

        if ($this->Model_Register->loginTest($login) == TRUE) {
            $this->form_validation->set_message('checkLogin', 'Taki Login istnieje już w bazie.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkPass()
    {
        $password = $this->input->post('password');
        $repeat_password = $this->input->post('password_repeat');

        if ($password != $repeat_password) {
            $this->form_validation->set_message('checkPass', 'Wprowadzone hasła nie są identyczne.');
            return FALSE;
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $this->form_validation->set_message('checkPass', 'Hasło powinno zawierać co najmniej jedną cyfrę.');
            return FALSE;
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $this->form_validation->set_message('checkPass', 'Hasło musi zawierać conajmniej jedną literę.');
            return FALSE;
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $this->form_validation->set_message('checkPass', 'Hasło powinno zawierać co najmniej jedną dużą literę.');
            return FALSE;
        } elseif (!preg_match("#\W+#", $password)) {
            $this->form_validation->set_message('checkPass', 'Hasło powinno zawierać co najmniej jeden symbol.');
            return FALSE;
        } else {
            return TRUE;
        }
    }


}
