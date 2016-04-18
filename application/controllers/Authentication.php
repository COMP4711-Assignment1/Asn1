<?php

class Authentication extends Application {

    function __construct() {
        parent::__construct();
        $this->load->model('Users');
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
        $name = $this->input->post('username');
        $pass = $this->input->post('password');

        $user = $this->Users->getUser($name);


        if ($user == null || $pass != $user->password) {
            echo '<script>alert("Incorrent username or password."); window.location.href="index";</script>';
            return;
        }

        if ($pass == $user->password) { //STORED AS PLAIN TEXT, ADD IN HASHING
            $this->session->set_userdata('userName', $name);
            $this->session->set_userdata('userRole', $user->role);
            $this->session->set_userdata('id', $user->id);
            redirect('/');
        }
    }

    /* Logs the user out by destroying the session data. */

    function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }

    /* Creates a new user. */

    function register() {
        $user = $this->input->post('username');
        $password = $this->input->post('password');

        if ($user == null || $password == null) { //if either field is null
            echo '<script>alert("Please enter a username and password."); window.location.href="signup";</script>';
        } else {
            if (strlen($user) > 16) { //if username is too long
                echo '<script>alert("Username too long. Maximum 16 characters."); window.location.href="signup";</script>';
            } else {
                $record = $this->db->query('SELECT username FROM users WHERE username = \'' . $user . '\'')->row(); //check to see if that name exists in the database

                if ($record != null) { //if we get a result back then it does
                    echo '<script>alert("Username already taken."); window.location.href="signup";</script>';
                } else {
                    $this->load->library('upload'); //load in the upload library

                    if (!$this->upload->do_upload()) { //attemp to upload the file
                        $error = array('error' => $this->upload->display_errors());
                    } else {
                        $response = array('upload_data' => $this->upload->data()); //get our response data
                    }

                    $data = array(
                        'Username' => $user,
                        'Password' => $password,
                        'Role' => 'user',
                        'image' => './uploads/' . $response['upload_data']['file_name']
                    );

                    $this->Users->createUser($data);
                    redirect('welcome');
                }
            }
        }
    }

}
