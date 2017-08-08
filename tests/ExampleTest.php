<?php
    declare(strict_types = 1);

    use PHPUnit\Framework\TestCase;

    class ExampleTest extends TestCase {
        public function testSuccess()
        {
            $input = 'abc';
            $result = strrev($input);

            $this->assertEquals('cba', $result);
        }

        public function testFail()
        {
            $input = 'abc';
            $result = ($input);

            $this->assertEquals('cba', $result);
        }
    }
