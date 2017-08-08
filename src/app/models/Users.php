<?php
    declare(strict_types = 1);

    namespace App\models;

    class Users extends Model {
        protected $table = 'users';

        public function __construct() {
            parent::__construct();
        }

        public function getAllUsers(): array
        {
            return $this->db->get(
                $this->table,
                config('general.pagination_per_page'),
                ['id', 'first_name', 'last_name']
            );
        }
    }