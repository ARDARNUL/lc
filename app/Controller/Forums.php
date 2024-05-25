<?php

namespace Controller;

use Model\Comment;
use Model\NewComment;
use Model\News;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\Validator\Validator;
use Src\View;
use Firebase\JWT\JWT;
use DateTimeImmutable;
use Firebase\JWT\Key;

class Forums
{
    
    public function viewForum(Request $request): void
    {
        if($News = News::all()){
            (new View())->json(['message' => 'Успешно', "News" => $News->toArray()], 200);
        }else{
            (new View())->json(['message' => 'Непредвиденная ошибка'], 500);
        }
    }

    public function addNew(Request $request): void
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
             
             $id = $jwt->info->id;

             if ($jwt->info) {
                $News = News::create([...$request->all(), "user_id" => $id]);
                (new View())->json(["message" => 'Запись создана', "News" => $News->toArray()], 200);
             } else {
                (new View())->json(["message" => 'Ошибка'], 400);
             }
         } else {
             (new View())->json(["message" => 'Токен не найден'], 401);
             
         }
    }

    public function deleteNews(Request $request): void
    {
        if(News::where("id", $request->get('id'))->delete()){
            $News = News::all();
            (new View())->json(["message" => 'Новость удалена', "News" => $News->toArray()], 200);
        }
        else{
            (new View())->json(['message' => 'Коментарий не создался'], 400);
        }
    }
}