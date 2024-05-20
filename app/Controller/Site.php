<?php

namespace Controller;

use Model\Moon;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\Validator\Validator;
use Src\View;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use DateTimeImmutable;


class Site
{
    private $upload_dir = __DIR__ . '/../../public/images/';

    public function addImage(Request $request)
    {
        $Users = Auth::user(); 
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


            
        User::where("id", $request->get('id'))->update([
            'avatar' => "/images/$name",
            "avatar" => $request->get('avatar')     
        ]);
        }

       
        (new View())->json($Users->toArray());

    }

    public function deleteUser(Request $request): void
    {
        $authHeader = $request->headers['Authorization'];
        if (!empty($authHeader)) {
            
            $token = explode(' ', $authHeader)[1];
            $secret_Key  = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';

            $jwt = JWT::decode($token, new Key($secret_Key, 'HS512'));

            
            $now = new DateTimeImmutable();
            $serverName = "api.hikilist.ru";

            if ($jwt->iss !== $serverName ||
                $jwt->nbf > $now->getTimestamp() ||
                $jwt->exp < $now->getTimestamp())
            {
                (new View())->json(["message" => 'Время действия токена закончилось'], 400);
            }

            if ($jwt->info) {
                User::where("id", $jwt->info->id)->delete();
                (new View())->json(['message' => 'Пользователь удалён!'], 200); 
            } else {
                (new View())->json(["message" => 'Ошибка'], 400);
            }
        } else {
            (new View())->json(["message" => 'Токен не найден'], 401);
        }
    }
    
    public function profile(Request $request): void
    {
        // 1. Проверка токена
        $authHeader = $request->headers['Authorization'];
        if (!empty($authHeader)) {
            
            $token = explode(' ', $authHeader)[1];
            $secret_Key  = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';

            $jwt = JWT::decode($token, new Key($secret_Key, 'HS512'));

            
            $now = new DateTimeImmutable();
            $serverName = "api.hikilist.ru";

            if ($jwt->iss !== $serverName ||
                $jwt->nbf > $now->getTimestamp() ||
                $jwt->exp < $now->getTimestamp())
            {
                (new View())->json(["message" => 'Время действия токена закончилось'], 400);

            }

            if ($jwt->info) {
                (new View())->json(["user" => $jwt->info, 'message' => 'Успешно'], 200); 
            } else {
                (new View())->json(["message" => 'Ошибка'], 400);
            }
        } else {
            (new View())->json(["message" => 'Токен не найден'], 401);
        }
    }
    

    public function login(Request $request): void
    {
        // 1. Проверка аутентификации пользователя
        if (Auth::attempt($request->all())) {
            $user = Auth::user();
            
            $secret_Key  = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';
            $date   = new DateTimeImmutable();
            $expire_at     = $date->modify('+100 minutes')->getTimestamp();      // Add 60 seconds
            $domainName = "api.hikilist.ru";
            $info = Auth::user();                                           // Retrieved from filtered POST data
            $request_data = [
                'iat'  => $date->getTimestamp(),         // Issued at: time when the token was generated
                'iss'  => $domainName,                       // Issuer
                'nbf'  => $date->getTimestamp(),         // Not before
                'exp'  => $expire_at,                           // Expire
                'info' => $info                   // User name
            ];
    
            $jwt = JWT::encode($request_data, '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=', 'HS512');
    
            // 4. Возврат ответа с токеном
            (new View())->json([ "message" => 'Успешно', "user" => $user->toArray(), 'token' => $jwt], 200); 
        } else {
            (new View())->json(["message" => 'Неправильные логин или пароль'], 400);
        }
    }

    public function logout(Request $request): void
    {     
        $authHeader = $request->headers['Authorization'];
        if(!empty($authHeader)){

            $token = explode(' ', $authHeader)[1];
            $secret_Key  = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';

            $jwt = JWT::decode($token, new Key($secret_Key, 'HS512'));

            $now = new DateTimeImmutable();
            $serverName = "api.hikilist.ru";

            if ($jwt->iss !== $serverName ||
                $jwt->nbf > $now->getTimestamp() ||
                $jwt->exp < $now->getTimestamp()) {
                    (new View())->json(["message" => 'Выход успешен'], 200);
            }
            (new View())->json(['message' => 'Выход успешен', 'token' => NULL], 200);
        }
        else{
            (new View())->json(["message" => 'Выход успешен'], 200);
        }
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
                
                Auth::attempt($request->all());

                $user = Auth::user();

                $secret_Key  = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';
                $date   = new DateTimeImmutable();
                $expire_at     = $date->modify('+100 minutes')->getTimestamp();      // Add 60 seconds
                $domainName = "api.hikilist.ru";
                $info = Auth::user();                                    // Retrieved from filtered POST data
                $request_data = [
                'iat'  => $date->getTimestamp(),         // Issued at: time when the token was generated
                'iss'  => $domainName,                       // Issuer
                'nbf'  => $date->getTimestamp(),         // Not before
                'exp'  => $expire_at,                           // Expire
                'info' => $info                   // User name
            ];
    
                $jwt = JWT::encode($request_data, '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=', 'HS512');

                (new View())->json(["message" => 'Успешно', "user" => $user->toArray(), 'token' => $jwt], 200); 
                
            }

            if (!$info) {
                (new View())->json(['message' => 'Не вышло)'], 400);
            }
    
        }
    }
}
