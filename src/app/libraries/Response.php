<?php

    namespace App\libraries;

    class Response
    {
        public function __construct()
        {

        }

        public function emit($response): array
        {
            header('Content-Type: application/json');

            return $response;
        }
    }