<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2018-02-05
 * Time: 20:31
 */

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //uzupelnienie sesji
        $logged_in = $this->session->userdata('logged_in');
        if (!empty($logged_in)) {
            $this->login = $logged_in['login'];
            $this->id = $logged_in['id'];
        }

    }

    function is_logged_in()
    {
        $logged_in = $this->session->userdata('logged_in');

        if (empty($logged_in)) {
            show_error('You don\'t have permission to access this page.', 401);
            die();
        }
    }

}