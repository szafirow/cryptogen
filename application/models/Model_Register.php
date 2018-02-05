<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2018-02-05
 * Time: 18:54
 */

class Model_Register extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert()
    {
        $login = $this->input->post('login');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = array(
            'login' => $login,
            'email' => $email,
            'password' => $this->encrypt_password($password),
            'token' => md5(uniqid($login, true)),
            'active'=>1,
            'date_add' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('users', $data);
    }

    private function encrypt_password($password)
    {
        $options = array(
            'cost' => 11,
        );
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function loginTest($login)
    {
        $this->db->select('login');
        $this->db->from('users');
        $this->db->where('login', $login);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}