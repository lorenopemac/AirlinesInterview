<?php

declare(strict_types = 1);

namespace Tests\Unit;

require './vendor/autoload.php';

use App\lib\routes;
use PHPUnit\Framework\TestCase;
use App\controllers\AuthController;

class RouterTest extends TestCase
{
    protected function setUp() : void
    {
        // Clear SCRIPT_NAME 
        $_SERVER['SCRIPT_NAME'] = '/index.php';

        // Default request method to GET
        $_SERVER['REQUEST_METHOD'] = 'GET';

        // Default SERVER_PROTOCOL method to HTTP/1.1
        $_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';
    }


}