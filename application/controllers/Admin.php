<?php

class Admin extends Application {
    function __construct() {
        parent::__construct();
        $this->restrict(ROLE_ADMIN);
    }
    
    /*Run on page load. Displays the admin view.*/
    function index() {
        $this->data['pagebody'] = 'admin'; //load the admin view
        $this->data['content'] = $this->displayDatabase(); //get database entries for table
        $this->render(); //render it
    }
    
    /*Selectes each user from the database.
     * Used to format the table for the admin view.
     */
    function displayDatabase() {
        $query = $this->db->query("SELECT username, password, role, id FROM users");
        $data = array();

        foreach($query->result() as $row) {
            $data[] = array('name' => $row->username, 'password' => $row->password, 'role' => $row->role, 'link' => 'Admin/delete/'.$row->id);
        }
        return $data;
    }
    
    /*Deletes a user from the database. Simpler than opening up PHPmyadmin
      and deleting in there.*/
    function delete($id) {
        $this->db->query("DELETE FROM users WHERE id = $id");
        redirect('/Admin');
    }
}