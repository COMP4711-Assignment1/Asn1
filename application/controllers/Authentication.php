<?php

class Authentication extends Application {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    function index() {
        $this->data['pagebody'] = 'login';
        $this->render();
    }
    
    function signup() {
        $this->data['pagebody'] = 'signup';
        $this->render();
    }
    
    function submit() {
        $this->load->model('Users');
        $key = $this->input->post('username');
        $pass = $this->input->post('password');
        $user = $this->db->query('SELECT password, role, id FROM users WHERE username = \''.$key.'\'')->row();
        if($user == null || $pass != $user->password) {
            echo '<script>alert("Incorrent username or password."); window.location.href="index";</script>';
            return;
        }

        if ($pass == $user->password) { //STORED AS PLAIN TEXT, ADD IN HASHING
            $this->session->set_userdata('userName', $key);
            $this->session->set_userdata('userRole',$user->role);
            $this->session->set_userdata('id', $user->id);
            redirect('/');
        }
    }
    
    function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }
    
    function register() {
        $user = $this->input->post('username');
        $password = $this->input->post('password');
        $record = $this->db->query('SELECT username FROM users WHERE username = \''.$user.'\'')->row();
        if($record->username != null) {
            echo '<script>alert("Username already taken."); window.location.href="signup";</script>';
        }
        else {
            if($user != null && $password != null) {
                $data = array(
                    'Username' => $user ,
                    'Password' => $password,
                    'Role' => 'user'
                );

                $this->db->insert('Users', $data);
                redirect('welcome');
            }
            else {
                redirect('Authentication/signup');
            }
        }
    }
}
