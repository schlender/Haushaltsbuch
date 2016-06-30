<?php

include_once './class/settings.class.php';
include_once './class/config.class.php';
include_once './system/config.php';

if (isset($_GET)) {
    
    if (count($_GET) > 0) {

        // # GLOBAL DATA
        if (isset($_GET['inputType'])) {
            if ($_GET['inputType'] === 'cost') {
                
                $filterArgs = array(
                    'cost_type' => FILTER_SANITIZE_STRING,
                    'price' => FILTER_VALIDATE_FLOAT,
                    'pay_period' => FILTER_SANITIZE_STRING,
                    'cost_timestamp' => FILTER_SANITIZE_STRING,
                    'is_fix' => FILTER_VALIDATE_BOOLEAN,
                    'next_pay_period' => FILTER_SANITIZE_STRING,
                    'category' => array('filter' => FILTER_VALIDATE_INT,
                                    'flags' => FILTER_REQUIRE_ARRAY),
                    'description' => FILTER_SANITIZE_STRING
                );
                $input = filter_input_array(INPUT_POST, $filterArgs);
                $input['description'] = trim($input['description']);
                
                print_r($Cost->add($input));
            }
        }
    }
}