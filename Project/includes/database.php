<?php 
class Database {
    public static $instance = null;
    private $db = null;

    private function __construct() {
        $this->db = new PDO('sqlite:' . ROOT . 'database/villat.db');
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->query('PRAGMA foreign_keys = ON');
        
        if (NULL == $this->db) {
            throw new Exception("Failed to create database.");
        }
    }

    public function db() {
        return $this->db;
    }

    static function instance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
}
?>