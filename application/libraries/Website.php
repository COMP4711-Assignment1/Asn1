<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Website {

    function readXML() {
        $url = "http://www.comp4711bsx.local/status";
        $xml = simplexml_load_file($url);
        $status = get_object_vars($xml);
        $result = array();
        foreach ($status as $key => $var) {
            $result[] = array('name' => $key, 'tableData' => $var);
        }
        return $result;
    }

    function readCSV() {
        $row = 0;
        $col = 0;

        $handle = fopen("http://www.comp4711bsx.local/data/stocks", "r");
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

}
