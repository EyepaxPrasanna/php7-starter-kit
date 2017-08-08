<?php

    namespace Framework;

    use Zend\Diactoros\ServerRequestFactory;

    class Input
    {
        static $input = [];
        static $instance = null;

        public function __construct()
        {
            $requestFactory = ServerRequestFactory::fromGlobals();
            $method = $requestFactory->getMethod();
            $input = [];

            // Attach input variables according to the request method
            switch($method) {
                case 'GET':
                    $input = $requestFactory->getQueryParams();
                    break;
                case 'POST':
                    $input = json_decode(file_get_contents('php://input'));
                    break;
            }

            $inputData = (array) $input;

            // Sanitizes the input
            $inputData = array_map('strip_tags', $inputData);
            $inputData = array_map('trim', $inputData);

            self::$input = $inputData;
        }

        /**
         * Singleton design pattern, return class instance if exist, create otherwise.
         *
         * @return Input
         */
        public static function getInstance(): Input
        {
            if(self::$instance === null) {
                self::$instance =  new self();
            }

            return self::$instance;
        }

        /**
         * Get all input data
         *
         * @return array
         */
        public static function all(): array
        {
            self::getInstance();

            return self::$input;
        }

        /**
         * Get specific input data
         *
         * @param $key
         * @return string
         */
        public static function get($key): string
        {
            self::getInstance();
            $inputData = self::$input;

            // Get the value from the input array, if exist
            $value = $inputData[$key] ?? '';

            return $value;
        }
    }