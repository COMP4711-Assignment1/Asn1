<?php

/* * Default controller opened on page load. */

class Welcome extends Application {
    /*     * Constructor. */

    function __construct() {
        parent::__construct();
    }

    /*     * Displays and populates data on front page. */

    function index() {
        $this->data['pagebody'] = 'homepage'; // this is the view we want shown

        $this->players->retrieve();

        $players = $this->players->all();

        $portfolios = array();

        foreach ($players as $player) {
            $portfolios[] = array('who' => $player['who'], 'href' => $player['where']);
        }
        
        $this->data['portfolios'] = $portfolios;

        $this->data['stockportfolios'] = $this->website->readCSV();

        $this->render();
    }

    /*Returns a player from a given id.*/

    function player($id) {
        $this->players->retrieve(); //populate database since the players->data array gets cleared somewhere
        $record = $this->players->data[$id - 1];
        $this->data = array_merge($this->data, $record);
        $this->data['pagebody'] = 'portfolio';
        $this->render();
    }

}
