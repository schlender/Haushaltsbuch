<?php

/*
 * LICENSE: CC BY SA
  You are free to:

  Share — copy and redistribute the material in any medium or format
  Adapt — remix, transform, and build upon the material
  for any purpose, even commercially.

  The licensor cannot revoke these freedoms as long as you follow the license terms.

  Under the following terms:

  Attribution — You must give appropriate credit, provide a link to the license, and indicate if changes were made. You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.

  ShareAlike — If you remix, transform, or build upon the material, you must distribute your contributions under the same license as the original.

  No additional restrictions — You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.

  Notices:

  You do not have to comply with the license for elements of the material in the public domain or where your use is permitted by an applicable exception or limitation.
  No warranties are given. The license may not give you all of the permissions necessary for your intended use. For example, other rights such as publicity, privacy, or moral rights may limit how you use the material.
 */

/**
 *
 * @author schlender
 */
class Cost {

    protected static $instance;
    private $config;
    private $costCategory;
    private $db;
    private $dbTable;
    private $costData;

    public function __construct() {
        $this->init();
    }

    // getInstance method
    public static function getInstance() {

        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function init() {
        $this->config = Config::getInstance();
        $this->costCategory = CostCategory::getInstance();
        $this->db = DB::getInstance();
        $this->dbTable = $this->config->dbSchema . '.' .
                $this->config->dbTablePrefix . 'cost';
        $this->costData = [];
    }

    public function getAll() {
        $sql = "SELECT * FROM " . $this->dbTable . " ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query;
    }

    /**
     * function to save new costs in database
     * @param type $dataObj mostly $_GET array
     */
    public function add($dataObj) {
        
        $input = 'price';
        if (isset($dataObj[$input]) 
                && is_numeric($dataObj[$input])) {
            $this->costData["price"] = $dataObj[$input];
        } else {
            return "ERROR:".$input;
        }
        
        $input = 'pay_period';
        if (!isset($dataObj[$input]) 
                || !is_numeric($dataObj[$input]) 
                || $dataObj[$input] < 1) {
            return "ERROR:".$input;
        } else {
            $this->costData["period"] = $dataObj[$input];
        }
        
        $input = 'cost_timestamp';
        if (!isset($dataObj[$input]) 
                || strlen($dataObj[$input]) < 7) {
            return "ERROR:".$input;
        } else {
            # input format: mm.yyyy
            $tDate = explode(".", $dataObj[$input]);
            $this->costData["month"] = $tDate[0];
            $this->costData["year"] = $tDate[1];
            unset($tDate);
        }
        
        $input = 'description';
        if (!isset($dataObj[$input]) 
                || strlen($dataObj[$input]) < 5) {
            $this->costData["description"] = NULL;
        } else {
            $this->costData["description"] = $dataObj[$input];
        }
        
        $this->costData['is_fix'] = (isset($dataObj['is_fix'])) ? $dataObj['is_fix'] : 0;
        
        $input = 'next_pay_period';
        if (!isset($dataObj[$input]) 
                || strlen($dataObj[$input]) < 10) {
            $this->costData["next_payday"] = NULL;
        } else {
            # input format: dd.mm.yyyy
            $tDate = explode(".", $dataObj[$input]);
            $this->costData["next_payday"] = 
                    $tDate[2] . '-' . $tDate[1] . '-' . $tDate[0];
            unset($tDate);
        }
        
        $input = 'category';
        if (!isset($dataObj[$input]) 
                || count($dataObj[$input]) < 1) {
            return "ERROR:".$input;
        } else {
            $this->costData["category"] = $dataObj[$input];
        }
        
        $input = 'cost_type';
        if (isset($dataObj[$input]) 
                && (
                    ($dataObj[$input]) === 'income') || ($dataObj[$input] === 'cost') 
                ){
            $this->costData["type"] = $dataObj[$input];
        } else {
            return "ERROR:".$input;
        }
        
        $id = $this->insertCost();
        return $this->costCategory->add($id, $this->costData['category']);
    }

    private function insertCost() {
        $sql = "INSERT INTO " . $this->dbTable . " (" .
                "price, period, month, year, description, " .
                "is_fix, next_payday, type) VALUES " .
                "(" .
                $this->costData["price"] .
                "," . $this->costData["period"] .
                "," . $this->costData["month"] .
                "," . $this->costData["year"] .
                ", '" . $this->costData["description"] . "'" .
                "," . $this->costData["is_fix"] .
                ", '" . $this->costData["next_payday"] . "'" .
                ", '" . $this->costData["type"] . "'" .
                ");";
        $this->db->query($sql);
        return $this->db->insert_id;
    }
}
