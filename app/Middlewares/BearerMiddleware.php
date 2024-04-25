<?php

namespace Middlewares;

use Src\Request;

class BearerMiddleware
{
    public function handle(Request $request)
    {
        if ($request->headers['token'] ?? false) {
            $token = end(explode(' ', $request->headers['token']));

            if (!empty($token)) {
                session_decode($token);
            }
        }
    }
}