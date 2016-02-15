<?php

class Stocks extends CI_Model {
	var $data = array(
		array('id' => '1', 'who' => 'Gold', 'mug' => 'gold.png', 'where' => '/stock/1',
			'what' => '$1000', 'one' => 'Gold', 'two' => 'Oil', 'three' => 'Bonds',),
		array('id' => '2', 'who' => 'Oil', 'mug' => 'oil.png', 'where' => '/stock/2',
			'what' => '$500', 'one' => 'Gold', 'two' => 'Oil', 'three' => 'Bonds',),
		array('id' => '3', 'who' => 'Bonds', 'mug' => 'bonds.jpg', 'where' => '/stock/3',
			'what' => '$600', 'one' => 'Gold', 'two' => 'Oil', 'three' => 'Bonds',)
	);

	// Constructor
	public function __construct() {
		parent::__construct();
	}

	public function get($which) {
		foreach ($this->data as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	public function all() {
		return $this->data;
	}
}
