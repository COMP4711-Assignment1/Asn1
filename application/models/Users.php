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
    
    public function reset() {
        $this->db->query('UPDATE users SET stocks = \'\'');
        $this->db->query('UPDATE users SET cash = 5000');
    }
    
    public function getCash($name) {
        return $this->db->query('SELECT cash FROM users WHERE username = \''.$name.'\'')->row();
    }
    
    public function getStocks($user) {
        $stocks = $this->db->query('SELECT stocks from users where username = \''.$user.'\'')->row();
        $split = explode(" ", $stocks->stocks);
        $result = array();
        for($i = 0; $i < count($split)-1; $i+=4) {
            $result[] = array(
                'stockCode' => $split[$i+1],
                'certificate' => $split[$i],
                'amount' => $split[$i+2],
                'time' => $split[$i+3]
            );
        }
        return $result;
    }
}