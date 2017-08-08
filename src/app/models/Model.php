<?php

    namespace App\models;

    use Framework\Database;

    class Model
    {
        protected $db;

        public function __construct()
        {
            $db = new Database();
            $this->db = $db->getDBO();
        }
    }