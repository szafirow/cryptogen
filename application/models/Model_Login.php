<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2018-02-05
 * Time: 19:53
 */

class Model_Login extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function login()
    {
        $login = $this->input->post('login');
        $password = $this->input->post('password');

        //pobranie hash
        $this->db->select('id,login,email,password');
        $this->db->from('users');
        $this->db->where('active', 1);
        $this->db->where('login', $login);
        $this->db->or_where('email', $login);


        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            $result = $query->result_array();
            $hash = $result['0']['password'];

            if (password_verify($password, $hash)) {
                $value = array(
                    'id' => $result['0']['id'],
                    'login' => $result['0']['login']
                );
                return $value;
            } else {
                return FALSE;
            }
        }
    }


    function loginAndEmailTest($str)
    {
        $this->db->select('login,email');
        $this->db->from('users');
        $this->db->where('login', $str);
        $this->db->or_where('email', $str);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}