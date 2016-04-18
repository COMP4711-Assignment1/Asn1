<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Website {
    /* Parses XML from the status page of the BSX. */

    function readXML() {
        $url = "http://bsx.jlparry.com:4711/status";
        $xml = simplexml_load_file($url);
        $status = get_object_vars($xml);
        $result = array();
        foreach ($status as $key => $var) {
            $result[] = array('name' => $key, 'tableData' => $var);
        }
        return $result;
    }

    function getRecentStocks($amount) {
        $movements = $this->getMovements(); //get stock movements for center panel
        $recent = array(); //stores the last 10 stock movements

        if (count($movements) < $amount) { //if there arent 10 stock movements
            $amount = count($movements); //get however many there are
        }
        for ($i = 0; $i < $amount; $i++) {
            array_push($recent, array_pop($movements)); //pop the last entries 
        }
        return array_reverse($recent);
    }

    function getState() {
        $url = "http://bsx.jlparry.com:4711/status";
        $xml = simplexml_load_file($url);
        $status = get_object_vars($xml);
        return $status['state'];
    }
    function getRound() {
        $url = "http://bsx.jlparry.com:4711/status";
        $xml = simplexml_load_file($url);
        $status = get_object_vars($xml);
        return $status['round'];
    }

    function getStockPrice($stock, $amount) {
        $csv = $this->readCSV(); //get stocks data
        $key = array_column($csv, 'code'); //gets each stock code in an array to get indexs
        $index = array_search($stock, $key); //returns an integer of index
        return $csv[$index]['value'] * $amount;
    }
    /* Grabs a list of the current stocks from the BSX data page and parses them
     * into an associative array.
     */

    function readCSV() {
        $row = 0;
        $col = 0;

        $handle = fopen("http://bsx.jlparry.com:4711/data/stocks", "r");
        if ($handle) {
            while (($row = fgetcsv($handle, 4096)) !== false) {
                if (empty($fields)) {
                    $fields = $row;
                    continue;
                }

                foreach ($row as $k => $value) {
                    $results[$col][$fields[$k]] = $value;
                }
                $col++;
                unset($row);
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() failn";
            }
            fclose($handle);
        }
        return $results;
    }

    function getMovements() {
        $row = 0;
        $col = 0;
        $handle = fopen("http://bsx.jlparry.com:4711/data/movement", "r");
        if ($handle) {
            while (($row = fgetcsv($handle, 4096)) !== false) {
                if (empty($fields)) {
                    $fields = $row;
                    continue;
                }

                foreach ($row as $k => $value) {
                    $results[$col][$fields[$k]] = $value;
                }
                $col++;
                unset($row);
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() failn";
            }
            fclose($handle);
        }
        if (ISSET($results))
            return $results;
    }

}
