<?php

/**Model for the players panel.*/
class Players extends CI_Model {

	var $data = array(
		array('id' => '1', 'who' => 'Player1', 'where' => '/player/1',
			'recent' => 'Recent transactions', 'current_holds' => 'Current holdings'),
		array('id' => '2', 'who' => 'Player2', 'where' => '/player/2',
			'recent' => 'Recent transactions', 'current_holds' => 'Current holdings'),
		array('id' => '3', 'who' => 'Player3', 'where' => '/player/3',
			'recent' => 'Recent transactions', 'current_holds' => 'Current holdings'),
		array('id' => '4', 'who' => 'Player4', 'where' => '/player/4',
			'recent' => 'Recent transactions', 'current_holds' => 'Current holdings'),
	);

	// Constructor
	public function __construct() {
		parent::__construct();
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