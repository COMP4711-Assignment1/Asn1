<?php

class Players extends CI_Model {

	var $data = array(
		array('id' => '1', 'who' => 'Player1', 'mug' => 'bob-monkhouse-150x150.jpg', 'where' => '/player/1',
			'recent_trans' => 'Recent transactions', 'current_holds' => 'Current holdings'),
		array('id' => '2', 'who' => 'Player2', 'mug' => 'elayne-boosler-150x150.jpg', 'where' => '/player/2',
			'recent_trans' => 'Recent transactions', 'current_holds' => 'Current holdings'),
		array('id' => '3', 'who' => 'Player3', 'mug' => 'mark-russell-150x150.jpg', 'where' => '/player/3',
			'recent_trans' => 'Recent transactions', 'current_holds' => 'Current holdings'),
		array('id' => '4', 'who' => 'Player4', 'mug' => 'Anonymous-150x150.jpg', 'where' => '/player/4',
			'recent_trans' => 'Recent transactions', 'current_holds' => 'Current holdings'),
	);

	// Constructor
	public function __construct() {
		parent::__construct();
	}

	public function get($which) {
		foreach ($this->data as $record) {
			if ($record['id'] == $which) {
				return $record;
            }
        }
		return null;
	}

	public function all() {
		return $this->data;
	}
}