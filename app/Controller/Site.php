<?php

namespace Controller;

use Model\Comment;
use Model\Post;
use Model\User;
use Src\View;
use Src\Request;
use Src\Auth\Auth;
use Model\Moon;
use Model\Monster;
use Model\Item;
use Model\News;
use Model\Forum;
use Model\NewComment;
use Model\Ticket;
use Model\AllTicket;
use Src\Validator\Validator;
use Src\Validator\AbstractValidator;

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
        return (new View())->render('site.Items', ['Items' => $Items]);
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

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/Monster');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/Monster');
    }

    public function signup(Request $request): string
{
    if ($request->method == 'POST') {

        $validator = new Validator($request->all(), [
            'login' => ['required', 'length:1,255'],
            'password' => ['required', 'length:1,255'],
        ], [
            'required' => 'Поле :field обязательное',
        ]);

        if ($validator->fails()) {
            return new View('site.signup', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
        }

        // check avatar
        if (isset($_FILES["avatar"])) {
            $avatar = $_FILES["avatar"];
            if (!$avatar['name']) {
                return new View('site.signup', ['message' => 'Не выбрано изображение']);
            }

            if (!$avatar['size']) {
                return new View('site.signup', ['message' => 'Слишком большое изображение']);
            }

            $getMime = explode('.', $avatar['name']);
            $mime = strtolower(end($getMime));
            $types = array('jpg', 'png', 'jpeg', 'webp');


            if (!in_array($mime, $types)) {
                return new View('site.signup', ['message' => 'Не поддерживаемый тип изображения']);
            }

            $name = mt_rand(0, 10000) . $avatar['name'];
            copy($avatar['tmp_name'], "$this->upload_dir/$name");
        }


        $User = User::create([
            ...$request->all(),
            'avatar' => "/images/$name"
        ]);

        if (!$User) {
            return new View('site.signup', ['message' => 'failed']);
        }

        app()->route->redirect("/profile");
    }

   return new View('site.signup');
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
