<?php

class Welcome extends Application {

	function __construct() {
		parent::__construct();
	}

	//-------------------------------------------------------------
	//  The normal pages
	//-------------------------------------------------------------

	function index() {
		$this->data['pagebody'] = 'homepage';	// this is the view we want shown

		$source = $this->players->all();
        $source2 = $this->stocks->all();
                
		$portfolios = array();
        $stockportfolios = array();
                
		foreach ($source as $record) {
			$portfolios[] = array('who' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where']);
		}
		$this->data['portfolios'] = $portfolios;
                
        foreach ($source2 as $record2) {
			$stockportfolios[] = array('who' => $record2['who'], 'mug' => $record2['mug'], 'href' => $record2['where']);
		}
		$this->data['stockportfolios'] = $stockportfolios;

		$this->render();
	}
    
    function stock($id){
        $record2 = $this->stocks->data[$id-1];
        $this->data = array_merge($this->data, $record2);
        $this->data['pagebody'] = 'history';

        $this->render();
    }

    function player($id){
        $record = $this->players->data[$id-1];
        $this->data = array_merge($this->data, $record);
        $this->data['pagebody'] = 'portfolio';

        $this->render();
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */
