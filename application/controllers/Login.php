<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Model_Login $Model_Login
 */
class Login extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Login');
    }

    public function index()
    {
        $this->load->view('tpl/head');
        $this->load->view('tpl/login');
        $this->load->view('tpl/footer');
    }

    public function action()
    {
        //logowanie
        $this->form_validation->set_rules('login', 'Login', 'trim|required|callback_checkLogin');
        $this->form_validation->set_rules('password', 'Hasło', 'trim|required|callback_checkPassword');

        if ($this->form_validation->run() == FALSE) {
            //nie zalogowany
            $this->session->set_flashdata('item', array('message' => validation_errors(), 'class' => 'danger'));
            redirect("/");
        } else {

            $result = $this->Model_Login->login();
            if ($result) {
                $sess_array = array();
                $sess_array = $result;
                $this->session->set_userdata('logged_in', $sess_array);
                $this->session->set_flashdata('item', array('message' => 'Zalogowany!', 'class' => 'success'));
                redirect("/main");
            }

        }
    }

    public function checkLogin()
    {
        $str = $this->input->post('login');

        if ($this->Model_Login->loginAndEmailTest($str) == FALSE) {
            $this->form_validation->set_message('checkLogin', 'Taki login nie istnieje w bazie danych.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkPassword()
    {
        $result = $this->Model_Login->login();
        if (!$result) {
            $this->form_validation->set_message('checkPassword', 'Wprowadzono błędne hasło.');
            return FALSE;
        } else {
            return TRUE;
        }

    }


    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->set_flashdata('item', array('message' => 'Wylogowano pomyślnie!', 'class' => 'success'));
        redirect("/");
        $this->session->sess_destroy();
    }


}
