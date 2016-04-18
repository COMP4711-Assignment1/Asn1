<?php

/* Default controller opened on page load. */

class Welcome extends Application {
    /* Constructor. */

    function __construct() {
        parent::__construct();
    }

    /* Displays and populates data on front page. */

    function index() {
        $this->data['pagebody'] = 'homepage'; // this is the view we want shown

        $data = $this->users->getAllUsers(); //get all of the users for users panel
        $movements = $this->website->getMovements(); //get stock movements for center panel
        
        $recent = array(); //stores the last 10 stock movements
        
        $size = 10;
        if(count($movements) < 10) { //if there arent 10 stock movements
            $size = count($movements); //get however many there are
        }
        for($i = 0; $i < $size; $i++) {
            array_push($recent, array_pop($movements)); //pop the last entries 
        }
        
        $players = array(); //stores the new player
        
        foreach ($data as $user) {
            $user['href'] = '/players/' . $user['username']; //give each player a link
            array_push($players, $user);
        }

        $this->data['players'] = $players; //add data to player panel
        $this->data['stockportfolios'] = $this->website->readCSV(); //add data to stocks panel
        $this->data['transactions'] = array_reverse($recent); //reverse and add data to transactions panel

        $this->render();
    }
    
    function calculateEquity($user) {
        $stocks = $this->users->getStocks($user);
        $csv = $this->website->readCSV();
        //print_r($stocks);
        //print_r($csv);
        for($i = 0; $i < count($stocks)-1; $i+=4) {
            $key = array_search('Oil', array_column($csv, 'name'));
            print_r($key);
        }
    }
}
