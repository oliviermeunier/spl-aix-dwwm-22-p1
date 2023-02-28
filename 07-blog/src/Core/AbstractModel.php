<?php 

abstract class AbstractModel {

    protected Database $db;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->db = new Database();
    }
}