<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host=panel.mspotter.be;dbname=zadmin_easydungeon', 'easydungeon', 'na5age7uz', $pdo_options);
      }
      return self::$instance;
    }
  }
?>
