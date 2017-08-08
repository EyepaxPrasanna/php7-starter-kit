<?php

    namespace App\repositories;

    use App\models\Users;

    class UsersRepository
    {
        private $users;

        public function __construct(Users $users)
        {
            $this->users = $users;
        }

        public function getAllUsers(): array
        {
            return $this->users->getAllUsers();
        }
    }