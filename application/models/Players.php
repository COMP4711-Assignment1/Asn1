<?php

/**Model for the players panel.*/
class Players extends CI_Model {
    
    var $players = 1;

	var $data = array(
		array('id' => '1', 'who' => 'Player1', 'where' => '/player/1',
			'recent' => 'Recent transactions', 'current_holds' => 'Current holdings',
			'one' => 'Player1', 'two' => 'Player2', 'three' => 'Player3', 'four' => 'Player4')
                       );

	// Constructor
	public function __construct() {
		parent::__construct();
	}
        
        public function index() {
            retrieve();
        }
        
        public function retrieve() {
            $players = 2;
            $query = $this->db->query('SELECT username FROM users');

            foreach ($query->result() as $row) {
                array_push($this->data, array('id' => $players, 'who' => $row->username, 'where' => '/player/'.$players++));
            }
        }

	/**Returns a player from a parameter.*/
	public function get($which) {
            foreach ($this->data as $record) {
                if ($record['id'] == $which) {
                    return $record;
                }
            }
            return null;
	}

	/**Returns all the players.*/
	public function all() {
		return $this->data;
	}
}