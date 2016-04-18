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

        $data = $this->users->getAllUsers();
        $movements = $this->website->getMovements();
        $recent = array();
        
        $size = 10;
        if(count($movements) < 10) {
            $size = count($movements);
        }
        for($i = 0; $i < $size; $i++) {
            array_push($recent, array_pop($movements));
        }
        
        $players = array();
        
        foreach ($data as $user) {
            $user['href'] = '/players/' . $user['username'];
            array_push($players, $user);
        }

        $this->data['players'] = $players;
        $this->data['stockportfolios'] = $this->website->readCSV();
        $this->data['transactions'] = $recent;

        $this->render();
    }
}
