<?php

class Users extends MY_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function createUser($data) {
        $this->db->insert('Users', $data);
    }
    
    public function getUser($name) {
        $user = $this->db->query('SELECT * FROM users WHERE username = \''. $name .'\'')->row();
        return $user;
    }
    
    public function getAllUsers() {
        $user = $this->db->query('SELECT * FROM users')->result_array();
        return $user;
    }
}