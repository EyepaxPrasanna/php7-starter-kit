<?php

    namespace Framework;

    use MysqliDb;

    class Database
    {
        private $db;
        private static $instance;

        public function __construct()
        {
            $this->db = new MysqliDb ([
                'host'     => env('DB_HOST'),
                'username' => env('DB_USER'),
                'password' => env('DB_PASSWORD'),
                'db'       => env('DB_DATABASE'),
                'port'     => env('DB_PORT')
            ]);

            // Error handling
            if (mysqli_connect_error()) {
                trigger_error("Failed to connect to MySQL: " . mysqli_connect_error(),
                    E_USER_ERROR);
            }
        }

        /**
         * Singleton design pattern, return class instance if exist, create otherwise
         *
         * @return Database
         */
        public static function getInstance(): Database
        {
            if (self::$instance === null) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        /**
         * Get the database connection object
         *
         * @return MysqliDb
         */
        public function getDBO(): MysqliDb
        {
            return self::getInstance()->db;
        }
    }