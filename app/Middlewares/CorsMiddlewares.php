<?php
namespace Middlewares;

use Src\Request;
use Src\Response;

class CorsMiddlewares
{
    public function handle(Request $request)
    {
        $headers = [
            'Access-Control-Allow-Origin' => 'http://localhost:5173',
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization',
        ];

        $response = (new Response('OK', 200))->withHeaders($headers);

        return $request;
    }
}