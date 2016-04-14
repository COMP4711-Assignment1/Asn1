<?php

class Admin extends Application {
    function __construct() {
        parent::__construct();
        $this->restrict(ROLE_ADMIN);
    }
    
    function index() {
        $this->data['pagebody'] = 'admin';
        $this->render();
        $data = array('content' => $this->displayDatabase());
        $this->parser->parse('admin', $data);
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