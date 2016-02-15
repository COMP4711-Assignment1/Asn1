<?php

class Stocks extends CI_Model {
	var $data = array();

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
