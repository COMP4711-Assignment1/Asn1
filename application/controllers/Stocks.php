<?php

class Stocks extends Application {

    function __construct() {
        parent::__construct();
    }

    function index() {
        
    }

    function getStock($code) {
        $this->data = $this->website->readCSV();
        $record = $this->get($code);
        $this->data = array_merge($this->data, $record);
        $this->data['pagebody'] = 'history';
        $this->render();
    }

    /*Returns a player from a parameter.*/

    public function get($code) {
        foreach ($this->data as $record) {
            if ($record['code'] == $code) {
                return $record;
            }
        }
        return null;
    }

}
