<?php

class Admin extends Application {
    function __construct() {
        parent::__construct();
        $this->restrict(ROLE_ADMIN);
    }
    
    function index() {
        $this->data['pagebody'] = 'admin';
        $this->data['content'] = $this->displayDatabase();
        
        $this->render();
    }
    
    function displayDatabase() {
        $query = $this->db->query("SELECT username, password, role FROM users");
        $data = array();

        foreach($query->result() as $row) {
            $data[] = array('name' => $row->username, 'password' => $row->password, 'role' => $row->role);
        }
        return $data;
    }
}