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
        $query = $this->db->query("SELECT username, password, role, id FROM users");
        $data = array();

        foreach($query->result() as $row) {
            $data[] = array('name' => $row->username, 'password' => $row->password, 'role' => $row->role, 'link' => 'Admin/delete/'.$row->id);
        }
        return $data;
    }
    
    function delete($id) {
        $query = $this->db->query("DELETE FROM users WHERE id = $id");
        redirect('/Admin');
    }
}