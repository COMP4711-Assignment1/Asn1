<?php

/**User controller allowing user to login and logout.*/
class User extends Application {

    function __construct() {
        parent::__construct();
    }

    /**Action on user login.*/
    function login() {
        $user = $this->input->post('username');
        $newdata = array('username' => $user);
        $this->session->set_userdata($newdata);
        redirect($this->agent->referrer());
    }
    
    /**Displays and populates data on front page.*/
    function signup() {
        $this->data['pagebody'] = 'signup';	// this is the view we want shown
        $this->render();
    }
    
    function register() {
        $user = $this->input->post('username');
        $password = $this->input->post('password');
        $data = array(
            'Username' => $user ,
            'Password' => $password
        );

        $this->db->insert('Users', $data);
        redirect('welcome');
    }

    /**Action on user logout.*/
    function logoff() {
        $this->session->unset_userdata('username');
        redirect($this->agent->referrer());
    }
}
