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

class Forums
{
    
    public function Forum(Request $request): void
    {
        $News = News::all();
        (new View())->json($News->toArray());
    }

    public function addnew(Request $request): void
    {
        if($News = News::create([...$request->all(), "user_id" => Auth::user()["id"]])){
            (new View())->json($News->toArray());  
        }
        else{
            (new View())->json(['message' => 'Коментарий не создался'], 400);
        }
    }

    public function comment(Request $request): void
    {
        $comment = Comment::create([...$request->all(), "user_id" => Auth::user()["id"]]);

        // Если удалось всязать новость и комментарий, то перейти на страницу с новостями
        if (NewComment::create([
            "comment_id" => $comment->id,
            "news_id" => $request->id,
        ])) {
            $News = News::all();
            (new View())->json($News->toArray());
        }
        else{
            (new View())->json(['message' => 'Коментарий не создался'], 400);
        }

    }

    public function deleteNews(Request $request): void
    {
        News::where("id", $request->get('id'))->delete();
        $News = News::all();
        (new View())->json($News->toArray());
    }


}