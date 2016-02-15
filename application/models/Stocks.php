<?php

/**Model for the stocks panel.*/
class Stocks extends CI_Model {
	var $data = array(
		array('id' => '1', 'who' => 'Gold', 'mug' => 'gold.png', 'where' => '/stock/1',
			'what' => '$1000'),
		array('id' => '2', 'who' => 'Oil', 'mug' => 'oil.png', 'where' => '/stock/2',
			'what' => '$500'),
		array('id' => '3', 'who' => 'Bonds', 'mug' => 'bonds.jpg', 'where' => '/stock/3',
			'what' => '$600'),
		array('id' => '4', 'who' => 'Grain', 'mug' => 'grain.jpg', 'where' => '/stock/4',
			'what' => '$100'),
		array('id' => '5', 'who' => 'Industrial', 'mug' => 'industrial.jpg', 'where' => '/stock/5',
			'what' => '$2000'),
		array('id' => '6', 'who' => 'Technology', 'mug' => 'technology.jpg', 'where' => '/stock/6',
			'what' => '$3000')
	);

	// Constructor
	public function __construct() {
		parent::__construct();
	}

	/**Returns a stock from a parameter.*/
	public function get($which) {
		foreach ($this->data as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	/**Returns all the players.*/
	public function all() {
		return $this->data;
	}
}
