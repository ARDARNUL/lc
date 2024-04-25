<?php

namespace Controller;

use Model\Comment;
use Model\Item;
use Model\Monster;
use Model\Moon;
use Model\NewComment;
use Model\News;
use Model\Ticket;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Site
{
    private $upload_dir = __DIR__ . '/../../public/images/';

    public function AllTicket(Request $request): string{
        $Ticket = Ticket::all();
        return (new View())->render('site.allTickets', ['Ticket' => $Ticket]);
    }
    public function addnew(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.New');
        }
        if (News::create([...$request->all(), "user_id" => Auth::user()["id"]])) {
            app()->route->redirect('/Forum');
        }
        return (new View())->render('site.Forum');
    }

    public function comment(Request $request): string
    {
        if ($request->method === 'GET') {
            return new View('site.comment');
        }

        $comment = Comment::create([...$request->all(), "user_id" => Auth::user()["id"]]);

        // Если нет коммента вернуть сообщение с ошибкой
        if (!$comment) {
            return (new View())->render('site.comment', [
                'message' => 'Не удалось создать комментарий'
            ]);

        }

        // Если удалось всязать новость и комментарий, то перейти на страницу с новостями
        if (NewComment::create([
            "comment_id" => $comment->id,
            "news_id" => $request->id,
        ])) {
            app()->route->redirect('/Forum');
        }

        return (new View())->render('site.comment');
    }

    public function ticket(Request $request): string{
        if ($request->method === 'GET') {
            return new View('site.ticket');
        }
        if (Ticket::create([...$request->all(), "user_id" => Auth::user()["id"]])) {
            app()->route->redirect('/Monster');
        }
        return (new View())->render('site.ticket');
    }

    public function Monster(Request $request): string
    {
        $Monsters = Monster::all();
        return (new View())->render('site.Monster', ['Monsters' => $Monsters]);
    }

    public function createMonster(Request $request): string
    {
        if ($request->method === 'GET') {
            return new View('site.createMonster');
        }

        if (Monster::create($request->all())) {
            app()->route->redirect('/Monster');
        }

        app()->route->redirect('/Monster');
    }

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

    public function createItems(Request $request): string
    {
        if ($request->method === 'GET') {
            return new View('site.createItems');
        }

        if (Item::create($request->all())) {
            app()->route->redirect('/Item');
        }
        app()->route->redirect('/Item');
    }

    public function Item(Request $request): string
    {
        $Items = Item::all();
        (new View())->json($Item->toArray());
    }

    public function Moons(Request $request): string
    {
        $Moons = Moon::all();
        return (new View())->render('site.Moons', ['Moons' => $Moons]);
    }

    public function profile(Request $request): string
    {
        $user = Auth::user(); // User::find(Auth::user()["id"]);
        return new View('site.profile', ['user' => $user]);
    }

    public function deleteUser(Request $request): string
    {
        User::where("users.id", $request->get('id'))->delete();
        app()->route->redirect('/Monster');
        return "";
    }

    public function deleteMonster(Request $request): string
    {
        Monster::where("id", $request->get('id'))->delete();
        app()->route->redirect('/Monster');
        return "";
    }

    public function deleteMoons(Request $request): string
    {
        Moon::where("id", $request->get('id'))->delete();
        app()->route->redirect('/Moons');
        return "";
    }

    public function deleteItems(Request $request): string
    {
        Item::where("id", $request->get('id'))->delete();
        app()->route->redirect('/Item');
        return "";
    }

    public function deleteNews(Request $request): string
    {
        News::where("id", $request->get('id'))->delete();
        app()->route->redirect('/Forum');
        return "";
    }

    public function redactMonster(Request $request): string
    {
        if ($request->method === 'POST') {
        Monster::where("id", $request->get('id'))->update([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "healt" => $request->get('healt'),
            "stunnable" => $request->get('stunnable')
        ]);
    }
    return (new View())->render('site.redactMonster');
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
    public function redactItem(Request $request): string
    {
        if ($request->method === 'POST') {
        Item::where("id", $request->get('id'))->update([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "price" => $request->get('price'),
            "kind_id" => $request->get('kind_id')
        ]);
    }
    return (new View())->render('site.redactItem');
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
    public function Forum(Request $request): string
    {
        $News = News::all();
        return (new View())->render('site.Forum', ['News' => $News]);
    }

    public function main(Request $request): string
    {
        return new View('site.main');
        // return (new View())->render('site.post', ['posts' => $posts]);
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

    public function login(Request $request): void
    {
        $validator = new Validator($request->all(), [
            'login' => ['required'],
            'password' => ['required'],
        ], [
            'required' => 'Поле :field обязательное',
        ]);
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            (new View())->json(['token' => session_create_id()], 200);
        }

        (new View())->json(['message' => 'Неправильные логин или пароль'], 400);

    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/Monster');
    }

    public function signup(Request $request): void
    {
        $validator = new Validator($request->all(), [
            'login' => ['required'],
            'password' => ['required'],
        ], [
            'required' => 'Поле :field обязательное',
        ]);

        if ($validator->fails()) {
            (new View())->json($validator->errors(), 400);
            return;
        }

        if (Auth::attempt($request->all())) {
            (new View())->json(['token' => session_create_id()], 200);
        }

        (new View())->json(['message' => 'Неправильные логин или пароль'], 400);
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
