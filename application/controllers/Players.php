<?php

/* * Model for the players panel. */

class Players extends Application {

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        retrieve();
    }

    public function retrieve() {
        $query = $this->db->query('SELECT username, image, id FROM users');

        foreach ($query->result() as $row) {
            array_push($this->data, array('id' => $row->id, 'username' => $row->username, 'href' => '/player/'.$row->username, 'image' => $row->image));
        }
    }

    /*     * Returns a player from a parameter. */

    public function get($which) {
        foreach ($this->data as $record) {
            if ($record['username'] == $which) {
                return $record;
            }
        }
        return null;
    }

    /* Returns a player from a given name. */
    function getPlayer($name) {
        $this->retrieve(); //populate database since the players->data array gets cleared somewhere
        $this->data['players'] = $this->data;
        $record = $this->get($name);
        $this->data = array_merge($this->data, $record);
        $this->data['pagebody'] = 'portfolio';
        $this->data['stocks'] = $this->website->readCSV();
        $this->data['owned'] = $this->users->getStocks($name);
        $this->render();
    }
    
    function portfolio($name) {
        $this->retrieve(); //populate database since the players->data array gets cleared somewhere
        $this->data['players'] = $this->data;
        $record = $this->get($name);
        $this->data = array_merge($this->data, $record);
        $this->data['pagebody'] = 'currentportfolio';
        $this->data['stocks'] = $this->website->readCSV();
        $this->render();
    }

    /*     * Returns all the players. */

    public function all() {
        return $this->data;
    }

}
