<?php
    declare(strict_types = 1);

    namespace App\controllers;

    use App\libraries\Response;
    use Framework\Input;
    use App\repositories\UsersRepository;

    class UsersController extends Controller
    {
        private $response;
        private $usersRepo;

        public function __construct(Response $response, UsersRepository $usersRepo)
        {
            parent::__construct();

            $this->response = $response;
            $this->usersRepo = $usersRepo;
        }

        public function getUsersListing(): array
        {
            $data = Input::all();
            $page = Input::get('page');

            $users = $this->usersRepo->getAllUsers();

            return ['data' => $users, 'message' => 'Users listing'];
        }

        public function getUserDetail($userId): array
        {
            return ['data'    => [],
                    'message' => 'Single user details for user: ' . $userId
            ];
        }

        public function store(): array
        {
            $data = Input::all();

            return ['data' => $data, 'message' => 'Successfully created the user.'];
        }
    }