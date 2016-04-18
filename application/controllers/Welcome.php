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
        
        $players = array(); //stores the new player
        
        foreach ($data as $user) {
            $user['href'] = '/players/' . $user['username']; //give each player a link
            $user['equity'] = $this->calculateEquity($user['username'], $user['cash']);
            array_push($players, $user);
        }

        $this->data['players'] = $players; //add data to player panel
        $this->data['stockportfolios'] = $this->website->readCSV(); //add data to stocks panel
        $this->data['transactions'] = $this->website->getRecentStocks(10);

        $this->render();
    }
    
    function calculateEquity($user, $cash) {
        $stocks = $this->users->getStocks($user); //get the stocks the user has
        $csv = $this->website->readCSV(); //get the current stocks and values
        $equity = 0;
        $key = array_column($csv, 'code'); //gets each stock code in an array to get indexs
       
        for($i = 0; $i <= count($stocks)-1; $i++) { //for each stock the player has
            $index = array_search($stocks[$i]['stockCode'], $key); //returns an integer of index
            $equity += ($csv[$index]['value']*$stocks[$i]['amount']);
        }
        $equity += $cash;
        return $equity;
    }
}
