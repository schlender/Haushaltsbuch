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
class CostCategory {

    protected static $instance;
    private $config;
    private $db;
    private $dbTable, $dbCatTable;
    private $costCat;

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
        $this->db = DB::getInstance();
        $this->category = Category::getInstance();
        $this->dbTable = $this->config->dbSchema . '.' .
                $this->config->dbTablePrefix . 'cost_category';
        $this->dbCatTable = $this->category->dbTable;
        $this->costCat = [];
    }
    
    public function getCategories($costId) {
        $this->costCat[$costId] = [];
        $sql = "SELECT cost_id, category_id, name, must_explain FROM " .
                $this->dbTable ." cc INNER JOIN " .
                $this->dbCatTable ." c on cc.category_id = c.id " .
                "WHERE cost_id = $costId;";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            while ($entry = $query->fetch_object()) {
                $this->costCat[$costId][$entry->category_id]["cost_id"] = $entry->cost_id;
                $this->costCat[$costId][$entry->category_id]["category_id"] = $entry->category_id;
                $this->costCat[$costId][$entry->category_id]["category_name"] = $entry->name;
                $this->costCat[$costId][$entry->category_id]["must_explain"] = $entry->must_explain;
            }
        }
        return $this->costCat[$costId];
    }
    
    /**
     * function to save new cost category relations in database
     * @param type $costId
     * @param type $catArray
     */
    public function add($costId, $catArray) {
        $sql = "INSERT INTO " . $this->dbTable . ' (cost_id, category_id) VALUES ';
        foreach ($catArray as $cat) {
            $sql .= "($costId,$cat),";
        }
        $sql = substr($sql, 0, strlen($sql) -1).';';
        $this->db->query($sql);
        return $this->getCategories($costId);
    }
    
}
