<?php

namespace Middlewares;

use Src\Request;

class Api
{
    public function handle(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');
    }
}
