<?php

/* * Default controller opened on page load. */

class Welcome extends Application {
    /*     * Constructor. */

    function __construct() {
        parent::__construct();
    }

    /*     * Displays and populates data on front page. */

    function index() {

        /*$this->load->library('rest'); //Agent initializer
        $stuff = array(
            'server' => 'http://bsx.jlparry.com/',
            'team' => 'B99',
            'name' => 'test',
            'password' => 'tuesday'
        );
        $this->rest->initialize($stuff);
        $data = $this->rest->post('/register', $stuff);
        print_r($data);*/
        $this->data['pagebody'] = 'homepage'; // this is the view we want shown

        $this->players->retrieve(); //get player data in database

        $players = $this->players->all();

        $portfolios = array();

        foreach ($players as $player) {
            $portfolios[] = array('who' => $player['who'], 'href' => $player['where'], 'image' => $player['image']);
        }

        $this->data['portfolios'] = $portfolios;
        $this->data['stockportfolios'] = $this->website->readCSV();

        $this->render();
    }

    /* Returns a player from a given id. */

    function player($id) {
        $this->players->retrieve(); //populate database since the players->data array gets cleared somewhere
        $record = $this->players->data[$id - 1];
        $this->data = array_merge($this->data, $record);
        $this->data['pagebody'] = 'portfolio';
        $this->data['stocks'] = $this->website->readCSV();
        $this->data['players'] = $this->players->all();
        $this->render();
    }
}
