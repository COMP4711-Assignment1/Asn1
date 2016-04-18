<?php

class Game extends MY_Model {
    
    function setRound($round) {
        $this->db->query('UPDATE game SET round = '.$round);
    }
    
    /*Used to test if the round is different so we can can clear the database*/
    function getRound() {
        return $this->db->query('SELECT round from game')->row()->round;
    }
}