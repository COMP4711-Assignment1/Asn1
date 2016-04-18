<?php

class Stocks extends Application {

    var $token;
    var $site = 'http://bsx.jlparry.com:4711/';
    var $team = 'B99';

    function __construct() {
        parent::__construct();
    }

    function index() {
        
    }

    function buy() {
        $this->load->dbforge(); //load library
        if ($this->website->getState() != 3) { //if the market is closed
            echo '<script>alert("Market is currently closed."); window.location.href="/";</script>';
        } else {
            $this->registerAgent(); //register the agent

            $stuff = array(
                'server' => $this->site,
                'team' => $this->team,
                'token' => $this->token,
                'player' => $this->session->userdata['userName'],
                'stock' => $this->input->post('stock'),
                'quantity' => $this->input->post('number')
            );
            $this->rest->initialize($stuff);
            $data = $this->rest->post('/buy', $stuff);

            //move this code into the model
            $text = $data['token'] . " " . $data['stock'] . " " . $data['amount'] . " " . $data['datetime'] . " "; //combine the pieces we need into a string
            $currentStocks = $this->db->query('SELECT stocks FROM users WHERE username = \''.$this->session->userdata['userName'].'\'')->row(); //get the stocks the player currently owns
            $combined = $currentStocks->stocks.$text; //combine the two strings

            $this->db->query('UPDATE users SET stocks = \''.$combined.'\' WHERE username = \''.$this->session->userdata['userName'].'\''); //update the players stocks
            redirect("/");
        }
    }

    function sell() {
        $stuff = array(
            'server' => $this->site,
            'team' => $this->team,
            'token' => $this->session->userdata['token'],
            'player' => $this->session->userdata['userName'],
            'stock' => $this->input->post('stock'),
            'quantity' => $this->input->post('number')
        );
        $this->rest->initialize($stuff);
        $data = $this->rest->post('/sell', $stuff);
    }

    /* Returns a stock from the given code. */

    function getStock($code) {
        $this->data = $this->website->readCSV();
        $this->data['stocks'] = $this->data;
        $record = $this->get($code);
        $this->data = array_merge($this->data, $record);
        $this->data['pagebody'] = 'history';
        $this->render();
    }

    /* Returns all stocks read in from site. */

    function getAllStocks() {
        $data = $this->website->readCSV();
        return $data;
    }

    /* Returns a specific stock from a given code. */

    function get($code) {
        foreach ($this->data as $record) {
            if ($record['code'] == $code) {
                return $record;
            }
        }
        return null;
    }

    function registerAgent() {
        $stuff = array(
            'server' => $this->site,
            'team' => $this->team,
            'name' => 'changed',
            'password' => 'tuesday'
        );
        $this->rest->initialize($stuff);
        $data = $this->rest->post('/register', $stuff);
        $this->token = $data['token'];
    }
}
