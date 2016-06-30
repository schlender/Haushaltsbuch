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
class Config extends Settings {

    protected static $instance;
    private $DOC_ROOT;
    private $DOMAIN;

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
        switch ($_SERVER['HTTP_HOST']) {
            case Settings::server_host_live:
                $this->DOC_ROOT = Settings::server_path_prefix_live . '/' .
                        Settings::server_app_dir_live;

                $this->DOMAIN = Settings::server_domain_live;
                
                $this->DEBUG_MODE = 0;
                
                # DATABASE SETTINGS
                $this->dbHost = Settings::dbHost_live;
                $this->dbUser = Settings::dbUser_live;
                $this->dbPass = Settings::dbPass_live;
                $this->dbSchema = Settings::dbSchema_live;
                $this->dbPort = Settings::dbPort_live;
                $this->dbSock = Settings::dbSock_live;
                $this->dbTablePrefix = Settings::dbTablePrefix_live;
                break;
            case Settings::server_host_dev:
                $this->DOC_ROOT = Settings::server_path_prefix_dev . '/' .
                        Settings::server_app_dir_dev;
                
                $this->DOMAIN = Settings::server_domain_dev;
                
                $this->DEBUG_MODE = 1;
                
                # DATABASE SETTINGS
                $this->dbHost = Settings::dbHost_dev;
                $this->dbUser = Settings::dbUser_dev;
                $this->dbPass = Settings::dbPass_dev;
                $this->dbSchema = Settings::dbSchema_dev;
                $this->dbPort = Settings::dbPort_dev;
                $this->dbSock = Settings::dbSock_dev;
                $this->dbTablePrefix = Settings::dbTablePrefix_dev;
                break;
        }
        
        # PATH SETTINGS
        $this->VIEW_PATH = $this->DOC_ROOT . '/view/';
        $this->EDIT_PATH = $this->DOC_ROOT . '/edit/';
        
        
        # URL SETTINGS
        $this->EDIT_URL = 'edit/';
        $this->URL_AJAX_INSERT = 'ajax.php';
    }

    public function __get($name) {
        if (isset($this->$name)) {
            return $this->$name;
        }
    }
    
    public function getMonthList() {
        return [1 => "Januar", 2 => "Februar", 3 => "März",
            4 => "April", 5 => "Mai", 6 => "Juni",
            7 => "Juli", 8 => "August", 9 => "September",
            10 => "Oktober", 11 => "November", 12 => "Dezember"];
    }
}
