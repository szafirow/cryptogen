<?php
/**
 * Created by PhpStorm.
 * User: patryk
 * Date: 2018-02-05
 * Time: 18:54
 */

class Model_Main extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getToken($id)
    {
        $this->db->select('token');
        $this->db->from('users');
        $this->db->where('active', 1);
        $this->db->where('id', $id);

        $query = $this->db->get();
        $result = $query->result_array();
        return $result['0']['token'];
    }

}