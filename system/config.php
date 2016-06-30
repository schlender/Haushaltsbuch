<?php



// set config params in Config class
$CFG = Config::getInstance();


// magic function to load classes dynamicaly
function classAutoloader($class_name) {
    global $CFG;

    include $CFG->DOC_ROOT . '/class/' . strtolower($class_name) . '.class.php';
}

// register auto loader function
spl_autoload_register("classAutoloader");



// create instances of all classes
#$DB = DB::getInstance();
$Category = Category::getInstance();
$Timeframe = Timeframe::getInstance();
$Cost = Cost::getInstance();


// include default functions
include_once $CFG->DOC_ROOT . 'system/function.php';
