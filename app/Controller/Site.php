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

    public function createMoons(Request $request): string
    {
        if ($request->method === 'GET') {
            return new View('site.createMoons');
        }

        if (Moon::create($request->all())) {
            app()->route->redirect('/Moons');
        }

        app()->route->redirect('/Moons');
    }

    public function Moons(Request $request): string
    {
        $Moons = Moon::all();
        return (new View())->render('site.Moons', ['Moons' => $Moons]);
    }

    public function profile(Request $request): string
    {
        $user = Auth::user(); 
        (new View())->json($user->toArray());
    }

    public function deleteUser(Request $request): string
    {
        User::where("users.id", $request->get('id'))->delete();
        app()->route->redirect('/Monster');
        return "";
    }

    public function deleteMoons(Request $request): string
    {
        Moon::where("id", $request->get('id'))->delete();
        app()->route->redirect('/Moons');
        return "";
    }

    public function redactMoon(Request $request): string
    {
        if ($request->method === 'POST') {
        Moon::where("id", $request->get('id'))->update([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "tier_id" => $request->get('tier_id'),
            "cost" => $request->get('cost'),
            "viable_weather" => $request->get('viable_weather')
        ]);
    }
    return (new View())->render('site.redactMoon');
    }
    
    public function redactProfile(Request $request): string
    {
        if ($request->method === 'POST') {
        User::where("id", $request->get('id'))->update([
            "login" => $request->get('login'),
        ]);
    }
    return (new View())->render('site.redactProfile');
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
    
    
            if (!$User) {+
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
