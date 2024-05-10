<?php

namespace Controller;

use Model\Moon;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Site
{
    private $upload_dir = __DIR__ . '/../../public/images/';

    public function profile(Request $request): void
    {
        $users = Auth::user(); 
        (new View())->json($users->toArray());

    }

    public function deleteUser(Request $request): void
    {
        User::where("users.id", $request->get('id'))->delete();
        app()->route->redirect('/Monster');
    }
    
    public function redactProfile(Request $request): void
    {
        if ($request->method === 'POST') {
        $users = User::where("id", $request->get('id'))->update([
            "login" => $request->get('login'),
        ]);
        (new View())->json($users->toArray());
    }
    else{
        (new View())->json(['message' => 'Не вышло)'], 400);
    }
        
    }
    

    public function login(Request $request): void
    {
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            (new View())->json(['token' => session_create_id()], 200);
        }

        (new View())->json(['message' => 'Неправильные логин или пароль'], 400);
    }

    public function logout(): void
    {
        (Auth::logout());
        (new View())->json(['message' => 'Выход успешен'], 200);
    }

    public function signup(Request $request): void
    {       
        if ($request->method == 'POST') {
    
            $validator = new Validator($request->all(), [
                'login' => ['required', 'length:1,255'],
                'password' => ['required', 'length:1,255'],
            ], [
                'required' => 'Поле :field обязательное',
            ]);
    
            if ($validator->fails()) {
                (new View())->json($validator->errors(), 400);
            }
    
            $login = $request->get('login');
    
            $login = strtoupper($login);
    
            if (User::whereRaw( "UPPER(login) = ?", $login )->exists() ) {
    
                (new View())->json(['message' => 'Такой пользователь уже создан)'], 400);
    
            } else {
                $User = User::create([
                    ...$request->all(),
                ]);
                (new View())->json(['token' => session_create_id()], 200);
            }
    
    
            if (!$User) {
                (new View())->json(['message' => 'Не вышло)'], 400);
            }
    
        }
    }

    public function User(Request $request)
    {
        $search = $request->get('search');

        if ($search) {
            $search = strtoupper($search);

            $User = User::whereRaw(
                "UPPER(login) LIKE '%" . $search . "%'"
            )->get();
        } else {
                $User = User::all();
        }
        return (new View())->render('site.User', ['User' => $User]);
    }
}
