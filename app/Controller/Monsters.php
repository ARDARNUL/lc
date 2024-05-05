<?php

namespace Controller;

use Model\Monster;
use Src\Request;
use Src\View;
use Src\Auth\Auth;


class Monsters
{

    private $upload_dir = __DIR__ . '/../../public/images/';

    public function viewMonster(Request $request): void
    {
        $Monsters = Monster::all();
        (new View())->json($Monsters->toArray());
    }

    public function createMonster(Request $request): void
    {
        if (!auth::user()->isAdmin()) {
            (new View())->json(['message' => 'У вас нету прав тут быть :3'], 400);
            return;
        }

        if (isset($_FILES["avatar"])) {
            $avatar = $_FILES["avatar"];
            if (!$avatar['name']) {
                (new View())->json(['message' => 'Выберите файл'], 400);
            }

            if (!$avatar['size']) {
                (new View())->json(['message' => 'файл слишком большой'], 400);
            }

            $getMime = explode('.', $avatar['name']);
            $mime = strtolower(end($getMime));  
            $types = array('jpg', 'png', 'jpeg', 'webp');


            if (!in_array($mime, $types)) {
                (new View())->json(['Неправильный тип изобрвжения вот разрешёные: jpg, png, jpeg, webp'], 400);
            }

            $name = mt_rand(0, 10000) . $avatar['name'];
            copy($avatar['tmp_name'], "$this->upload_dir/$name");
        }

        if (Monster::create($request->all())) {
            $Monsters = Monster::all();
            (new View())->json($Monsters->toArray());
        }
    }

    public function deleteMonster(Request $request): void
    {
        if (!auth::user()->isAdmin()) {
            (new View())->json(['message' => 'У вас нету прав тут быть :3'], 400);
            return;
        }

        Monster::where("id", $request->get('id'))->delete();
        $Monsters = Monster::all();

        (new View())->json($Monsters->toArray());
    }

    public function redactMonster(Request $request): void
    {
        if (!auth::user()->isAdmin()) {
            (new View())->json(['message' => 'У вас нету прав тут быть :3'], 400);
            return;
        }

        if (isset($_FILES["avatar"])) {
            $avatar = $_FILES["avatar"];
            if (!$avatar['name']) {
                (new View())->json(['message' => 'Выберите файл'], 400);
            }

            if (!$avatar['size']) {
                (new View())->json(['message' => 'файл слишком большой'], 400);
            }

            $getMime = explode('.', $avatar['name']);
            $mime = strtolower(end($getMime));
            $types = array('jpg', 'png', 'jpeg', 'webp');


            if (!in_array($mime, $types)) {
                (new View())->json(['Неправильный тип изобрвжения вот разрешёные: jpg, png, jpeg, webp'], 400);
            }

            $name = mt_rand(0, 10000) . $avatar['name'];
            copy($avatar['tmp_name'], "$this->upload_dir/$name");
        }

        if ($request->method === 'POST') {
            Monster::where("id", $request->get('id'))->update([
                "name" => $request->get('name'),
                "avatar" => $request->get('avatar'),
                "healt" => $request->get('healt'),
                "quantity" => $request->get('quantity'),
                "stun_id" => $request->get('stun_id'),
                "moons_id" => $request->get('moons_id')
            ]);
            $Monsters = Monster::all();
            (new View())->json($Monsters->toArray());
        }
    }
}