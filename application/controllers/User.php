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

	/**Action on user logout.*/
    function logoff() {
        $this->session->unset_userdata('username');
        redirect($this->agent->referrer());
    }
}
