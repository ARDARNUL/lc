<?php

namespace Controller;

use Model\Post;
use Model\User;
use Src\View;
use Src\Request;
use Src\Auth\Auth;
use Model\Moon;
use Model\Monster;

class Site
{
    public function Monster(Request $request): string
    {
        $Monsters = Monster::all();
        return (new View())->render('site.Monster', ['Monsters' => $Monsters]);
        
    }

    public function Item(Request $request): string
    {
        return new View('site.Item');
    }

    public function Moons(Request $request): string
    {
        $Moons = Moon::all();
        return (new View())->render('site.Moons', ['Moons' => $Moons]);
    }

    public function profile(Request $request): string
    {
        $user = User::find(Auth::user()["id"]);
        return new View('site.profile', ['user' => $user]);
    }

    public function Forum(Request $request): string
    {
        return new View('site.Forum');
    }

    public function main(Request $request): string
    {
        return new View('site.main');
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    // public function index(Request $request): string
    // 
    //    $posts = Post::where('id', $request->id)->get();
    //    return (new View())->render('site.post', ['posts' => $posts]);
    // 

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/main');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/main');
    }


    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/main');
        }
        return new View('site.signup');
    }
}
