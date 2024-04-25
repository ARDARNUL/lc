<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class AdminMiddleware
{
    public function handle(Request $request)
    {
        //Если пользователь не админ, то редирект на страницу входа
        if (!Auth::user()->isAdmin()) {
            app()->route->redirect('/login');
        }
    }
}
